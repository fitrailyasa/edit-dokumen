@php
    $hasFilters = request('search') || request('status') || (request('per_page') && request('per_page') != 10);
@endphp

<div class="admin-filter">
    <form method="GET" action="{{ $action }}">
        <div class="row align-items-end">
            <div class="col-md-5 col-lg-4">
                <div class="filter-label">Pencarian</div>
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" name="search" class="form-control"
                        value="{{ $search ?? '' }}" placeholder="{{ $searchPlaceholder ?? 'Cari data...' }}">
                </div>
            </div>

            @isset($status)
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="filter-label">Status</div>
                    <select name="status" class="form-control form-control-sm custom-select custom-select-sm">
                        <option value="">Semua Status</option>
                        <option value="draft" @selected(($status ?? '') === 'draft')>Draft</option>
                        <option value="published" @selected(($status ?? '') === 'published')>Published</option>
                    </select>
                </div>
            @endisset

            <div class="col-6 col-md-3 col-lg-2">
                <div class="filter-label">Tampilkan</div>
                <select name="per_page" class="form-control form-control-sm custom-select custom-select-sm">
                    @foreach ([10, 25, 50, 100] as $size)
                        <option value="{{ $size }}" @selected(($perPage ?? 10) == $size)>{{ $size }} / halaman</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                    <button type="submit" class="btn btn-primary btn-sm btn-filter">
                        <i class="fas fa-filter"></i> Terapkan
                    </button>
                    @if ($hasFilters)
                        <a href="{{ $action }}" class="btn btn-outline-secondary btn-sm btn-filter">
                            <i class="fas fa-times"></i> Reset
                        </a>
                    @endif
                </div>
            </div>
        </div>

        @if ($hasFilters)
            <div class="active-filters">
                @if (request('search'))
                    <span class="filter-badge"><i class="fas fa-search"></i> "{{ request('search') }}"</span>
                @endif
                @if (request('status'))
                    <span class="filter-badge"><i class="fas fa-circle"></i> {{ ucfirst(request('status')) }}</span>
                @endif
                @if (request('per_page') && request('per_page') != 10)
                    <span class="filter-badge"><i class="fas fa-list"></i> {{ request('per_page') }} / halaman</span>
                @endif
            </div>
        @endif
    </form>
</div>
