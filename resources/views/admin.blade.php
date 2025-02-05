@extends('Components.layout')

@section('content')
    <div class="mx-10 my-10">
        <h1 class="text-lg my-5">Tabel Informasi Pembayaran Kaffah</h1>

        @if (session('success'))
            <div class="my-5 px-4 py-2 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-5">
            <button id="openModal" class="px-4 py-2 bg-green-500 text-white rounded-lg">
                Tambah Data
            </button>
        </div>

        <!-- Modal Tambah Data -->
        <div id="addDataModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
            <div class="bg-white rounded-lg p-6 w-1/3">
                <h2 class="text-lg font-semibold mb-4">Tambah Data</h2>
                <form action="{{ route('kaffah.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tahun</label>
                        <input type="number" name="tahun" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">Close</button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <form action="{{ route('kaffah.update') }}" method="POST">
            @csrf
            <div class="mx-auto mt-5">
                <div class="overflow-y-auto rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Tahun</th>
                                <th class="px-4 py-2">Nama</th>
                                @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                    <th class="px-4 py-2">{{ $bulan }}</th>
                                @endforeach
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="px-4 py-2 text-center">
                                        {{ $item['tahun'] }}
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        {{ $item['name'] }}
                                    </td>
                                    @foreach (['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'] as $bulan)
                                        <td class="px-4 py-2 text-center">
                                            <input type="text" name="data[{{ $item['id'] }}][{{ $bulan }}]" value="{{ $item[$bulan] ?? '' }}"
                                                class="w-full border-gray-300 rounded-md">
                                        </td>
                                    @endforeach
                                    <td class="px-4 py-2 text-center">
                                        <button type="button" class="deleteButton px-4 py-2 bg-red-500 text-white rounded-lg" data-action="{{ route('kaffah.destroy', $item['id']) }}">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-5">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save Changes</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('openModal').addEventListener('click', () => {
            document.getElementById('addDataModal').classList.remove('hidden');
        });
        document.getElementById('closeModal').addEventListener('click', () => {
            document.getElementById('addDataModal').classList.add('hidden');
        });
    </script>
@endsection
