@extends('layouts.admin.app')

@section('title', 'Artikel')
@section('page-title', 'Artikel')

@section('breadcrumb')
    <li class="breadcrumb-item active">Artikel</li>
@endsection

@section('content')
<div class="card admin-card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-newspaper"></i> Daftar Artikel</h3>
        <div class="card-tools">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm btn-admin-add">
                <i class="fas fa-plus"></i> Tambah Artikel
            </a>
        </div>
    </div>

    @include('layouts.admin.partials.table-toolbar', [
        'action' => route('admin.posts.index'),
        'search' => $search,
        'perPage' => $perPage,
        'status' => $status ?? '',
        'searchPlaceholder' => 'Cari judul, kategori, penulis, atau tag...',
    ])

    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th class="col-num">#</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tag</th>
                    <th>Status</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th class="col-actions">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td class="col-num">{{ $posts->firstItem() + $loop->index }}</td>
                        <td class="font-weight-bold">{{ $post->title }}</td>
                        <td>
                            @if ($post->category)
                                <span class="badge badge-pill-custom badge-light border">{{ $post->category->name }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="tag-list">
                                @forelse ($post->tags as $tag)
                                    <span class="badge">{{ $tag->name }}</span>
                                @empty
                                    <span class="text-muted">-</span>
                                @endforelse
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-pill-custom badge-{{ $post->status === 'published' ? 'success' : 'secondary' }}">
                                {{ $post->status === 'published' ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ $post->user->name }}</td>
                        <td class="text-muted">{{ $post->created_at->format('d M Y') }}</td>
                        <td class="col-actions">
                            <div class="btn-group-actions">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-action btn-action-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-action btn-action-delete btn-delete"
                                    data-title="{{ $post->title }}"
                                    data-action="{{ route('admin.posts.destroy', $post) }}"
                                    title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    @include('layouts.admin.partials.empty-state', [
                        'colspan' => 8,
                        'icon' => 'fa-newspaper',
                        'message' => 'Belum ada artikel ditemukan.',
                    ])
                @endforelse
            </tbody>
        </table>
    </div>

    @include('layouts.admin.partials.table-footer', ['paginator' => $posts])
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content admin-modal" id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-trash text-danger mr-1"></i> Hapus Artikel</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Apakah Anda yakin ingin menghapus artikel <strong id="delete-title"></strong>?</p>
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
