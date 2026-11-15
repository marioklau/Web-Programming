<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Tata Tertib SMK St. Louis</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            },
        };
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }

        body { font-family: "Plus Jakarta Sans", ui-sans-serif, system-ui, sans-serif; }

        .sidebar-scroll::-webkit-scrollbar { width: 6px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: rgba(148, 163, 184, .25); border-radius: 999px; }

        .nav-section {
            margin: 1.4rem 0 .55rem;
            padding: 0 .9rem;
            font-size: .66rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: rgba(148, 163, 184, .85);
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: .7rem;
            border-radius: .8rem;
            padding: .62rem .85rem;
            font-size: .86rem;
            font-weight: 600;
            color: #cbd5e1;
            transition: background-color .18s ease, color .18s ease, box-shadow .18s ease;
        }
        .nav-link:hover { background: rgba(255, 255, 255, .06); color: #fff; }
        .nav-link svg { width: 1.15rem; height: 1.15rem; flex: none; }
        .nav-link-active {
            background: linear-gradient(100deg, #4f46e5, #6366f1 55%, #3b82f6);
            color: #fff;
            box-shadow: 0 12px 24px -12px rgba(79, 70, 229, .9);
        }

        .nav-sub {
            display: flex;
            align-items: center;
            gap: .55rem;
            border-radius: .65rem;
            padding: .48rem .85rem;
            font-size: .8rem;
            font-weight: 500;
            color: #94a3b8;
            transition: background-color .15s ease, color .15s ease;
        }
        .nav-sub:hover { background: rgba(255, 255, 255, .05); color: #fff; }
        .nav-sub-active { background: rgba(255, 255, 255, .09); color: #fff; }
        .nav-dot { height: .35rem; width: .35rem; border-radius: 9999px; background: #64748b; flex: none; }
        .nav-sub-active .nav-dot { background: #a5b4fc; box-shadow: 0 0 8px #818cf8; }

        .main-content h1 {
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 800;
            letter-spacing: -.025em;
            color: #0f172a;
        }

        .main-content table { width: 100%; border-collapse: separate; border-spacing: 0; }
        .main-content thead th {
            background: #f1f5f9;
            color: #64748b;
            font-size: .68rem;
            font-weight: 700;
            letter-spacing: .09em;
            text-transform: uppercase;
            padding: .85rem 1rem;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }
        .main-content thead th:first-child { border-top-left-radius: .85rem; border-bottom-left-radius: .85rem; }
        .main-content thead th:last-child { border-top-right-radius: .85rem; border-bottom-right-radius: .85rem; }
        .main-content tbody td {
            padding: .8rem 1rem;
            font-size: .82rem;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        .main-content tbody tr:last-child td { border-bottom: 0; }
        .main-content tbody tr { transition: background-color .15s ease; }
        .main-content tbody tr:hover { background-color: #f8fafc; }

        .main-content .overflow-hidden:has(> table) {
            background: #fff;
            border-radius: 1rem;
            overflow-x: auto;
            box-shadow: 0 1px 2px rgba(15, 23, 42, .04), 0 12px 32px -20px rgba(15, 23, 42, .28);
        }

        .main-content input[type="text"],
        .main-content input[type="search"],
        .main-content input[type="email"],
        .main-content input[type="password"],
        .main-content input[type="number"],
        .main-content input[type="date"],
        .main-content input[type="file"],
        .main-content select,
        .main-content textarea {
            border: 1px solid #e2e8f0;
            border-radius: .75rem;
            background-color: #fff;
            color: #0f172a;
            padding: .55rem .85rem;
            font-size: .85rem;
            transition: border-color .15s ease, box-shadow .15s ease;
        }
        .main-content input[type="search"] { padding-right: 3rem; }
        .main-content input:focus,
        .main-content select:focus,
        .main-content textarea:focus {
            outline: none;
            border-color: #818cf8;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .16);
        }
        .main-content input[type="checkbox"],
        .main-content input[type="radio"] { accent-color: #4f46e5; }

        .main-content canvas { max-width: 100%; }

        .main-content input,
        .main-content select,
        .main-content textarea { max-width: 100%; }
        .main-content .overflow-x-auto,
        .main-content .overflow-hidden:has(> table) { -webkit-overflow-scrolling: touch; }

        .filter-buttons { display: inline-flex; flex-wrap: wrap; gap: .25rem; }

        .select2-container { width: 100% !important; }
        .select2-container--default .select2-selection--single {
            height: 2.6rem;
            display: flex;
            align-items: center;
            border: 1px solid #e2e8f0;
            border-radius: .75rem;
            background-color: #fff;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.25;
            padding: 0 .85rem;
            color: #0f172a;
            font-size: .85rem;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow { height: 2.5rem; right: .4rem; }
        .select2-container--default.select2-container--focus .select2-selection--single,
        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #818cf8;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .16);
        }
        .select2-dropdown { border-color: #e2e8f0; border-radius: .75rem; overflow: hidden; font-size: .85rem; }
        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable { background-color: #4f46e5; }

        @media (max-width: 640px) {
            .main-content h1 { font-size: 1.3rem; line-height: 1.8rem; }
        }
    </style>
</head>
<body class="h-full bg-slate-100 text-slate-700 antialiased" x-data="{ sidebarOpen: false }">

@auth
    <!-- Overlay (mobile) -->
    <div x-show="sidebarOpen"
         x-cloak
         x-transition.opacity
         class="fixed inset-0 z-30 bg-slate-900/60 backdrop-blur-sm lg:hidden"
         @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 z-40 w-72 transform overflow-hidden bg-gradient-to-b from-slate-900 via-slate-900 to-indigo-950 text-white shadow-2xl transition-transform duration-300 -translate-x-full lg:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <div class="pointer-events-none absolute -right-16 -top-24 h-56 w-56 rounded-full bg-indigo-500/20 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -left-10 h-56 w-56 rounded-full bg-blue-500/10 blur-3xl"></div>

        @include(auth()->user()->isAdmin() ? 'layouts.admin_sidebar' : 'layouts.user_sidebar')
    </aside>

    <!-- Content -->
    <div class="flex min-h-full flex-col lg:pl-72">
        <header class="sticky top-0 z-20 border-b border-slate-200/70 bg-white/80 backdrop-blur">
            @include(auth()->user()->isAdmin() ? 'layouts.admin_navbar' : 'layouts.user_navbar')
        </header>

        <main class="main-content min-w-0 flex-1 p-4 sm:p-6 lg:p-8">
            <div class="mx-auto w-full min-w-0 max-w-7xl">
                @if (session()->has('error'))
                    <div x-data="{ show: true }" x-show="show" x-transition
                         class="mb-5 flex items-start gap-3 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700 shadow-sm">
                        <svg class="mt-0.5 h-5 w-5 flex-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                        </svg>
                        <p class="flex-1">{{ session('error') }}</p>
                        <button type="button" @click="show = false" class="rounded-lg p-1 hover:bg-rose-100" aria-label="Tutup">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div x-data="{ show: true }" x-show="show" x-transition
                         class="mb-5 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700 shadow-sm">
                        <svg class="mt-0.5 h-5 w-5 flex-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="flex-1">{{ session('success') }}</p>
                        <button type="button" @click="show = false" class="rounded-lg p-1 hover:bg-emerald-100" aria-label="Tutup">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
@else
    <main class="main-content p-4 sm:p-6">
        @yield('content')
    </main>
@endauth

@yield('scripts')
@stack('scripts')

</body>
</html>
