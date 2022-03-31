<ul class="navbar-nav sidebar sidebar-light accordion font-kalpurush" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}"
        target="_blank">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/images/test/logo.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'laravel') }}</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Route::is('admin.home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed {{ Route::is('admin.news.*') ? '' : 'collapsed' }}" href="javascript:void(0)"
            data-toggle="collapse" data-target="#news">
            <i class="fas fa-newspaper"></i>
            <span>সকল সংবাদ</span>
        </a>
        <div id="news"
            class="collapse {{ Route::is('admin.news.*') ||route::is('admin.motamot') ||route::is('admin.motamot.create') ||route::is('admin.motamot.edit') ||route::is('admin.sofolPerson') ||route::is('admin.sofolPerson.create') ||route::is('admin.sofolPerson.edit') ||route::is('admin.development') ||route::is('admin.development.create') ||route::is('admin.development.edit') ||Route::is('admin.khashKhobor') ||Route::is('admin.khashKhobor.create') ||Route::is('admin.khashKhobor.edit')? 'show': '' }}"
            aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can('admin.news.index')
                    <a class="collapse-item {{ Route::is('admin.news.index') ? 'active' : '' }}"
                        href="{{ route('admin.news.index') }}">সংবাদ</a>
                @endcan
                @can('admin.motamot')
                    <a class="collapse-item {{ Route::is('admin.motamot') ? 'active' : '' }}"
                        href="{{ route('admin.motamot') }}">মতামত</a>
                @endcan
                @can('admin.sofolPerson')
                    <a class="collapse-item {{ Route::is('admin.sofolPerson') ? 'active' : '' }}"
                        href="{{ route('admin.sofolPerson') }}">সফল যারা</a>
                @endcan
                @can('admin.khashKhobor')
                    <a class="collapse-item {{ Route::is('admin.khashKhobor') ? 'active' : '' }}"
                        href="{{ route('admin.khashKhobor') }}">খাস খবর</a>
                @endcan
                @can('admin.development')
                    <a class="collapse-item {{ Route::is('admin.development') ? 'active' : '' }}"
                        href="{{ route('admin.development') }}">উন্নয়নের অংশীদার</a>
                @endcan
            </div>
        </div>
    </li>
    @can('admin.category.index')
        <li class="nav-item {{ Route::is('admin.category.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="{{ route('admin.category.index') }}">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>নিউজ ক্যাটাগরি</span>
            </a>
        </li>
    @endcan
    @can('admin.advertisement.index')
        <li class="nav-item {{ Route::is('admin.advertisement.*') ? 'active' : '' }}">
            <a class="nav-link collapsed " href="{{ route('admin.advertisement.index') }}">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>বিজ্ঞাপন</span>
            </a>
        </li>
    @endcan
    @can('admin.prayer.index')
        <li class="nav-item {{ Route::is('admin.prayer.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="{{ route('admin.prayer.index') }}">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>নামাজের সময় সূচী</span>
            </a>
        </li>
    @endcan
    @can('admin.multimedia.index')
        <li class="nav-item {{ Route::is('admin.multimedia.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="{{ route('admin.multimedia.index') }}">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>মাল্টিমিডিয়া</span>
            </a>
        </li>
    @endcan
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        এডমিন এবং অনুমতি
    </div>
    @can('admin.user.index')
        <li class="nav-item">
            <a class="nav-link collapsed {{ Route::is('admin.user.*') || Route::is('admin.role.*') ? '' : 'collapsed' }}"
                href="javascript:void(0)" data-toggle="collapse" data-target="#up_report">
                <i class="fas fa-shield-alt"></i>
                <span>সকল এডমিন এবং পারমিশন</span>
            </a>
            <div id="up_report"
                class="collapse {{ Route::is('admin.user.*') || Route::is('admin.role.*') ? 'show' : '' }}"
                aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @can('admin.user.index')
                        <a class="collapse-item {{ Route::is('admin.user.*') ? 'active' : '' }}"
                            href="{{ route('admin.user.index') }}">এডমিন</a>
                    @endcan
                    @can('admin.role.index')
                        <a class="collapse-item {{ Route::is('admin.role.*') ? 'active' : '' }}"
                            href="{{ route('admin.role.index') }}">রোল পারমিশন</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcan
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Log Out
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Log Out</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
