<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('standar.index') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo" srcset=""></a>
                    <span style="font-size: .7em;">AMIK Taruna</span>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-speedometer"></i>
                        <span>Dasboard</span>
                    </a>
                </li>
                @if (auth()->user()->role !== 'direktur')
                    <li class="sidebar-item {{ request()->routeIs('standar.*') ? 'active' : '' }}">
                        <a href="{{ route('standar.index') }}" class='sidebar-link'>
                            <i class="bi bi-clipboard-data"></i>
                            <span>Standar Mutu</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('indikator.*') ? 'active' : '' }}">
                        <a href="{{ route('indikator.index') }}" class='sidebar-link'>
                            <i class="bi bi-pie-chart"></i>
                            <span>Indikator Standar</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('pelaksanaan.*') ? 'active' : '' }}">
                        <a href="{{ route('pelaksanaan.index') }}" class='sidebar-link'>
                            <i class="bi bi-activity"></i>
                            <span>Pelaksanaan</span>
                        </a>
                    </li>
                @endif

                <li class="sidebar-item {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <a href="{{ route('laporan.index') }}" class='sidebar-link'>
                        <i class="bi bi-reception-4"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('akun.*') ? 'active' : '' }}">
                    <a href="{{ route('akun.index') }}" class='sidebar-link'>
                        <i class="bi bi-person-gear"></i>
                        <span>Akun</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="sidebar-link border-0 bg-transparent w-100 text-start">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
