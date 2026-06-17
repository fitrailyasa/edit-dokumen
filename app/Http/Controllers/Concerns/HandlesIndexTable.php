<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;

trait HandlesIndexTable
{
    protected function resolvePerPage(Request $request): int
    {
        $perPage = (int) $request->input('per_page', 10);

        return in_array($perPage, [10, 25, 50, 100], true) ? $perPage : 10;
    }

    protected function resolveSearch(Request $request): ?string
    {
        $search = trim((string) $request->input('search', ''));

        return $search !== '' ? $search : null;
    }
}
