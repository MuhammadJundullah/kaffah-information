@extends('Components.layout')

@section('content')

    <div class="mx-10 my-10">
        <h1 class="text-lg my-5">Tabel Informasi Pembayaran Kaffah</h1>

        <div class="text-gray-500">
            <p>Panduan : </p>
            <ul>
                <li>- Setiap edisi kaffah rilis setiap jumatnya.</li>
                <li>- Jika terdapat isi dari kolom bulan 1/4 artinya anda telah melunasi 1 edisi kaffah dari 4 jumat dalam bulan tersebut. </li>
                <li>- Jika terdapat isi dari kolom bulan 4/4 artinya anda telah melunasi seluruh edisi kaffah dari 4 jumat dalam bulan tersebut. </li>
                <li>- Anda dapat melakukan filterisasi data berdasarkan tahun, untuk mempermudah. </li>
            </ul>
        </div>

        <div class="my-5">
            <form id="filterForm">
                <label for="tahun">Tahun :</label>
                <select name="tahun" id="tahun" onchange="filterByYear()">
                    <option value="">Semua data</option>
                    @foreach ($tahunList as $th)
                        <option value="{{ $th }}" {{ request('tahun') == $th ? 'selected' : '' }}>{{ $th }}</option>
                    @endforeach
                </select>
            </form>
        </div>


        <div class="mx-auto mt-5">
            <div class="overflow-y-auto rounded-lg border border-gray-200">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Tahun</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Januari</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Februari</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Maret</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">April</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Mei</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Juni</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Juli</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Agustus</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">September</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Oktober</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">November</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Desember</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                @foreach ($data as $item)    
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">{{ $item['tahun'] }}</td>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">{{ $item['name'] }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['januari'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['februari'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['maret'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['april'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['mei'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['juni'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['juli'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['agustus'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['september'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['oktober'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['november'] ?? '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['desember'] ?? '' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    
@endsection


<script>
    function filterByYear() {
        let tahun = document.getElementById('tahun').value;
        let url = tahun ? `/kaffah/${tahun}` : '/';
        window.location.href = url;
    }
</script>
