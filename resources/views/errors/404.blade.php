<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="text-center px-6">
        <h1 class="text-7xl font-bold text-blue-600">404</h1>
        <h2 class="mt-4 text-2xl font-semibold text-gray-800">Halaman Tidak Ditemukan</h2>
        <p class="mt-2 text-gray-600">Halaman yang Anda cari tidak tersedia atau sudah dipindahkan.</p>
        <a href="{{ url('/home') }}"
           class="inline-block mt-6 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Kembali ke Home
        </a>
    </div>
</body>
</html>
