@extends('layouts.admin.app')

@section('title', 'Tag')
@section('page-title', 'Tag')

@section('breadcrumb')
    <li class="breadcrumb-item active">Tag</li>
@endsection

@section('content')
<div class="card admin-card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-tags"></i> Daftar Tag</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm btn-admin-add" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus"></i> Tambah Tag
            </button>
        </div>
    </div>

    @include('layouts.admin.partials.table-toolbar', [
        'action' => route('admin.tags.index'),
        'search' => $search,
        'perPage' => $perPage,
        'searchPlaceholder' => 'Cari nama atau slug tag...',
    ])

    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th class="col-num">#</th>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th class="col-actions">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td class="col-num">{{ $tags->firstItem() + $loop->index }}</td>
                        <td class="font-weight-bold">{{ $tag->name }}</td>
                        <td><span class="slug-code">{{ $tag->slug }}</span></td>
                        <td class="col-actions">
                            <div class="btn-group-actions">
                                <button type="button" class="btn btn-action btn-action-edit btn-edit"
                                    data-name="{{ $tag->name }}"
                                    data-slug="{{ $tag->slug }}"
                                    data-action="{{ route('admin.tags.update', $tag) }}"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-action btn-action-delete btn-delete"
                                    data-name="{{ $tag->name }}"
                                    data-action="{{ route('admin.tags.destroy', $tag) }}"
                                    title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    @include('layouts.admin.partials.empty-state', [
                        'colspan' => 4,
                        'icon' => 'fa-tags',
                        'message' => 'Belum ada tag ditemukan.',
                    ])
                @endforelse
            </tbody>
        </table>
    </div>

    @include('layouts.admin.partials.table-footer', ['paginator' => $tags])
</div>

<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content admin-modal" method="POST" action="{{ route('admin.tags.store') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus-circle text-primary mr-1"></i> Tambah Tag</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="create-name" class="form-control" placeholder="Contoh: Laravel" required>
                </div>
                <div class="form-group mb-0">
                    <label>Slug</label>
                    <input type="text" name="slug" id="create-slug" class="form-control" placeholder="Otomatis dari nama, contoh: laravel">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content admin-modal" id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit text-warning mr-1"></i> Edit Tag</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="edit-name" class="form-control" placeholder="Contoh: Laravel" required>
                </div>
                <div class="form-group mb-0">
                    <label>Slug</label>
                    <input type="text" name="slug" id="edit-slug" class="form-control" placeholder="Contoh: laravel">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning"><i class="fas fa-save mr-1"></i> Update</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content admin-modal" id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-trash text-danger mr-1"></i> Hapus Tag</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Apakah Anda yakin ingin menghapus tag <strong id="delete-name"></strong>?</p>
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
    const tagCreateSlug = initAutoSlug('#create-name', '#create-slug');
    const tagEditSlug = initAutoSlug('#edit-name', '#edit-slug');

    $('#createModal').on('show.bs.modal', function () {
        tagCreateSlug?.clear();
    });

    $('.btn-edit').on('click', function () {
        $('#editForm').attr('action', $(this).data('action'));
        tagEditSlug?.reset($(this).data('name'), $(this).data('slug'));
        $('#editModal').modal('show');
    });

    $('.btn-delete').on('click', function () {
        $('#deleteForm').attr('action', $(this).data('action'));
        $('#delete-name').text($(this).data('name'));
        $('#deleteModal').modal('show');
    });
</script>
@endpush
