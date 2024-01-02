<div class="sidebar-content">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="link" data-route="dashboard">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @can('read role')
            <li class="dropdown">
                <a href="{{ route('user_management.index') }}" class="link" data-route="user_management">
                    <i class="fa fa-users"></i>
                    <span>User Management</span>
                </a>
            </li>
        @endcan

        @can('read jabatan')
            <li>
                <a href="{{ route('jabatan.index') }}" class="link" data-route="jabatan">
                    <i class="fas fa-briefcase"></i>
                    <span>Jabatan</span>
                </a>
            </li>
        @endcan

        @if (auth()->user()->hasRole('admin'))
            <li>
                <a href="{{ route('surat_masuk.index') }}" class="link" data-route="surat_masuk">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Masuk</span>
                </a>
            </li>
        @else
            <li>
                <a href="{{ route('surat_masuk.index_pegawai') }}" class="link" data-route="surat_masuk">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Masuk</span>
                </a>
            </li>
        @endif
        <li>
            <a href="{{ route('surat_keluar.index') }}" class="link" data-route="surat_keluar">
                <i class="fas fa-envelope-open"></i>
                <span>Surat Keluar</span>
            </a>
        </li>

        @can('read report')
            <li>
                <a href="#" class="link" data-route="instansi">
                    <i class="fas fa-print"></i>
                    <span>Report</span>
                </a>
            </li>
        @endcan
    </ul>
</div>
