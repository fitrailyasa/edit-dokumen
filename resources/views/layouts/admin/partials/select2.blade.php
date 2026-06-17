@props(['selector' => '.select2-multiselect', 'placeholder' => 'Pilih...'])

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof $ === 'undefined' || !$.fn.select2) {
            return;
        }

        $(@json($selector)).select2({
            theme: 'bootstrap4',
            width: '100%',
            placeholder: @json($placeholder),
            allowClear: true,
            closeOnSelect: false,
        });
    });
</script>
@endpush
