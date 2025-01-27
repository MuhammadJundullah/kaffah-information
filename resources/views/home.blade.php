@extends('Components.layout')

@section('content')

    <div class="mx-10 my-10">
        <h1 class="text-lg my-5">Tabel Informasi Pembayaran Kaffah</h1>

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
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['januari'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['februari'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['maret'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['april'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['mei'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['juni'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['juli'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['agustus'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['september'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['oktober'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['november'] == 1 ? '✔' : '' }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $item['desember'] == 1 ? '✔' : '' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    
@endsection


{{-- ✘ --}}