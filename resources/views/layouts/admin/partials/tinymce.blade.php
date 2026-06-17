@props(['selector' => 'textarea.tinymce', 'height' => 720])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.5/tinymce.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof tinymce === 'undefined') {
                return;
            }

            tinymce.init({
                selector: @json($selector),
                height: {{ (int) $height }},
                menubar: false,
                plugins: 'lists link image table code fullscreen',
                toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright | bullist numlist | link image table | removeformat code fullscreen',
                branding: false,
                promotion: false,
                license_key: 'gpl',
                content_style: 'body { font-family: Inter, sans-serif; font-size: 14px; line-height: 1.6; }',
                images_upload_handler: function(blobInfo) {
                    return Promise.reject(
                        'Upload gambar belum dikonfigurasi. Gunakan URL gambar langsung.');
                },
                setup: function(editor) {
                    editor.on('change', function() {
                        editor.save();
                    });
                },
            });
        });
    </script>
@endpush
