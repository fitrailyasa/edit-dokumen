@extends('layouts.admin.app')

@section('title', 'Halaman')
@section('page-title', 'Halaman')

@section('breadcrumb')
    <li class="breadcrumb-item active">Halaman</li>
@endsection

@section('content')
<div class="card admin-card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-file-alt"></i> Daftar Halaman</h3>
        <div class="card-tools">
            <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm btn-admin-add">
                <i class="fas fa-plus"></i> Tambah Halaman
            </a>
        </div>
    </div>

    @include('layouts.admin.partials.table-toolbar', [
        'action' => route('admin.pages.index'),
        'search' => $search,
        'perPage' => $perPage,
        'status' => $status ?? '',
        'searchPlaceholder' => 'Cari judul, slug, atau penulis...',
    ])

    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th class="col-num">#</th>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Footer</th>
                    <th>Status</th>
                    <th>Penulis</th>
                    <th>Diperbarui</th>
                    <th class="col-actions">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $page)
                    <tr>
                        <td class="col-num">{{ $pages->firstItem() + $loop->index }}</td>
                        <td class="font-weight-bold">{{ $page->title }}</td>
                        <td>
                            <a href="{{ route('pages.show', $page->slug) }}" target="_blank" class="text-primary">
                                /{{ $page->slug }}
                            </a>
                        </td>
                        <td>
                            @if ($page->show_in_footer)
                                <span class="badge badge-pill-custom badge-info">Ya ({{ $page->footer_order }})</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-pill-custom badge-{{ $page->status === 'published' ? 'success' : 'secondary' }}">
                                {{ $page->status === 'published' ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ $page->user->name }}</td>
                        <td class="text-muted">{{ $page->updated_at->format('d M Y') }}</td>
                        <td class="col-actions">
                            <div class="btn-group-actions">
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-action btn-action-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-action btn-action-delete btn-delete"
                                    data-title="{{ $page->title }}"
                                    data-action="{{ route('admin.pages.destroy', $page) }}"
                                    title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    @include('layouts.admin.partials.empty-state', [
                        'colspan' => 8,
                        'icon' => 'fa-file-alt',
                        'message' => 'Belum ada halaman ditemukan.',
                    ])
                @endforelse
            </tbody>
        </table>
    </div>

    @include('layouts.admin.partials.table-footer', ['paginator' => $pages])
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content admin-modal" id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-trash text-danger mr-1"></i> Hapus Halaman</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Apakah Anda yakin ingin menghapus halaman <strong id="delete-title"></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i> Hapus</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.btn-delete').on('click', function () {
        $('#deleteForm').attr('action', $(this).data('action'));
        $('#delete-title').text($(this).data('title'));
        $('#deleteModal').modal('show');
    });
</script>
@endpush
