<div class="admin-card-footer">
    <div class="pagination-info">
        <i class="fas fa-database mr-1"></i>
        Menampilkan <strong>{{ $paginator->firstItem() ?? 0 }}–{{ $paginator->lastItem() ?? 0 }}</strong>
        dari <strong>{{ $paginator->total() }}</strong> data
    </div>
    @if ($paginator->hasPages())
        <div>{{ $paginator->links() }}</div>
    @endif
</div>
