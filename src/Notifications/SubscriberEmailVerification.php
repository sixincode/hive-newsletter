<?php

namespace Sixincode\HiveNewsletter\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class SubscriberEmailVerification extends Notification
{
  use Queueable;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct()
  {
      //
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function via($notifiable)
  {
      return ['mail'];
  }

  /**
   * Get the mail representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
  public function toMail($notifiable)
  {
      $verificationUrl = $this->verificationUrl($notifiable);

      $mail = new MailMessage();

      $mail->subject(__('hive-newsletters.mail.verify_email.subjet'));
      $mail->subject(__('hive-newsletters.mail.verify_email.greeting'));
      $mail->line(__('hive-newsletters.mail.verify_email.body'));
      $mail->line(__('hive-newsletters.mail.verify_email.lead'));
      $mail->action(__('hive-newsletters.mail.verify_email.action'), $verificationUrl);
      $mail->line(__('hive-newsletters.mail.verify_email.footer'));

      return $mail;
  }

  /**
   * Get the array representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function toArray($notifiable)
  {
      return [
          //
      ];
  }

  /**
   * Get the verification URL for the given notifiable.
   *
   * @param  mixed  $notifiable
   * @return string
   */
  protected function verificationUrl($notifiable)
  {
      return URL::temporarySignedRoute(
          'subscribers.verify',
          Carbon::now()->addMinutes(config('hive-newsletters.verificationLinkExpiration')),
          [
              'id'   => $notifiable->getGlobalKey(),
              'hash' => sha1($notifiable->getEmailForVerification()),
          ]
      );
  }

}
