<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading">Menu</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ request()->is('import') ? 'active' : '' }}" href="{{ route('import') }}">
                    <div class="nav-link-icon"><i data-feather="download"></i></div>
                    Import
                </a>
                <a class="nav-link {{ request()->is('analisis') || request()->is('analisis/*') ? 'active' : '' }}" href="{{ route('analisis') }}">
                    <div class="nav-link-icon"><i data-feather="pie-chart"></i></div>
                    Analisis
                </a>
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ auth()->user()->username }}</div>
            </div>
        </div>
    </nav>
</div>
