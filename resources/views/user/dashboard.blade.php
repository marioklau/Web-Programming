@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">Selamat Datang, {{ auth()->user()->nama }}</h1>
            <p class="mt-1 text-sm text-slate-500">
                Ringkasan tata tertib
                @if ($tahunAktif)
                    tahun ajaran <span class="font-semibold text-slate-700">{{ $tahunAktif->tahun_ajaran }}</span>
                @endif
            </p>
        </div>
        <span class="inline-flex w-fit items-center gap-1.5 rounded-full border px-3 py-1 text-xs font-semibold {{ $tahunAktif ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-amber-200 bg-amber-50 text-amber-700' }}">
            <span class="h-1.5 w-1.5 rounded-full {{ $tahunAktif ? 'bg-emerald-500' : 'bg-amber-500' }}"></span>
            {{ $tahunAktif ? 'Tahun ajaran aktif' : 'Tahun ajaran belum diatur' }}
        </span>
    </div>

    <!-- Kartu Statistik -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">
        <!-- Total Siswa -->
        <div class="group relative overflow-hidden rounded-2xl border border-slate-200/70 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">
            <div class="pointer-events-none absolute -right-8 -top-10 h-28 w-28 rounded-full bg-emerald-500/10 blur-2xl"></div>
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold text-slate-500">Total Siswa</p>
                    <p class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900">{{ $totalSiswa }}</p>
                    <p class="mt-1 text-xs text-slate-400">Siswa pada tahun ajaran aktif</p>
                </div>
                <div class="rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 p-3 text-white shadow-lg shadow-emerald-500/25">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Kelas -->
        <div class="group relative overflow-hidden rounded-2xl border border-slate-200/70 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">
            <div class="pointer-events-none absolute -right-8 -top-10 h-28 w-28 rounded-full bg-amber-500/10 blur-2xl"></div>
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold text-slate-500">Total Kelas</p>
                    <p class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900">{{ $totalKelas }}</p>
                    <p class="mt-1 text-xs text-slate-400">Kelas pada tahun ajaran aktif</p>
                </div>
                <div class="rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 p-3 text-white shadow-lg shadow-amber-500/25">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Pelanggaran -->
        <div class="group relative overflow-hidden rounded-2xl border border-slate-200/70 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">
            <div class="pointer-events-none absolute -right-8 -top-10 h-28 w-28 rounded-full bg-rose-500/10 blur-2xl"></div>
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold text-slate-500">Total Pelanggaran</p>
                    <p class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900">{{ $totalPelanggaran }}</p>
                    <p class="mt-1 text-xs text-slate-400">Pelanggaran tercatat tahun ini</p>
                </div>
                <div class="rounded-2xl bg-gradient-to-br from-rose-500 to-red-600 p-3 text-white shadow-lg shadow-rose-500/25">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart Section -->
<!-- Container untuk Top 10 Siswa & Top 10 Kelas (berdampingan) -->
<div class="flex flex-col md:flex-row gap-5 mt-5">
    <!-- Top 10 Siswa Pelanggaran Terbanyak -->
    <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm flex-1 max-w-xl">
        <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-base font-bold text-slate-800">Top 10 Siswa Pelanggaran Terbanyak</h2>
            <div class="filter-buttons" data-chart="topSiswaChart">
                <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded active" data-filter="all">Semua</button>
                <button class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded" data-filter="daily">Harian</button>
                <button class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded" data-filter="weekly">Mingguan</button>
                <button class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded" data-filter="monthly">Bulanan</button>
            </div>
        </div>
        <canvas id="topSiswaChart"></canvas>
    </div>

    <!-- Top 10 Kelas & Jurusan Pelanggaran Terbanyak -->
    <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm flex-1 max-w-xl">
        <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-base font-bold text-slate-800">Top 10 Kelas Pelanggaran Terbanyak</h2>
            <div class="filter-buttons" data-chart="kelasChart">
                <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded active" data-filter="all">Semua</button>
                <button class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded" data-filter="daily">Harian</button>
                <button class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded" data-filter="weekly">Mingguan</button>
                <button class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded" data-filter="monthly">Bulanan</button>
            </div>
        </div>
        <canvas id="kelasChart"></canvas>
    </div>
