<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Utama</li>

        <li class="sidebar-item {{ request()->is('v1') ? 'active' : '' }}">
            <a href="{{ route('daftars.index') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill" href="{{ route('daftars.index') }}"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li class="sidebar-item {{ request()->is('v1/antrian*') ? 'active' : '' }}">
            <a href="{{ route('v1.antrian') }}" class='sidebar-link'>
                <i class="bi bi-door-open-fill" href="{{ route('v1.antrian') }}"></i>
                <span>Mulai Antrian</span>
            </a>
        </li>

        <!-- <li class="sidebar-item {{ request()->is('v1/pendaftarans*') ? 'active' : '' }}">
            <a href="{{ route('v1.pendaftarans.store') }}" class='sidebar-link'>
                <i class="bi bi-book" href="{{ route('v1.pendaftarans.store') }}"></i>
                <span>Data Pengunjung   </span>
            </a>
        </li> -->


        <li class="sidebar-item {{ request()->is('v1/loket*') ? 'active' : '' }}">
            <a href="{{ route('v1.loket') }}" class='sidebar-link'>
                <i class="bi bi-ui-checks-grid" href="{{ route('v1.loket') }}"></i>
                <span>Kelola Loket</span>
            </a>
        </li>

    </ul>
</div>
