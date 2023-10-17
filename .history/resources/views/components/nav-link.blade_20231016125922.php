@props(['active'])

@php
$classes = ($active ?? false)
            ? 'tw-inline-flex tw-items-center tw-px-1 tw-pt-1 tw-border-b-2 tw-border-indigo-400 tw-text-sm tw-font-medium tw-leading-5 tw-text-gray-900 tw-focus:tw-outline-none tw-focus:tw-border-indigo-700 tw-transition tw-duration-150 tw-ease-in-out'
            : 'tw-inline-flex tw-items-center tw-px-1 tw-pt-1 tw-border-b-2 tw-border-transparent tw-text-sm tw-font-medium tw-leading-5 tw-text-gray-500 tw-hover:tw-text-gray-700 tw-hover:tw-border-gray-300 tw-focus:tw-outline-none tw-focus:tw-text-gray-700 tw-focus:tw-border-gray-300 tw-transition tw-duration-150 tw-ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
