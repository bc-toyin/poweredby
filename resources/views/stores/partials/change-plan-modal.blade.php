<div x-show="changePlanModalOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak @click="changePlanModalOpen = false" x-show="changePlanModalOpen"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
        ></div>

        <div x-cloak x-show="changePlanModalOpen"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
        >
            <div class="flex items-center justify-between space-x-4">
                <h1 class="text-xl font-medium text-gray-800 ">Select Plan</h1>

                <button @click="changePlanModalOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>

            <p class="mt-2 text-sm text-gray-500 ">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque voluptatibus doloremque enim sapiente nostrum voluptatum quod officia deserunt laborum voluptates perferendis beatae ducimus ipsum, ipsa molestias sint. Eius, odit fugit.
            </p>

            <form class="mt-5">
                <div class="flex flex-col mb-5">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="plan">Plan</label>
                    <select class="py-2 px-3 border w-full" id="plan">
                        <option value="STORE-STANDARD-NP-MONTHLY" {{ $store['plan_sku'] == 'STORE-STANDARD-NP-MONTHLY' ? 'selected' : '' }}>STORE-STANDARD-NP-MONTHLY</option>
                        <option value="STORE-PLUS-NP-MONTHLY" {{ $store['plan_sku'] == 'STORE-PLUS-NP-MONTHLY' ? 'selected' : '' }}>STORE-PLUS-NP-MONTHLY</option>
                        <option value="STORE-PRO-NP-MONTHLY-T11" {{ $store['plan_sku'] == 'STORE-PRO-NP-MONTHLY-T11' ? 'selected' : '' }}>STORE-PRO-NP-MONTHLY-T11</option>
                        <option value="STORE-ENTERPRISE-TRIAL-30DAY" {{ $store['plan_sku'] == 'STORE-ENTERPRISE-TRIAL-30DAY' ? 'selected' : '' }}>STORE-ENTERPRISE-TRIAL-30DAY</option>
                        <option value="STORE-TRIAL-15DAY" {{ $store['plan_sku'] == 'STORE-TRIAL-15DAY' ? 'selected' : '' }}>STORE-TRIAL-15DAY</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="plan">Effect</label>
                    <select class="py-2 px-3 border w-full" id="effect">
                        <option value="IMMEDIATELY">IMMEDIATELY</option>
                        <option value="BILLCYCLEDAY">BILLCYCLEDAY</option>
                    </select>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="button" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50" @click="changePlanConfirmModalOpen = !changePlanConfirmModalOpen">
                        Select
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div x-show="changePlanConfirmModalOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak @click="changePlanConfirmModalOpen = false" x-show="changePlanConfirmModalOpen"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
        ></div>

        <div x-cloak x-show="changePlanConfirmModalOpen"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
        >
            <div class="flex items-center justify-between space-x-4">
                <h1 class="text-xl font-medium text-gray-800 ">Are you sure?</h1>

                <button @click="changePlanConfirmModalOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>

            <form class="mt-5">
                <div class="flex justify-end mt-6">
                    <button type="button" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50 mr-3" @click="changePlanConfirmModalOpen = false">
                        Cancel
                    </button>
                    <button type="button" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 change-plan-yes-btn" @click="changePlan()">
                        Yes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
