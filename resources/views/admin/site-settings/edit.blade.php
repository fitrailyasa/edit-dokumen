@extends('layouts.admin.app')

@section('title', 'Pengaturan Situs')
@section('page-title', 'Pengaturan Situs')

@section('breadcrumb')
    <li class="breadcrumb-item active">Pengaturan Situs</li>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.site-settings.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card admin-card form-card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-info-circle"></i> Informasi Umum</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Judul Situs</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $settings->title) }}" placeholder="Contoh: Edit Dokumen">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tagline</label>
                        <input type="text" name="tagline" class="form-control" value="{{ old('tagline', $settings->tagline) }}" placeholder="Contoh: Solusi edit dokumen online terpercaya">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Deskripsi singkat tentang situs Anda...">{{ old('description', $settings->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Logo</label>
                        <div class="custom-file">
                            <input type="file" name="logo" class="custom-file-input" id="logoInput" accept="image/*">
                            <label class="custom-file-label" for="logoInput">Pilih file logo...</label>
                        </div>
                        @if ($settings->logo)
                            <div class="mt-3 p-2 bg-light rounded d-inline-block">
                                <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" style="max-height: 80px;">
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-0">
                        <label class="font-weight-bold">Alamat</label>
                        <textarea name="address" class="form-control" rows="3" placeholder="Contoh: Jl. Sudirman No. 1, Jakarta Pusat, DKI Jakarta">{{ old('address', $settings->address) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card admin-card form-card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-share-alt"></i> Kontak & Sosial Media</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold"><i class="fas fa-envelope text-muted mr-1"></i> Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $settings->email) }}" placeholder="Contoh: info@situsanda.com">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold"><i class="fas fa-phone text-muted mr-1"></i> Telepon</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $settings->phone) }}" placeholder="Contoh: 021-12345678">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold"><i class="fab fa-whatsapp text-success mr-1"></i> WhatsApp</label>
                        <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $settings->whatsapp) }}" placeholder="Contoh: 6281234567890">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold"><i class="fab fa-instagram text-danger mr-1"></i> Instagram</label>
                        <input type="text" name="instagram" class="form-control" value="{{ old('instagram', $settings->instagram) }}" placeholder="Contoh: https://instagram.com/username">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold"><i class="fab fa-tiktok mr-1"></i> TikTok</label>
                        <input type="text" name="tiktok" class="form-control" value="{{ old('tiktok', $settings->tiktok) }}" placeholder="Contoh: https://tiktok.com/@username">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold"><i class="fab fa-facebook text-primary mr-1"></i> Facebook</label>
                        <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $settings->facebook) }}" placeholder="Contoh: https://facebook.com/username">
                    </div>
                    <div class="form-group mb-0">
                        <label class="font-weight-bold"><i class="fab fa-twitter text-info mr-1"></i> Twitter / X</label>
                        <input type="text" name="twitter" class="form-control" value="{{ old('twitter', $settings->twitter) }}" placeholder="Contoh: https://twitter.com/username">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card admin-card">
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-primary btn-admin-add">
                <i class="fas fa-save"></i> Simpan Pengaturan
            </button>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    $('#logoInput').on('change', function () {
        const fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').text(fileName || 'Pilih file logo...');
    });
</script>
@endpush
