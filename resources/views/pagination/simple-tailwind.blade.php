@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        @if ($paginator->onFirstPage())
            <span class="block rounded-md py-2 px-3 border border-gray-300 bg-white text-sm font-medium text-gray-500 cursor-not-allowed">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="block rounded-md py-2 px-3 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-200 transition ease-in-out duration-150" rel="prev">&laquo;</a>
        @endif
        <div class="flex items-center space-x-2 text-gray-700">
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <a href="{{ $paginator->url($i) }}" class="px-3 py-2 border border-gray-300 bg-white text-sm font-medium hover:bg-gray-50 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-200 transition ease-in-out duration-150 ">{{ $i }}</a>
            @endfor
        </div>
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="ml-3 block rounded-md py-2 px-3 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-200 transition ease-in-out duration-150" rel="next">&raquo;</a>
        @else
            <span class="ml-3 block rounded-md py-2 px-3 border border-gray-300 bg-white text-sm font-medium text-gray-500 cursor-not-allowed">&raquo;</span>
        @endif
    </nav>
@endif
