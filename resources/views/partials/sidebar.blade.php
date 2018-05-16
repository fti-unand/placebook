<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-title">Menu</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="nav-icon icon-people"></i> Manajemen User
                </a>
                <a class="nav-link" href="{{ route('laporans.index') }}">
                    <i class="nav-icon icon-people"></i> Laporan Penggunaan Ruangan
                </a> 
                <a class="nav-link" href="{{ route('rusaks.index') }}">
                    <i class="nav-icon icon-people"></i> Laporan Perbaikan Ruangan
                </a>
                <a class="nav-link" href="{{ route('statis.gabungtable') }}">
                    <i class="nav-icon icon-people"></i> Statistik Gedung dan Ruangan
                </a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>