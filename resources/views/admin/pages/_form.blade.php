@php $page = $page ?? null; @endphp
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Judul <span class="text-danger">*</span></label>
            <input type="text" name="title" id="page-title" class="form-control"
                value="{{ old('title', $page?->title) }}" placeholder="Contoh: Jasa Edit PDF" required>
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" id="page-slug" class="form-control"
                value="{{ old('slug', $page?->slug) }}" placeholder="Otomatis dari judul, contoh: jasa-edit-pdf">
            <small class="text-muted">URL: /slug-halaman</small>
        </div>
        <div class="form-group">
            <label>Ikon (emoji)</label>
            <input type="text" name="icon" class="form-control" maxlength="16"
                value="{{ old('icon', $page?->icon) }}" placeholder="Contoh: 📝">
        </div>
        <div class="form-group">
            <label>Ringkasan</label>
            <textarea name="excerpt" class="form-control" rows="3" placeholder="Ringkasan singkat halaman...">{{ old('excerpt', $page?->excerpt) }}</textarea>
        </div>
        <div class="form-group form-group-content">
            <label>Konten <span class="text-danger">*</span></label>
            <textarea name="body" class="form-control tinymce" rows="24" required>{{ old('body', $page?->body) }}</textarea>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card admin-card form-card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-paper-plane"></i> Publikasi</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control" required>
                        <option value="draft" @selected(old('status', $page?->status ?? 'draft') === 'draft')>Draft</option>
                        <option value="published" @selected(old('status', $page?->status) === 'published')>Published</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Publikasi</label>
                    <input type="datetime-local" name="published_at" class="form-control"
                        value="{{ old('published_at', $page?->published_at?->format('Y-m-d\TH:i')) }}"
                        title="Kosongkan untuk menggunakan waktu saat ini saat dipublish">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="show_on_home" name="show_on_home"
                            value="1" @checked(old('show_on_home', $page?->show_on_home))>
                        <label class="custom-control-label" for="show_on_home">Tampilkan di beranda</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Urutan Beranda</label>
                    <input type="number" name="home_order" class="form-control" min="0" max="9999"
                        value="{{ old('home_order', $page?->home_order ?? 0) }}">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured"
                            value="1" @checked(old('is_featured', $page?->is_featured))>
                        <label class="custom-control-label" for="is_featured">Layanan utama (kartu besar)</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Style Ikon Kartu</label>
                    <select name="icon_style" class="form-control">
                        <option value="">Default</option>
                        <option value="icon-purple" @selected(old('icon_style', $page?->icon_style) === 'icon-purple')>Ungu</option>
                        <option value="icon-blue" @selected(old('icon_style', $page?->icon_style) === 'icon-blue')>Biru</option>
                        <option value="icon-pink" @selected(old('icon_style', $page?->icon_style) === 'icon-pink')>Pink</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tag Highlight</label>
                    <input type="text" name="highlights" class="form-control"
                        value="{{ old('highlights', $page?->highlights ? implode(', ', $page->highlights) : '') }}"
                        placeholder="Edit Teks, Tanda Tangan, Layout">
                    <small class="text-muted">Pisahkan dengan koma untuk kartu layanan utama</small>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="show_in_footer" name="show_in_footer"
                            value="1" @checked(old('show_in_footer', $page?->show_in_footer))>
                        <label class="custom-control-label" for="show_in_footer">Tampilkan di footer</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Urutan Footer</label>
                    <input type="number" name="footer_order" class="form-control" min="0" max="9999"
                        value="{{ old('footer_order', $page?->footer_order ?? 0) }}">
                </div>
                <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control"
                        value="{{ old('meta_title', $page?->meta_title) }}" placeholder="Judul untuk SEO (opsional)">
                </div>
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Deskripsi untuk SEO (opsional)">{{ old('meta_description', $page?->meta_description) }}</textarea>
                </div>
                <div class="form-group mb-0">
                    <label>Gambar Utama</label>
                    <input type="file" name="featured_image" class="form-control-file" accept="image/*"
                        title="Format: JPG, PNG, WEBP. Maks. 2MB">
                    <small class="text-muted d-block mt-1">JPG, PNG, WEBP — maks. 2MB</small>
                    @if ($page?->featured_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $page->featured_image) }}" alt="Featured"
                                class="img-fluid rounded">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
