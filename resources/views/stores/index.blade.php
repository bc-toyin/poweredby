<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('layouts.flash')

                    <div class="relative rounded-xl overflow-auto">
                        <table class="border-collapse table-auto w-full text-sm">
                            <thead>
                                <tr>
                                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 dark:text-slate-200 text-left">Name</th>
                                    <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 dark:text-slate-200 text-left">Country</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-slate-800">
                                @foreach ($stores as $store)
                                    <tr>
                                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 dark:text-slate-400">
                                            <a href="{{ route('stores.show', ['store_id' => $store['id']]) }}" class="text-indigo-600 underline">{{ $store['name'] }}</a>
                                        </td>
                                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 dark:text-slate-400">{{ $store['country'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @include('layouts.pagination')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
