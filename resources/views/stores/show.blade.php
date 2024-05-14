<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Store Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-auto">
                        @if ($store)
                            <div class="float-right">
                                <a href="{{ route('stores.edit', ['store_id' => $store['id']]) }}" class="bg-indigo-600 text-white px-3 py-2 flex items-center"><svg class="fill-white mr-1" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg> Edit</a>
                            </div>

                            <div class="clear-both"></div>

                            <div class="mb-3">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label>Status</label>
                                        <input type="text" class="py-2 px-3 border w-full" value="{{ $store['status'] ?? '' }}" style="background: #eee;" disabled />
                                    </div>

                                    <div>
                                        <label>Plan Sku</label>
                                        <input type="text" class="py-2 px-3 border w-full" value="{{ $store['plan_sku'] ?? '' }}" style="background: #eee;" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label>Store Name</label>
                                        <input type="text" class="py-2 px-3 border w-full" value="{{ $store['store_name'] ?? '' }}" style="background: #eee;" disabled />
                                    </div>

                                    <div>
                                        <label>Store Hash</label>
                                        <input type="text" class="py-2 px-3 border w-full" value="{{ $store['store_hash'] ?? '' }}" style="background: #eee;" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label>Primary Hostname</label>
                                        <input type="text" class="py-2 px-3 border w-full" value="{{ $store['primary_hostname'] ?? '' }}" style="background: #eee;" disabled />
                                    </div>

                                    <div>
                                        <label>Canonical Hostname</label>
                                        <input type="text" class="py-2 px-3 border w-full" value="{{ $store['canonical_hostname'] ?? '' }}" style="background: #eee;" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label>Country</label>
                                        <input type="text" class="py-2 px-3 border w-full" value="{{ $store['country'] ?? '' }}" style="background: #eee;" disabled />
                                    </div>

                                    <div>
                                        <label>Expires At</label>
                                        <input type="text" class="py-2 px-3 border w-full" value="{{ $store['expires_at'] ?? '' }}" style="background: #eee;" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-3">
                                            <label>Account Id</label>
                                            <input type="text" class="py-2 px-3 border w-full" value="{{ $store['account_id'] ?? '' }}" style="background: #eee;" disabled />
                                        </div>

                                        <div>
                                            <div class="flex items-center">
                                                <div class="mr-2">Store Launched:</div>

                                                @if (isset($store['store_launched']) && $store['store_launched'])
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center">No data found.</div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
