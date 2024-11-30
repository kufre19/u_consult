@push('extra-css')
    .page-breadcrumb {
    padding: 1.5rem 0;
    }

    .breadcrumb-title {
    font-size: 1.25rem;
    font-weight: 500;
    color: #333;
    }

    .breadcrumb {
    margin: 0;
    padding: 0;
    background: transparent;
    align-items: center;
    }

    .breadcrumb-item {
    display: flex;
    align-items: center;
    }

    .breadcrumb-item a {
    color: #6c757d;
    text-decoration: none;
    }

    .breadcrumb-item.active {
    color: #333;
    }

    .breadcrumb-item + .breadcrumb-item::before {
    content: "/";
    color: #6c757d;
    }

    .bx {
    font-size: 1.2rem;
    }

    .action-button {
    margin-left: auto;
    }

    @media (max-width: 768px) {
    .page-breadcrumb {
    flex-direction: column;
    }

    .action-button {
    margin-top: 1rem;
    margin-left: 0;
    }
    }
@endpush


@props(['title', 'breadcrumbs' => []])

<div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
    <div class="d-flex align-items-center mb-3 mb-md-0">
        <div class="breadcrumb-title pe-3">{{ $title }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            <i class="bx bx-play"></i>
                        </a>
                    </li>
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if (!$loop->last)
                            <li class="breadcrumb-item">
                                <a href="{{ $breadcrumb['url'] ?? '#' }}">
                                    {{ $breadcrumb['label'] }}
                                </a>
                            </li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $breadcrumb['label'] }}
                            </li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
    {{ $slot }}
</div>
