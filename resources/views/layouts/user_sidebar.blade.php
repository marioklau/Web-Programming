<div class="relative flex h-full flex-col">
    <!-- Brand -->
    <div class="flex items-center gap-3 px-5 py-6">
        <div class="flex h-12 w-12 flex-none items-center justify-center rounded-2xl bg-white/10 p-1.5 ring-1 ring-white/15">
            <img src="{{ asset('images/logosmk.png') }}" alt="Logo SMK St. Louis" class="h-full w-full object-contain">
        </div>
        <div class="min-w-0">
            <p class="truncate text-base font-extrabold leading-tight tracking-tight text-white">Tata Tertib</p>
            <p class="truncate text-[11px] font-medium text-indigo-200/70">SMK St. Louis Surabaya</p>
        </div>
    </div>

    <div class="mx-5 h-px bg-white/10"></div>

    <!-- Navigation -->
    <nav class="sidebar-scroll flex-1 overflow-y-auto px-3 pb-8">
        <p class="nav-section">Menu Utama</p>
        <div class="space-y-1">
            <a href="{{ route('dashboard') }}" @click="sidebarOpen = false"
               class="nav-link {{ request()->routeIs('dashboard') ? 'nav-link-active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
        </div>

        <p class="nav-section">Data</p>
        <div class="space-y-1">
            <a href="{{ route('user.data_kelas') }}" @click="sidebarOpen = false"
               class="nav-link {{ request()->routeIs('user.data_kelas') ? 'nav-link-active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
                Data Kelas
            </a>

            <a href="{{ route('user.data_siswa') }}" @click="sidebarOpen = false"
               class="nav-link {{ request()->routeIs('user.data_siswa') ? 'nav-link-active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Data Siswa
            </a>
        </div>

        <p class="nav-section">Transaksi</p>
        <div class="space-y-1">
            <a href="{{ route('user.pelanggaran_siswa') }}" @click="sidebarOpen = false"
               class="nav-link {{ request()->routeIs('user.pelanggaran_siswa') ? 'nav-link-active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Pelanggaran Siswa
            </a>
        </div>
    </nav>
</div>
