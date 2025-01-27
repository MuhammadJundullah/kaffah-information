@extends('Components.layout')

@section('content')
    <div class="mx-10 my-10">
        <h1 class="text-lg my-5">Tabel Informasi Pembayaran Kaffah</h1>

        @if (session('success'))
            <div class="my-5 px-4 py-2 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Modal Konfirmasi Hapus -->
        <div id="confirmDeleteModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
            <div class="bg-white rounded-lg p-6 w-1/3">
                <h2 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h2>
                <p class="mb-4">Apakah Anda yakin ingin menghapus data ini?</p>
                <div class="flex justify-end">
                    <button type="button" id="cancelDelete" class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah Data -->
        <div class="mb-5">
            <button id="openModal" class="px-4 py-2 bg-green-500 text-white rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
            </button>
        </div>

        <!-- Modal Tambah Data -->
        <div id="addDataModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
            <div class="bg-white rounded-lg p-6 w-1/3">
                <h2 class="text-lg font-semibold mb-4">Tambah Data</h2>
                <form action="{{ route('kaffah.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="name" name="name" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                        <input type="number" id="tahun" name="tahun" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">
                            Close
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <form action="{{ route('kaffah.update') }}" method="POST">
            @csrf
            <div class="mx-auto mt-5">
                <div class="overflow-y-auto rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Tahun</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama</th>
                                @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $bulan }}</th>
                                @endforeach
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                        @foreach ($data as $item)    
                            <tr>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">
                                    {{ $item['tahun'] }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">
                                    {{ $item['name'] }}
                                </td>
                                @foreach (['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'] as $bulan)
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                                        <input type="checkbox" name="data[{{ $item['id'] }}][{{ $bulan }}]" 
                                               value="1" 
                                               {{ $item[$bulan] == 1 ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                                    <form>
                                        <button type="button" class="deleteButton px-4 py-2 bg-red-500 text-white rounded-lg" 
                                                data-action="{{ route('kaffah.destroy', $item['id']) }}">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-5">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <!-- Script untuk Modal -->
    <script>

        // modal tambah data
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');
        const addDataModal = document.getElementById('addDataModal');

        openModal.addEventListener('click', () => {
            addDataModal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', () => {
            addDataModal.classList.add('hidden');
        });

        // modal konfirmasi hapus
        const confirmDeleteModal = document.getElementById('confirmDeleteModal');
        const cancelDelete = document.getElementById('cancelDelete');
        const deleteForm = document.getElementById('deleteForm');

        document.querySelectorAll('.deleteButton').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const action = this.getAttribute('data-action');
                deleteForm.setAttribute('action', action);
                confirmDeleteModal.classList.remove('hidden');
            });
        });

        cancelDelete.addEventListener('click', () => {
            confirmDeleteModal.classList.add('hidden');
        });
    </script>
@endsection
