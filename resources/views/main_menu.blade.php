
    <li class="nav-item {{ request()->routeIs('Home')?'active':'' }}"><a class="nav-link" href="{{ route('Home') }}">Главная</a></li>
    <li class="nav-item {{ request()->routeIs('About')?'active':'' }}"><a class="nav-link" href="{{ route('About') }}">О сервисе</a></li>
    <li class="nav-item {{ request()->routeIs('news.category.index')?'active':'' }}"><a class="nav-link" href="{{ route('news.category.index') }}">Категории</a></li>
    <li class="nav-item {{ request()->routeIs('news.index')?'active':'' }}"><a class="nav-link" href="{{ route('news.index') }}">Новости</a></li>
    @auth
    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin)
        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.news.index') }}">Adminka</a></li>
        @endif
    @endauth
