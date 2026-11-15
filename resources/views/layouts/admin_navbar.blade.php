<div class="flex h-16 items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
    <div class="flex min-w-0 items-center gap-3">
        <button type="button" @click="sidebarOpen = true"
                class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:bg-slate-50 lg:hidden"
                aria-label="Buka menu">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div class="hidden sm:block">
            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">{{ now()->translatedFormat('l') }}</p>
            <p class="text-sm font-bold text-slate-800">{{ now()->translatedFormat('d F Y') }}</p>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <span class="hidden items-center gap-1.5 rounded-full border border-indigo-200 bg-indigo-50 px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-indigo-600 md:inline-flex">
            <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>
            Administrator
        </span>

        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
            <button type="button" @click="open = !open"
                    class="flex items-center gap-3 rounded-2xl border border-transparent px-1.5 py-1.5 transition hover:border-slate-200 hover:bg-slate-50">
                <div class="hidden text-right sm:block">
                    <p class="max-w-[10rem] truncate text-sm font-bold leading-tight text-slate-800">{{ Auth::user()->nama }}</p>
                    <p class="text-[11px] font-medium capitalize text-slate-400">{{ Auth::user()->role }}</p>
                </div>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-blue-600 text-base font-bold text-white shadow-lg shadow-indigo-500/25">
                    {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
                </div>
                <svg class="hidden h-4 w-4 text-slate-400 sm:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="open" x-cloak x-transition
                 class="absolute right-0 top-14 w-52 overflow-hidden rounded-2xl border border-slate-200 bg-white p-1.5 shadow-xl">
                <div class="mb-1 border-b border-slate-100 px-3 py-2 sm:hidden">
                    <p class="truncate text-sm font-bold text-slate-800">{{ Auth::user()->nama }}</p>
                    <p class="text-[11px] font-medium capitalize text-slate-400">{{ Auth::user()->role }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="flex w-full items-center gap-2.5 rounded-xl px-3 py-2 text-sm font-semibold text-rose-600 transition hover:bg-rose-50">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