</div>

<div class="flex flex-col md:flex-row gap-5 mt-5">
    <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm flex-1 max-w-xl">
        <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-base font-bold text-slate-800">Top 10 Jenis Pelanggaran Terbanyak</h2>
            <div class="filter-buttons" data-chart="jenisChart">
                <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded active" data-filter="all">Semua</button>
                <button class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded" data-filter="daily">Harian</button>
                <button class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded" data-filter="weekly">Mingguan</button>
                <button class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded" data-filter="monthly">Bulanan</button>
            </div>
        </div>
        <canvas id="jenisChart"></canvas>
    </div>
    
    <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm flex-1 max-w-xl">
        <h2 class="text-base font-bold text-slate-800 mb-4">Grafik Pelanggaran per Bulan</h2>
        <canvas id="pelanggaranChart"></canvas>
    </div>
</div>

<!-- Grafik Baru: Perbandingan Jenis Pelanggaran per Bulan -->
<div class="mt-5">
    <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm w-full max-w-4xl">
        <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-base font-bold text-slate-800">Perbandingan Jenis Pelanggaran per Bulan</h2>
            <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                <label for="jenisPelanggaranSelect" class="text-sm text-gray-700 sm:mr-2">Pilih Jenis Pelanggaran:</label>
                <select id="jenisPelanggaranSelect" class="w-full max-w-full px-3 py-1 border rounded-md text-sm sm:w-auto">
                    <option value="">-- Pilih Jenis Pelanggaran --</option>
                    @foreach($allJenisPelanggaran as $jenis)
                        <option value="{{ $jenis->id }}">{{ $jenis->bentuk_pelanggaran }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <canvas id="perbandinganChart"></canvas>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const pelanggaranPerBulan = @json($pelanggaranPerBulanChart);
    const topSiswa = @json($topSiswa);
    const topKelas = @json($topKelas);
    const topJenis = @json($topJenisPelanggaran);
    
    // Variabel global untuk menyimpan instance chart
    let charts = {};

    function generateColorArray(length, primaryColor, secondaryColor, primaryBorder, secondaryBorder) {
        return {
            background: Array.from({ length }, (_, i) =>
            i === 0 ? primaryColor : secondaryColor
            ),
            border: Array.from({ length }, (_, i) =>
            i === 0 ? primaryBorder : secondaryBorder
            )
        };
    }

    // Inisialisasi semua chart
    function initCharts() {
        // Chart 1: Pelanggaran per Bulan
        charts.pelanggaranChart = new Chart(document.getElementById('pelanggaranChart'), {
            type: 'bar',
            data: {
                labels: pelanggaranPerBulan.labels,
                datasets: [{
                    label: 'Jumlah Pelanggaran',
                    data: pelanggaranPerBulan.data,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1, precision: 0 } }
                }
            }
        });

        // Chart 2: Top Siswa
        const siswaColors = generateColorArray(topSiswa.data.length, 'rgba(255,99,132,0.8)', 'rgba(54,162,235,0.6)', 'rgba(255,99,132,1)', 'rgba(54,162,235,1)');
        charts.topSiswaChart = new Chart(document.getElementById('topSiswaChart'), {
            type: 'bar',
            data: {
                labels: topSiswa.labels,
                datasets: [{ 
                    label: 'Jumlah Pelanggaran', 
                    data: topSiswa.data, 
                    backgroundColor: siswaColors.background, 
                    borderColor: siswaColors.border, 
                    borderWidth:1 
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                scales: {
                    x: { 
                        beginAtZero: true, 
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        }
                    }
                }
            }
        });

        // Chart 4: Top Jenis Pelanggaran
        const jenisColors = generateColorArray(topJenis.data.length, 'rgba(255,99,132,0.8)', 'rgba(100,149,237,0.6)', 'rgba(255,99,132,1)', 'rgba(100,149,237,1)');
        charts.jenisChart = new Chart(document.getElementById('jenisChart'), {
            type: 'bar',
            data: {
                labels: topJenis.labels,
                datasets: [{ 
                    label: 'Jumlah Pelanggaran', 
                    data: topJenis.data, 
                    backgroundColor: jenisColors.background, 
                    borderColor: jenisColors.border, 
                    borderWidth:1 
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        }
                    }
                }
            }
        });

        // Chart 3: Top Kelas
        const kelasColors = generateColorArray(topKelas.data.length, 'rgba(255,99,132,0.8)', 'rgba(100,149,237,0.6)', 'rgba(255,99,132,1)', 'rgba(100,149,237,1)');
        charts.kelasChart = new Chart(document.getElementById('kelasChart'), {
            type: 'bar',
            data: {
                labels: topKelas.labels,
                datasets: [{ 
                    label: 'Jumlah Pelanggaran', 
                    data: topKelas.data, 
                    backgroundColor: kelasColors.background, 
                    borderColor: kelasColors.border, 
                    borderWidth:1 
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                scales: {
                    x: { 
                        beginAtZero: true, 
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        }
                    } 
                }
            }
        });

        // Chart 5: Perbandingan Jenis Pelanggaran (Kosong awal)
        charts.perbandinganChart = new Chart(document.getElementById('perbandinganChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Pelanggaran',
                    data: [],
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1, precision: 0 } }
                }
            }
        });
    }

    // Fungsi untuk memperbarui data chart
    function updateChartData(chartId, filter) {
        // Kirim permintaan AJAX ke server
        fetch(`/dashboard/chart-data?chart=${chartId}&filter=${filter}`)
            .then(response => response.json())
            .then(data => {
                // Perbarui data chart berdasarkan ID
                if (charts[chartId]) {
                    charts[chartId].data.labels = data.labels;
                    charts[chartId].data.datasets[0].data = data.data;
                    charts[chartId].update();
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Fungsi untuk memuat data perbandingan jenis pelanggaran
    function loadPerbandinganData(jenisId) {
        if (!jenisId) {
            // Kosongkan chart jika tidak ada jenis yang dipilih
            charts.perbandinganChart.data.datasets[0].data = Array(12).fill(0);
            charts.perbandinganChart.update();
            return;
        }

        fetch(`/dashboard/perbandingan-data?jenis_id=${jenisId}`)
            .then(response => response.json())
            .then(data => {
                charts.perbandinganChart.data.datasets[0].data = data;
                charts.perbandinganChart.update();
            })
            .catch(error => console.error('Error:', error));
    }

    // Event listener untuk tombol filter
    document.addEventListener('DOMContentLoaded', function() {
        initCharts();
        
        // Tambahkan event listener untuk semua tombol filter
        document.querySelectorAll('.filter-buttons').forEach(buttonGroup => {
            const chartId = buttonGroup.getAttribute('data-chart');
            
            buttonGroup.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function() {
                    // Hapus kelas aktif dari semua tombol dalam grup
                    buttonGroup.querySelectorAll('button').forEach(btn => {
                        btn.classList.remove('active', 'bg-blue-500', 'text-white');
                        btn.classList.add('bg-gray-200', 'text-gray-700');
                    });
                    
                    // Tambahkan kelas aktif ke tombol yang diklik
                    this.classList.add('active', 'bg-blue-500', 'text-white');
                    this.classList.remove('bg-gray-200', 'text-gray-700');
                    
                    // Ambil nilai filter
                    const filter = this.getAttribute('data-filter');
                    
                    // Perbarui data chart
                    updateChartData(chartId, filter);
                });
            });
        });

        // Event listener untuk dropdown jenis pelanggaran
        document.getElementById('jenisPelanggaranSelect').addEventListener('change', function() {
            loadPerbandinganData(this.value);
        });
    });
</script>
@endsection