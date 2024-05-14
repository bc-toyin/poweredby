<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Account Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-auto">
                        <div class="float-right flex items-center">
                            <a href="{{ route('stores.create', ['account_id' => $account['id']]) }}" class="bg-indigo-600 text-white px-3 py-2 mr-5 flex items-center">
                                <svg class="fill-white mr-1" xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                Create Store
                            </a>

                            <a href="{{ route('accounts.edit', ['account_id' => $account['id']]) }}" class="bg-indigo-600 text-white px-3 py-2 flex items-center"><svg class="fill-white mr-1" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg> Edit</a>
                        </div>

                        <div class="clear-both"></div>

                        <div class="mb-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label>Name</label>
                                    <input type="text" class="py-2 px-3 border w-full" value="{{ $account['name'] ?? '' }}" style="background: #eee;" disabled />
                                </div>

                                <div>
                                    <label>Email</label>
                                    <input type="email" class="py-2 px-3 border w-full" value="{{ $account['user_email'] ?? '' }}" style="background: #eee;" disabled />
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
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $account['primary_contact']['first_name'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>

                                        <div>
                                            <label>Last Name</label>
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $account['primary_contact']['last_name'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label>Email</label>
                                            <input type="email" class="py-2 px-3 border w-full" value="{{ $account['primary_contact']['email'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>

                                        <div>
                                            <label>Phone</label>
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $account['primary_contact']['phone_number'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label>District</label>
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $account['primary_contact']['district'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>

                                        <div>
                                            <label>Country</label>
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $account['primary_contact']['country'] ?? '' }}" style="background: #eee;" disabled />
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
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $account['billing_contact']['first_name'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>

                                        <div>
                                            <label>Last Name</label>
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $account['billing_contact']['last_name'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label>Email</label>
                                            <input type="email" class="py-2 px-3 border w-full" value="{{ $account['billing_contact']['email'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>

                                        <div>
                                            <label>Phone</label>
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $account['billing_contact']['phone_number'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label>District</label>
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $account['billing_contact']['district'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>

                                        <div>
                                            <label>Country</label>
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $account['billing_contact']['country'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
