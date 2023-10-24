<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8 tw-space-y-6">
            <div class="tw-p-4 tw-sm:p-8 tw-bg-white tw-shadow tw-sm:rounded-lg">
                <div class="tw-max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="tw-p-4 tw-sm:p-8 tw-bg-white tw-shadow tw-sm:rounded-lg">
                <div class="tw-max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="tw-p-4 tw-sm:p-8 tw-bg-white tw-shadow tw-sm:rounded-lg">
                <div class="tw-max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
