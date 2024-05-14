<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Store') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('layouts.flash')

                    <form class="relative overflow-auto" method="post" action="{{ route('stores.store', ['account_id' => $account_id]) }}">
                        @csrf

                        <div class="mb-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label>Plan</label>
                                    <select class="py-2 px-3 border w-full" id="plan" name="plan_sku">
                                        <option value="STORE-STANDARD-NP-MONTHLY" {{ old('plan_sku') == 'STORE-STANDARD-NP-MONTHLY' ? 'selected' : '' }}>STORE-STANDARD-NP-MONTHLY</option>
                                        <option value="STORE-PLUS-NP-MONTHLY" {{ old('plan_sku') == 'STORE-PLUS-NP-MONTHLY' ? 'selected' : '' }}>STORE-PLUS-NP-MONTHLY</option>
                                        <option value="STORE-PRO-NP-MONTHLY-T11" {{ old('plan_sku') == 'STORE-PRO-NP-MONTHLY-T11' ? 'selected' : '' }}>STORE-PRO-NP-MONTHLY-T11</option>
                                        <option value="STORE-ENTERPRISE-TRIAL-30DAY" {{ old('plan_sku') == 'STORE-ENTERPRISE-TRIAL-30DAY' ? 'selected' : '' }}>STORE-ENTERPRISE-TRIAL-30DAY</option>
                                        <option value="STORE-TRIAL-15DAY" {{ old('plan_sku') == 'STORE-TRIAL-15DAY' ? 'selected' : '' }}>STORE-TRIAL-15DAY</option>
                                    </select>
                                </div>

                                <div>
                                    <label>Store Name</label>
                                    <input type="text" class="py-2 px-3 border w-full" name="store_name" value="{{ old('store_name') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label>Country</label>
                                    <input type="text" class="py-2 px-3 border w-full" name="country" value="{{ old('country') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white">{{ __('Save') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
