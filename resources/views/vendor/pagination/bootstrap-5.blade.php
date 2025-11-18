<style>
    .pagination-wrapper {
        padding: 25px 0;
        background: rgba(255, 255, 255, 0.25);
        border-radius: 12px;
        backdrop-filter: blur(4px);
        /* efek halus */
    }

    /* Pagination Container */
    .pagination {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    /* Default Button */
    .pagination .page-item .page-link {
        padding: 8px 16px;
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, 0.07);
        background: rgba(255, 255, 255, 0.8);
        color: #333;
        font-weight: 500;
        transition: all 0.25s ease;
    }

    /* Hover */
    .pagination .page-item .page-link:hover {
        background: #e65757;
        border-color: #FFB703;
        color: #fff;
        box-shadow: 0 3px 8px rgba(74, 144, 226, 0.25);
    }

    /* Active Page */
    .pagination .page-item.active .page-link {
        background: #e65757;
        border-color: #FFB703;
        color: white;
        box-shadow: 0 3px 8px rgba(13, 110, 253, 0.35);
    }

    /* Disabled Button */
    .pagination .page-item.disabled .page-link {
        background: rgba(255, 255, 255, 0.6);
        border-color: rgba(0, 0, 0, 0.08);
        color: #b8b8b8;
    }

    .pagination-info {
        margin-right: 20px;
        /* bisa diubah 15–40px sesuai selera */
    }


    /* Responsive */
    @media(max-width: 576px) {
        .pagination .page-link {
            padding: 6px 10px;
            font-size: 14px;
        }
    }
</style>

@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                            rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div class="pagination-info">
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span
                                    class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span
                                            class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                                aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
