<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('layouts.flash')

                    <form class="relative overflow-auto" method="post" action="{{ route('accounts.update', ['account_id' => $account['id']]) }}">
                        @csrf

                        <div class="mb-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label>Name</label>
                                    <input type="text" class="py-2 px-3 border w-full" name="name" value="{{ old('name', $account['name'] ?? '') }}" />
                                </div>

                                <div>
                                    <label>Email</label>
                                    <input type="email" class="py-2 px-3 border w-full" name="email"  value="{{ old('email', $account['user_email'] ?? '') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <fieldset class="border border-solid border-gray-300 p-3">
                                <legend>Primary Contact</legend>

                                <div class="mb-3">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label>First Name</label>
                                            <input type="text" class="py-2 px-3 border w-full" name="p_first_name"  value="{{ old('p_first_name', $account['primary_contact']['first_name'] ?? '') }}" />
                                        </div>

                                        <div>
                                            <label>Last Name</label>
                                            <input type="text" class="py-2 px-3 border w-full" name="p_last_name"  value="{{ old('p_last_name', $account['primary_contact']['last_name'] ?? '') }}" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label>Email</label>
                                            <input type="email" class="py-2 px-3 border w-full" name="p_email"  value="{{ old('p_email', $account['primary_contact']['email'] ?? '') }}" />
                                        </div>

                                        <div>
                                            <label>Phone</label>
                                            <input type="text" class="py-2 px-3 border w-full" name="p_phone"  value="{{ old('p_phone', $account['primary_contact']['phone_number'] ?? '') }}" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label>District</label>
                                            <input type="text" class="py-2 px-3 border w-full" name="p_district" value="{{ old('p_district', $account['primary_contact']['district'] ?? '') }}" />
                                        </div>

                                        <div>
                                            <label>Country</label>
                                            <input type="text" class="py-2 px-3 border w-full" name="p_country" value="{{ old('p_country', $account['primary_contact']['country'] ?? '') }}" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="mb-3">
                            <fieldset class="border border-solid border-gray-300 p-3">
                                <legend>Billing Contact</legend>

                                <div class="mb-3">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label>First Name</label>
                                            <input type="text" class="py-2 px-3 border w-full" name="b_first_name" value="{{ old('b_first_name', $account['billing_contact']['first_name'] ?? '') }}" />
                                        </div>

                                        <div>
                                            <label>Last Name</label>
                                            <input type="text" class="py-2 px-3 border w-full" name="b_last_name" value="{{ old('b_last_name', $account['billing_contact']['last_name'] ?? '') }}" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label>Email</label>
                                            <input type="email" class="py-2 px-3 border w-full" name="b_email" value="{{ old('b_email', $account['billing_contact']['email'] ?? '') }}" />
                                        </div>

                                        <div>
                                            <label>Phone</label>
                                            <input type="text" class="py-2 px-3 border w-full" name="b_phone" value="{{ old('b_phone', $account['billing_contact']['phone_number'] ?? '') }}" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label>District</label>
                                            <input type="text" class="py-2 px-3 border w-full" name="b_district" value="{{ old('b_district', $account['billing_contact']['district'] ?? '') }}" />
                                        </div>

                                        <div>
                                            <label>Country</label>
                                            <input type="text" class="py-2 px-3 border w-full" name="b_country" value="{{ old('b_country', $account['billing_contact']['country'] ?? '') }}" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
