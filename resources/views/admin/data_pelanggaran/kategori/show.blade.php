@extends('layouts.main')

@section('title', 'Detail Kategori Pelanggaran')

@section('content')
    <div class="container mx-auto">
        <div class="mb-4">
            <h1>Detail Kategori Pelanggaran: {{ $kategori->nama_kategori }}</h1>
        </div>

        <div class="bg-white p-5 rounded shadow-sm">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <tbody>
                        <tr class="bg-white border-b border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Nama Kategori
                            </th>
                            <td class="px-6 py-4">
                                {{ $kategori->nama_kategori }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-5 flex space-x-3">
            <a href="{{ route('kategori.index') }}"
               class="px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs uppercase rounded-full hover:bg-gray-300 transition">
                Kembali
            </a>

            <a href="{{ route('kategori.edit', $kategori) }}"
               class="px-6 py-2.5 bg-blue-400 text-white font-medium text-xs uppercase rounded-full hover:bg-blue-500 transition">
                Edit Kategori
            </a>
        </div>
    </div>
@endsection
