<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HandlesIndexTable;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    use HandlesIndexTable;

    private const RESERVED_SLUGS = [
        'admin', 'artikel', 'dashboard', 'login', 'register', 'profile', 'api', 'storage',
    ];

    public function index(Request $request)
    {
        $search = $this->resolveSearch($request);
        $perPage = $this->resolvePerPage($request);
        $status = $request->input('status');

        $pages = Page::with('user')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%");
                })
                    ->orWhereHas('user', fn ($query) => $query->where('name', 'like', "%{$search}%"));
            })
            ->when(in_array($status, ['draft', 'published'], true), fn ($query) => $query->where('status', $status))
            ->orderByDesc('updated_at')
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.pages.index', compact('pages', 'search', 'perPage', 'status'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatePage($request);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('pages', 'public');
        }

        $validated['user_id'] = auth()->id();

        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        Page::create($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil ditambahkan.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $this->validatePage($request, $page);

        if ($request->hasFile('featured_image')) {
            if ($page->featured_image) {
                Storage::disk('public')->delete($page->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('pages', 'public');
        }

        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = $page->published_at ?? now();
        }

        if ($validated['status'] === 'draft') {
            $validated['published_at'] = null;
        }

        $page->update($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil diperbarui.');
    }

    public function destroy(Page $page)
    {
        if ($page->featured_image) {
            Storage::disk('public')->delete($page->featured_image);
        }

        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil dihapus.');
    }

    private function validatePage(Request $request, ?Page $page = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('pages', 'slug')->ignore($page?->id),
                Rule::notIn(self::RESERVED_SLUGS),
            ],
            'icon' => ['nullable', 'string', 'max:16'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'max:2048'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
            'show_on_home' => ['nullable', 'boolean'],
            'home_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'is_featured' => ['nullable', 'boolean'],
            'icon_style' => ['nullable', 'string', 'max:32'],
            'highlights' => ['nullable', 'string'],
            'show_in_footer' => ['nullable', 'boolean'],
            'footer_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'published_at' => ['nullable', 'date'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if (in_array($validated['slug'], self::RESERVED_SLUGS, true)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'slug' => 'Slug ini tidak dapat digunakan.',
            ]);
        }

        $validated['show_in_footer'] = $request->boolean('show_in_footer');
        $validated['footer_order'] = (int) ($validated['footer_order'] ?? 0);
        $validated['show_on_home'] = $request->boolean('show_on_home');
        $validated['home_order'] = (int) ($validated['home_order'] ?? 0);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['highlights'] = collect(explode(',', (string) ($validated['highlights'] ?? '')))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->all() ?: null;

        return $validated;
    }
}
