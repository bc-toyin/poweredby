<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Store') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="app()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="relative overflow-auto" method="post" action="{{ route('stores.update', ['store_id' => $store['id']]) }}">
                        @csrf

                        <div class="mb-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label>Status</label>

                                    <div class="grid grid-cols-4 gap-1">
                                        <select class="py-2 px-3 border w-full" name="status">
                                            <option value="active" {{ old('status', $store['status'] ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="suspended" {{ old('status', $store['status'] ?? '') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                            <option value="cancelled" {{ old('status', $store['status'] ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            <option value="terminated" {{ old('status', $store['status'] ?? '') == 'terminated' ? 'selected' : '' }}>Terminated</option>
                                        </select>

                                        <!-- Only show button when status is active -->
                                        <button type="button" class="bg-indigo-600 text-white w-full p-2" @click="suspendModalOpen = !suspendModalOpen">Suspend Store</button>
                                        <button type="button" class="bg-indigo-600 text-white w-full p-2" @click="cancelModalOpen = !cancelModalOpen">Cancel Store</button>
                                        <button type="button" class="bg-indigo-600 text-white w-full p-2" @click="reactivateModalOpen = !reactivateModalOpen">Reactivate Store</button>
                                    </div>
                                </div>

                                <div>
                                    <label>Plan Sku</label>

                                    <div class="flex items-center">
                                        <input type="text" class="py-2 px-3 border w-full mr-2" name="plan_sku" value="{{ old('plan_sku', $store['plan_sku'] ?? '') }}" disabled />
                                        <button type="button" class="bg-indigo-600 text-white w-full p-2" @click="changePlanModalOpen = !changePlanModalOpen">Change Plan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label>Store Name</label>
                                    <input type="text" class="py-2 px-3 border w-full" name="store_name" value="{{ old('store_name', $store['store_name'] ?? '') }}" />
                                </div>

                                <div>
                                    <label>Store Hash</label>
                                    <input type="text" class="py-2 px-3 border w-full" name="store_hash" value="{{ old('store_hash', $store['store_hash'] ?? '') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label>Primary Hostname</label>
                                    <input type="text" class="py-2 px-3 border w-full" name="primary_hostname" value="{{ old('primary_hostname', $store['primary_hostname'] ?? '') }}" />
                                </div>

                                <div>
                                    <label>Canonical Hostname</label>
                                    <input type="text" class="py-2 px-3 border w-full" name="canonical_hostname" value="{{ old('canonical_hostname', $store['canonical_hostname'] ?? '') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label>Country</label>
                                    <input type="text" class="py-2 px-3 border w-full" name="country" value="{{ old('country', $store['country'] ?? '') }}" />
                                </div>

                                <div>
                                    <label>Expires At</label>
                                    <input type="text" class="py-2 px-3 border w-full" name="expires_at" value="{{ old('expires_at', $store['expires_at'] ?? '') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <div class="mb-3">
                                        <label>Account Id</label>
                                        <input type="text" class="py-2 px-3 border w-full" name="account_id" value="{{ old('account_id', $store['account_id'] ?? '') }}" />
                                    </div>

                                    <div>
                                        <div class="flex items-center">
                                            <div class="mr-2">Store Launched:</div>
                                            <input type="checkbox"  name="store_launched" {{ (isset($store['store_launched']) && $store['store_launched']) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white">{{ __('Update') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        @include('stores.partials.change-plan-modal')
        @include('stores.partials.suspend-modal')
        @include('stores.partials.cancel-modal')
        @include('stores.partials.reactivate-modal')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function app() {
            return {
                changePlanModalOpen: false,
                changePlanConfirmModalOpen: false,
                suspendModalOpen: false,
                cancelModalOpen: false,
                reactivateModalOpen: false,
                suspend() {
                    $('.suspend-yes-btn').html('<svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path> </svg>');

                    $.ajax({
                        url: '{{ route('stores.suspend', ['store_id' => $store['id']]) }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                window.location.reload();
                            }
                        }
                    });
                },
                changePlan() {
                    var plan_sku = $('#plan').val();
                    var effect = $('#effect').val();

                    $('.change-plan-yes-btn').html('<svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path> </svg>');

                    $.ajax({
                        url: '{{ route('plans.change', ['store_id' => $store['id']]) }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            plan_sku: plan_sku,
                            effect: effect
                        },
                        success: function(response) {
                            if (response.success) {
                                window.location.reload();
                            }
                        }
                    });
                },
                cancel() {
                    $('.cancel-yes-btn').html('<svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path> </svg>');

                    $.ajax({
                        url: '{{ route('stores.cancel', ['store_id' => $store['id']]) }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: '{{ $store['id'] }}',
                            plan_sku: '{{ $store['plan_sku'] }}',
                            store_name: '{{ $store['store_name'] }}',
                            country: '{{ $store['country'] }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                window.location.reload();
                            }
                        }
                    });
                },
                reactivate() {
                    $('.reactivate-yes-btn').html('<svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path> </svg>');

                    $.ajax({
                        url: '{{ route('stores.reactivate', ['store_id' => $store['id']]) }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                window.location.reload();
                            }
                        }
                    });
                }
            };
        }
    </script>
</x-app-layout>
