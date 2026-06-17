@extends('layouts.admin.app')

@section('title', 'Pengguna')
@section('page-title', 'Pengguna')

@section('breadcrumb')
    <li class="breadcrumb-item active">Pengguna</li>
@endsection

@section('content')
<div class="card admin-card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-users"></i> Daftar Pengguna</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm btn-admin-add" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus"></i> Tambah Pengguna
            </button>
        </div>
    </div>

    @include('layouts.admin.partials.table-toolbar', [
        'action' => route('admin.users.index'),
        'search' => $search,
        'perPage' => $perPage,
        'searchPlaceholder' => 'Cari nama atau email pengguna...',
    ])

    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th class="col-num">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="col-actions">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="col-num">{{ $users->firstItem() + $loop->index }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="user-avatar mr-2" style="width:28px;height:28px;font-size:0.7rem;border-radius:8px;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </span>
                                <span class="font-weight-bold">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="text-muted">{{ $user->email }}</td>
                        <td>
                            @if ($user->is_admin)
                                <span class="badge badge-pill-custom badge-success">Admin</span>
                            @else
                                <span class="badge badge-pill-custom badge-secondary">Pengguna</span>
                            @endif
                        </td>
                        <td class="col-actions">
                            <div class="btn-group-actions">
                                <button type="button" class="btn btn-action btn-action-edit btn-edit"
                                    data-name="{{ $user->name }}"
                                    data-email="{{ $user->email }}"
                                    data-is-admin="{{ $user->is_admin ? '1' : '0' }}"
                                    data-action="{{ route('admin.users.update', $user) }}"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                @if ($user->id !== auth()->id())
                                    <button type="button" class="btn btn-action btn-action-delete btn-delete"
                                        data-name="{{ $user->name }}"
                                        data-action="{{ route('admin.users.destroy', $user) }}"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    @include('layouts.admin.partials.empty-state', [
                        'colspan' => 5,
                        'icon' => 'fa-users',
                        'message' => 'Belum ada pengguna ditemukan.',
                    ])
                @endforelse
            </tbody>
        </table>
    </div>

    @include('layouts.admin.partials.table-footer', ['paginator' => $users])
</div>

<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content admin-modal" method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user-plus text-primary mr-1"></i> Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Budi Santoso" required>
                </div>
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Contoh: budi@email.com" required>
                </div>
                <div class="form-group">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                </div>
                <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="create-is-admin" name="is_admin" value="1">
                        <label class="custom-control-label" for="create-is-admin">Jadikan sebagai Admin</label>
                    </div>
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
                <h5 class="modal-title"><i class="fas fa-user-edit text-warning mr-1"></i> Edit Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="edit-name" class="form-control" placeholder="Contoh: Budi Santoso" required>
                </div>
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="edit-email" class="form-control" placeholder="Contoh: budi@email.com" required>
                </div>
                <div class="form-group">
                    <label>Password <small class="text-muted">(kosongkan jika tidak diubah)</small></label>
                    <input type="password" name="password" class="form-control" placeholder="Password baru (opsional)">
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
                </div>
                <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="edit-is-admin" name="is_admin" value="1">
                        <label class="custom-control-label" for="edit-is-admin">Jadikan sebagai Admin</label>
                    </div>
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
                <h5 class="modal-title"><i class="fas fa-trash text-danger mr-1"></i> Hapus Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Apakah Anda yakin ingin menghapus pengguna <strong id="delete-name"></strong>?</p>
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
    $('.btn-edit').on('click', function () {
        $('#editForm').attr('action', $(this).data('action'));
        $('#edit-name').val($(this).data('name'));
        $('#edit-email').val($(this).data('email'));
        $('#edit-is-admin').prop('checked', $(this).data('is-admin') == '1');
        $('#editModal').modal('show');
    });

    $('.btn-delete').on('click', function () {
        $('#deleteForm').attr('action', $(this).data('action'));
        $('#delete-name').text($(this).data('name'));
        $('#deleteModal').modal('show');
    });
</script>
@endpush
