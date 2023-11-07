@props(['current','active' => true])

@php
$classes = ($current ?? false)
            ? 'bg-slate-100/90 border-b-4 border-transparent text-gray-900 group inline-flex items-center px-2 py-1.5 text-sm leading-5 font-medium'
            : 'text-slate-500 hover:text-gray-800 border-b-4 border-transparent hover:border-gray-800 group flex items-end p-4 text-lg leading-5 font-semibold';
$iconClasses = ($current ?? false)
            ? 'text-gray-500'
            : 'text-gray-400 group-hover:text-gray-500';
@endphp
<div class="flex">
  <a href="{{$url}}" {{ $attributes->merge(['class' => $classes.' space-x-2']) }}>
      {{$title}}
  </a>
</div>
