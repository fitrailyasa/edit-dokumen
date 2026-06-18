<a href="{{ route('home') }}" @class(['active' => request()->routeIs('home')])>Beranda</a>
<a href="{{ route('services.index') }}" @class(['active' => request()->routeIs('services.index') || request()->routeIs('pages.show')])>Layanan</a>
<a href="{{ route('order-guide') }}" @class(['active' => request()->routeIs('order-guide')])>Cara Order</a>
<a href="{{ route('pricing') }}" @class(['active' => request()->routeIs('pricing')])>Harga</a>
<a href="{{ route('articles.index') }}" @class(['active' => request()->routeIs('articles.*')])>Artikel</a>
