<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tata Tertib SMK St. Louis</title>

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
</head>
<body class="flex min-h-full items-center justify-center bg-slate-100 p-4 font-sans text-slate-700 antialiased sm:p-8">

    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div class="absolute -left-24 -top-24 h-96 w-96 rounded-full bg-indigo-300/30 blur-3xl"></div>
        <div class="absolute -bottom-32 -right-20 h-96 w-96 rounded-full bg-sky-300/30 blur-3xl"></div>
    </div>

    <div class="relative grid w-full max-w-5xl overflow-hidden rounded-3xl border border-white/60 bg-white shadow-2xl shadow-slate-300/40 lg:grid-cols-2">

        <!-- Left: branding -->
        <div class="relative hidden lg:flex">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/bgsmk.jpeg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-indigo-950/85 to-blue-900/75"></div>

            <div class="relative flex w-full flex-col justify-between p-10 text-white">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 p-1.5 ring-1 ring-white/20">
                        <img src="{{ asset('images/logosmk.png') }}" alt="Logo SMK St. Louis" class="h-full w-full object-contain">
                    </div>
                    <div>
                        <p class="text-lg font-extrabold leading-tight tracking-tight">Tata Tertib</p>
                        <p class="text-xs font-medium text-indigo-200/80">SMK St. Louis Surabaya</p>
                    </div>
                </div>

                <div class="max-w-sm">
                    <h1 class="text-3xl font-extrabold leading-tight tracking-tight">Sistem Tata Tertib Siswa</h1>
                    <p class="mt-3 text-sm leading-relaxed text-indigo-100/80">
                        Kelola data pelanggaran, sanksi, dan laporan tata tertib siswa dalam satu platform yang rapi dan mudah digunakan.
                    </p>

                    <ul class="mt-8 space-y-4 text-sm">
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-8 w-8 flex-none items-center justify-center rounded-xl bg-white/10 ring-1 ring-white/15">
                                <svg class="h-4 w-4 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <span class="text-indigo-100/90">Pencatatan pelanggaran siswa yang cepat dan akurat</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-8 w-8 flex-none items-center justify-center rounded-xl bg-white/10 ring-1 ring-white/15">
                                <svg class="h-4 w-4 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </span>
                            <span class="text-indigo-100/90">Statistik dan rekap pelanggaran secara real-time</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-8 w-8 flex-none items-center justify-center rounded-xl bg-white/10 ring-1 ring-white/15">
                                <svg class="h-4 w-4 text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </span>
                            <span class="text-indigo-100/90">Cetak laporan PDF dan Excel dengan sekali klik</span>
                        </li>
                    </ul>
                </div>

                <p class="text-xs text-indigo-200/60">&copy; {{ date('Y') }} SMK St. Louis Surabaya</p>
            </div>
        </div>

        <!-- Right: form -->
        <div class="flex flex-col justify-center p-8 sm:p-12" x-data="{ showPassword: false }">
            <div class="mb-8 flex items-center gap-3 lg:hidden">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 p-1.5 ring-1 ring-indigo-100">
                    <img src="{{ asset('images/logosmk.png') }}" alt="Logo SMK St. Louis" class="h-full w-full object-contain">
                </div>
                <div>
                    <p class="text-lg font-extrabold leading-tight tracking-tight text-slate-900">Tata Tertib</p>
                    <p class="text-xs font-medium text-slate-500">SMK St. Louis Surabaya</p>
                </div>
            </div>

            <div>
                <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Selamat Datang</h2>
                <p class="mt-1 text-sm text-slate-500">Masuk menggunakan akun Anda untuk melanjutkan.</p>
            </div>

            @if (session()->has('success'))
                <div class="mt-6 flex items-start gap-2 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                    <svg class="mt-0.5 h-5 w-5 flex-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="mt-6 flex items-start gap-2 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700">
                    <svg class="mt-0.5 h-5 w-5 flex-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                    </svg>
                    {{ session('loginError') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-6 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="mt-8 space-y-5">
                @csrf

                <div>
                    <label for="username" class="mb-1.5 block text-sm font-semibold text-slate-700">Nama Pengguna</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex w-11 items-center justify-center text-slate-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <input id="username" name="username" type="text" value="{{ old('username') }}"
                               placeholder="Masukkan username Anda" required autofocus autocomplete="username"
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-11 pr-4 text-sm text-slate-900 placeholder-slate-400 transition focus:border-indigo-400 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-100">
                    </div>
                </div>

                <div>
                    <label for="password" class="mb-1.5 block text-sm font-semibold text-slate-700">Password</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex w-11 items-center justify-center text-slate-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                        <input id="password" name="password" :type="showPassword ? 'text' : 'password'"
                               placeholder="Masukkan password Anda" required autocomplete="current-password"
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-11 pr-12 text-sm text-slate-900 placeholder-slate-400 transition focus:border-indigo-400 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-100">
                        <button type="button" @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 flex w-11 items-center justify-center text-slate-400 transition hover:text-slate-600"
                                :aria-label="showPassword ? 'Sembunyikan password' : 'Tampilkan password'">
                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg x-show="showPassword" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex cursor-pointer items-center gap-2 text-sm text-slate-600">
                        <input type="checkbox" id="remember" name="remember"
                               class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                        Ingat username
                    </label>
                </div>

                <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-blue-600 px-4 py-2.5 text-sm font-bold text-white shadow-lg shadow-indigo-500/30 transition hover:from-indigo-500 hover:to-blue-500 focus:outline-none focus:ring-4 focus:ring-indigo-200 active:translate-y-px">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Masuk
                </button>
            </form>

            <p class="mt-8 text-center text-xs text-slate-400">
                &copy; {{ date('Y') }} SMK St. Louis Surabaya &middot; Sistem Tata Tertib
            </p>
        </div>
    </div>

</body>
</html>
