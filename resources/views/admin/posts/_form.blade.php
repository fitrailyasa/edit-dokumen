@php $post = $post ?? null; @endphp
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Judul <span class="text-danger">*</span></label>
            <input type="text" name="title" id="post-title" class="form-control"
                value="{{ old('title', $post?->title) }}" placeholder="Contoh: Cara Edit PDF Online dengan Mudah"
                required>
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" id="post-slug" class="form-control"
                value="{{ old('slug', $post?->slug) }}" placeholder="Otomatis dari judul, contoh: cara-edit-pdf-online">
        </div>
        <div class="form-group">
            <label>Ringkasan</label>
            <textarea name="excerpt" class="form-control" rows="3"
                placeholder="Ringkasan singkat artikel yang akan tampil di halaman daftar...">{{ old('excerpt', $post?->excerpt) }}</textarea>
        </div>
        <div class="form-group form-group-content">
            <label>Konten <span class="text-danger">*</span></label>
            <textarea name="body" class="form-control tinymce" rows="24" required>{{ old('body', $post?->body) }}</textarea>
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
                        <option value="draft" @selected(old('status', $post?->status ?? 'draft') === 'draft')>Draft</option>
                        <option value="published" @selected(old('status', $post?->status) === 'published')>Published</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Publikasi</label>
                    <input type="datetime-local" name="published_at" class="form-control"
                        value="{{ old('published_at', $post?->published_at?->format('Y-m-d\TH:i')) }}"
                        title="Kosongkan untuk menggunakan waktu saat ini saat dipublish">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="category_id" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $post?->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tag</label>
                    <select name="tags[]" class="form-control select2-multiselect" multiple
                        data-placeholder="Pilih tag...">
                        @php $selectedTags = old('tags', $post?->tags?->pluck('id')->toArray() ?? []); @endphp
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @selected(in_array($tag->id, $selectedTags))>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Ketik untuk mencari, klik untuk memilih banyak tag</small>
                </div>
                <div class="form-group mb-0">
                    <label>Gambar Utama</label>
                    <input type="file" name="featured_image" class="form-control-file" accept="image/*"
                        title="Format: JPG, PNG, WEBP. Maks. 2MB">
                    <small class="text-muted d-block mt-1">JPG, PNG, WEBP — maks. 2MB</small>
                    @if ($post?->featured_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Featured"
                                class="img-fluid rounded">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
