@if ($pageInfo['count'] > 0 && ceil($pageInfo['total_pages'] / $pageInfo['count']) > 0)
    @php
        $params = Request::input();
    @endphp
    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm mt-10" aria-label="Pagination">
        @if ($pageInfo['current_page'] > 1)
            <a href="{{ request()->fullUrlWithQuery(['page' => $pageInfo['current_page'] - 1]) }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span class="sr-only">Previous</span>
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                </svg>
            </a>
        @endif

        @if ($pageInfo['current_page'] > 3)
            <a href="{{ request()->fullUrlWithQuery(['page' => 1]) }}" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">1</a>
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
        @endif

        @if ($pageInfo['current_page'] - 2 > 0)
            <a href="{{ request()->fullUrlWithQuery(['page' => $pageInfo['current_page'] - 2]) }}" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">{{ $pageInfo['current_page'] - 2 }}</a>
        @endif

        @if ($pageInfo['current_page'] - 1 > 0)
            <a href="{{ request()->fullUrlWithQuery(['page' => $pageInfo['current_page'] - 1]) }}" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">{{ $pageInfo['current_page'] - 1 }}</a>
        @endif

        <a href="{{ request()->fullUrlWithQuery(['page' => $pageInfo['current_page']]) }}" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ $pageInfo['current_page'] }}</a>

        @if ($pageInfo['current_page'] + 1 < $pageInfo['total_pages'] + 1)
            <a href="{{ request()->fullUrlWithQuery(['page' => $pageInfo['current_page'] + 1]) }}" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">{{ $pageInfo['current_page'] + 1 }}</a>
        @endif

        @if ($pageInfo['current_page'] + 2 < $pageInfo['total_pages'] + 1)
            <a href="{{ request()->fullUrlWithQuery(['page' => $pageInfo['current_page'] + 2]) }}" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">{{ $pageInfo['current_page'] + 2 }}</a>
        @endif

        @if ($pageInfo['current_page'] < $pageInfo['total_pages'] - 2)
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
            <a href="{{ request()->fullUrlWithQuery(['page' => $pageInfo['total_pages']]) }}" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">{{ $pageInfo['total_pages'] }}</a>
        @endif

        @if ($pageInfo['current_page'] < $pageInfo['total_pages'])
            <a href="{{ request()->fullUrlWithQuery(['page' => $pageInfo['current_page'] + 1]) }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span class="sr-only">Next</span>
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
            </a>
        @endif
    </nav>
@endif
