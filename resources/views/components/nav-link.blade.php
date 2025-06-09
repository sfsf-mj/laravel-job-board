{{--

    This component is used to create links in a navigation menu with active state styling.
    To use it, simply include the component in your Blade view like this:
        <x-nav-link href="/your_route" :active="request()->is('/your_route')">Link Text</x-nav-link>
    The `active` prop determines if the link should have the active styling.
    The component will automatically apply the correct classes based on the active state.
    
--}}


@props([ 'active' => false ])

@php
    $Current = 'bg-gray-900 text-white';
    $Default = 'text-gray-300 hover:bg-gray-700 hover:text-white';
@endphp

<a class="rounded-md px-3 py-2 text-sm font-medium {{ $active ? $Current : $Default }}"
    aria-current="page" {{ $attributes }}>
    {{ $slot }}
</a>
