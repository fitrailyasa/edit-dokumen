@extends('layouts.admin.app')

@section('title', 'Kategori')
@section('page-title', 'Kategori')

@section('breadcrumb')
    <li class="breadcrumb-item active">Kategori</li>
@endsection

@section('content')
<div class="card admin-card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-folder"></i> Daftar Kategori</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm btn-admin-add" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus"></i> Tambah Kategori
            </button>
        </div>
    </div>

    @include('layouts.admin.partials.table-toolbar', [
        'action' => route('admin.categories.index'),
        'search' => $search,
        'perPage' => $perPage,
        'searchPlaceholder' => 'Cari nama, slug, atau deskripsi...',
    ])

    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th class="col-num">#</th>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Artikel</th>
                    <th class="col-actions">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td class="col-num">{{ $categories->firstItem() + $loop->index }}</td>
                        <td class="font-weight-bold">{{ $category->name }}</td>
                        <td><span class="slug-code">{{ $category->slug }}</span></td>
                        <td><span class="badge badge-pill-custom badge-info">{{ $category->posts_count }}</span></td>
                        <td class="col-actions">
                            <div class="btn-group-actions">
                                <button type="button" class="btn btn-action btn-action-edit btn-edit"
                                    data-name="{{ $category->name }}"
                                    data-slug="{{ $category->slug }}"
                                    data-description="{{ $category->description }}"
                                    data-action="{{ route('admin.categories.update', $category) }}"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-action btn-action-delete btn-delete"
                                    data-name="{{ $category->name }}"
                                    data-action="{{ route('admin.categories.destroy', $category) }}"
                                    title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    @include('layouts.admin.partials.empty-state', [
                        'colspan' => 5,
                        'icon' => 'fa-folder-open',
                        'message' => 'Belum ada kategori ditemukan.',
                    ])
                @endforelse
            </tbody>
        </table>
    </div>

    @include('layouts.admin.partials.table-footer', ['paginator' => $categories])
</div>

<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content admin-modal" method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus-circle text-primary mr-1"></i> Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="create-name" class="form-control" placeholder="Contoh: Tutorial Dokumen" required>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" id="create-slug" class="form-control" placeholder="Otomatis dari nama, contoh: tutorial-dokumen">
                </div>
                <div class="form-group mb-0">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi singkat tentang kategori ini..."></textarea>
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
                <h5 class="modal-title"><i class="fas fa-edit text-warning mr-1"></i> Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="edit-name" class="form-control" placeholder="Contoh: Tutorial Dokumen" required>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" id="edit-slug" class="form-control" placeholder="Contoh: tutorial-dokumen">
                </div>
                <div class="form-group mb-0">
                    <label>Deskripsi</label>
                    <textarea name="description" id="edit-description" class="form-control" rows="3" placeholder="Deskripsi singkat tentang kategori ini..."></textarea>
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
                <h5 class="modal-title"><i class="fas fa-trash text-danger mr-1"></i> Hapus Kategori</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Apakah Anda yakin ingin menghapus kategori <strong id="delete-name"></strong>?</p>
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
    const categoryCreateSlug = initAutoSlug('#create-name', '#create-slug');
    const categoryEditSlug = initAutoSlug('#edit-name', '#edit-slug');

    $('#createModal').on('show.bs.modal', function () {
        categoryCreateSlug?.clear();
    });

    $('.btn-edit').on('click', function () {
        $('#editForm').attr('action', $(this).data('action'));
        categoryEditSlug?.reset($(this).data('name'), $(this).data('slug'));
        $('#edit-description').val($(this).data('description'));
        $('#editModal').modal('show');
    });

    $('.btn-delete').on('click', function () {
        $('#deleteForm').attr('action', $(this).data('action'));
        $('#delete-name').text($(this).data('name'));
        $('#deleteModal').modal('show');
    });
</script>
@endpush
