<nav class="flex mt-[32px] justify-between" aria-label="Table navigation">
    <span class="text-sm text-gray-700 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white"> {{ $paginator->firstItem()}} <span class="font-medium">to</span> {{ $paginator->lastItem() }} </span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total()}}</span></span>
    <ul class="inline-flex items-center -space-x-px">
{{--         Previous Page Link--}}
        @if ($paginator->onFirstPage())
            <button type="button" class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>
                <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                Previous
            </button>
        @else
            <a href="#" class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-white bg-blue-600 border border-blue-300 rounded-lg hover:bg-blue-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                Previous
            </a>
        @endif

{{--         Pagination Elements--}}
{{--        @foreach ($elements as $element)--}}

{{--            @if (is_string($element))--}}
{{--                <li class="page-item disabled px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
{{--            @endif--}}

{{--             Array Of Links--}}
{{--            @if (is_array($element))--}}
{{--                @foreach ($element as $page => $url)--}}
{{--                    @if ($page == $paginator->currentPage())--}}
{{--                        <li class="page-item active" aria-current="page"><span class="page-link z-10 px-3 py-2 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span></li>--}}
{{--                    @else--}}
{{--                        <li class="page-item "><a class="page-link px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--         Next Page Link--}}
        @if ($paginator->hasMorePages())
            <a href="#" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-blue-600 border border-blue-300 rounded-lg hover:bg-blue-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
                <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
            </a>
        @else
            <button type="button" class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>
                Next
                <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
            </button>
        @endif
    </ul>
</nav>
