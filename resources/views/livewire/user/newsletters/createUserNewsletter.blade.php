<div>
   <x-hive-display-section component='boxedSection' class="p-0">

       <x-hive-display-form-layout route="createNewsletter" type="livewire">
         <x-slot name="title">
             {{ __('Newsletter Details') }}
         </x-slot>
         <x-slot name="description">
             {{ __('Create a new newsletter for subscribers.') }}
         </x-slot>
         <x-slot name="form">
             <div class="col-span-6">
                 <x-label value="{{ __('Newsletter Owner') }}" />

                 <div class="flex items-center mt-2">
                     <img class="w-12 h-12 rounded-full object-cover" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">

                     <div class="ml-4 leading-tight">
                         <div class="text-gray-900 dark:text-white">{{ $this->user->name }}</div>
                         <div class="text-gray-700 dark:text-gray-300 text-sm">{{ $this->user->email }}</div>
                     </div>
                 </div>
             </div>

             <div class="col-span-6 sm:col-span-4">
               <x-hive-form-input
                 name="name"
                 type="name"
                 placeholder="{{__('Newsletter Name')}}"
                 required="true"
                 value="{{ old('name', '') }}"
                 wire:model="state.name" autofocus
                 id="name"/>

             </div>

             <div class="col-span-6 sm:col-span-4">
               <x-hive-form-text
                 name="description"
                 type="description"
                 placeholder="{{__('Description')}}"
                 required="true"
                 value="{{ old('description', '') }}"
                 wire:model="state.description" autofocus
                 id="description"/>
             </div>
         </x-slot>
         <x-slot name="actions">
             <x-button>
                 {{ __('Create') }}
             </x-button>
         </x-slot>
      </x-hive-display-form-layout>

  </x-hive-display-section>
</div>
