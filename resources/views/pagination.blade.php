<head>
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            list-style: none;
            padding: 0;
            gap: 8px;
        }

        .pagination-item {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            font-size: 14px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination-item:hover {
            background-color: #007bff;
            color: #fff;
        }

        .pagination-item.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination-item.disabled {
            color: #999;
            background-color: #f8f9fa;
            border-color: #ddd;
            pointer-events: none;
            cursor: not-allowed;
        }

        .pagination-item svg {
            width: 18px;
            height: 18px;
        }

        .pagination-item.active svg {
            color: #fff;
        }

        .pagination-item.disabled svg {
            color: #999;
        }
    </style>
</head>



@if ($paginator->hasPages())
    <nav class="pagination my-large">
        <!-- Previous Page -->
        @if ($paginator->onFirstPage())
            <span class="pagination-item disabled">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>
        @endif

        <!-- Pagination Numbers -->
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="pagination-item disabled"> {{ $element }} </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="pagination-item active"> {{ $page }} </span>
                    @else
                        <a href="{{ $url }}" class="pagination-item"> {{ $page }} </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        @else
            <span class="pagination-item disabled">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        @endif
    </nav>
@endif
