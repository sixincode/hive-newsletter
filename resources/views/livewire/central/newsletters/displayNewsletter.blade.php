@props([
'color'     => '',
'component' => $component,
])
  <x-hive-newsletter-newsletter-display component="{{$component}}" name="{{$newsletter->name}}" description="{{$newsletter->description}}" route="subscribeToNewsletter">
        <x-slot name="form">
          <!--  -->
        </x-slot>

        <x-slot name="actions">
            <x-hive-display-action-message on="subscribed">
                {{ __('hive-newsletter::main.notifications.thxSub') }}
            </x-hive-display-action-message>
        </x-slot>

</x-hive-newsletter-newsletter-display>
