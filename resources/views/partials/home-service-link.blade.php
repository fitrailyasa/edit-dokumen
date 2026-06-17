<a href="{{ route('pages.show', $service->slug) }}"
    style="display:flex;flex-direction:column;align-items:center;gap:5px;background:white;border:1px solid #E5E7EB;border-radius:10px;padding:12px 6px;text-decoration:none;">
    <span style="font-size:22px;">{{ $service->icon ?: '📄' }}</span>
    <span style="font-size:11px;font-weight:700;color:#1A1A2E;text-align:center;line-height:1.3;">{{ $service->title }}</span>
</a>
