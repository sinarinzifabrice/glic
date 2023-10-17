<button {{ $attributes->merge(['type' => 'submit', 'class' => 'tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-bg-red-600 tw-border tw-border-transparent tw-rounded-md tw-font-semibold tw-text-xs tw-text-white tw-uppercase tw-tracking-widest tw-hover:tw-bg-red-500 tw-active:tw-bg-red-700 tw-focus:tw-outline-none tw-focus:tw-ring-2 tw-focus:tw-ring-red-500 tw-focus:tw-ring-offset-2 tw-transition tw-ease-in-out tw-duration-150']) }}>
    {{ $slot }}
</button>
