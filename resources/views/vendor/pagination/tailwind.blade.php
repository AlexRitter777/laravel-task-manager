@if ($paginator->hasPages())

    <div
        class="flex flex-col px-4 py-3 text-xs font-semibold tracking-wide text-gray-500  dark:border-gray-700  sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
    >
        {{--Showing block--}}
        <span class="flex justify-end items-center col-span-3 mb-2">
            {!! __('Showing') !!}
            @if ($paginator->firstItem())
                {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}
            @else
                {{ $paginator->count() }}
            @endif
            {!! __(' of ') !!}
            {{ $paginator->total() }}
        </span>

        {{--Pagination--}}

        <span class="flex justify-center col-span-4 mt-2 sm:mt-auto">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    {{-- Previous Page Link --}}
                    <li>
                        @if ($paginator->onFirstPage())
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="{{ __('pagination.previous') }}"
                                aria-disabled="true"
                            >
                                  <svg
                                      class="w-4 h-4 fill-gray-400"
                                      aria-hidden="true"
                                      viewBox="0 0 20 20"
                                  >
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                        fill-rule="evenodd"
                                    ></path>
                                  </svg>
                            </span>
                        @else
                            <a
                                href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                class="inline-flex items-center px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="{{ __('pagination.previous') }}"
                            >
                                  <svg
                                      class="w-4 h-4 fill-gray-400"
                                      aria-hidden="true"
                                      viewBox="0 0 20 20"
                                  >
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                        fill-rule="evenodd"
                                    ></path>
                                  </svg>
                            </a>
                        @endif
                    </li>

                    {{-- Pagination Elements --}}

                    @foreach ($elements as $element)

                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li>
                                    <span
                                        aria-disabled="true"
                                        class="inline-flex items-center px-3 py-1"
                                    >
                                        {{ $element }}
                                    </span>
                                </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                <li>
                                        @if ($page == $paginator->currentPage())
                                        <span aria-current="page">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-white transition-colors duration-150 bg-indigo-400 border border-r-0 border-b-indigo-400 rounded-md focus:outline-none focus:shadow-outline-purple dark:bg-gray-600 dark:active:bg-gray-600 dark:border-gray-600"
                                                >
                                                    {{ $page }}
                                                </span>
                                            </span>
                                    @else
                                        <a href="{{ $url }}" class="inline-flex items-center px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </a>
                                    @endif
                                    </li>
                            @endforeach
                        @endif

                    @endforeach

                    {{-- Next Page Link --}}

                    <li>
                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                               class="inline-flex items-center px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                               aria-label="{{ __('pagination.next') }}"
                            >
                            <svg
                                class="w-4 h-4 fill-gray-400"
                                aria-hidden="true"
                                viewBox="0 0 20 20"
                            >
                                    <path
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"
                                        fill-rule="evenodd"
                                    ></path>
                                </svg>
                        </a>
                        @else
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                aria-disabled="true"
                                aria-label="{{ __('pagination.next') }}"
                            >
                                <svg
                                    class="w-4 h-4 fill-gray-400"
                                    aria-hidden="true"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"
                                        fill-rule="evenodd"
                                    ></path>
                                </svg>
                            </span>
                        @endif
                    </li>

                </ul>
            </nav>
        </span>
    </div>

@endif
