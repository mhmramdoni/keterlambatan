@extends('layouts.navbar')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 bg-slate-100 rounded-lg dark:border-gray-700 mt-4 sm:mt-14">
            <h1 class="text-xl">Data Keterlambatan</h1>
            <h3 class="text-sm">
                <span class="text-gray-500">Home / Data Keterlambatan / </span>Keseluruhan Data
            </h3>
            <button class="mt-4 sm:mt-8">
                <a href="{{ route('ps.latest.export') }}" type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-80/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-full text-sm px-5 py-2.5 text-center mt-2 sm:mt-8 mb-2">
                    Export Data Keterlambatan
                </a>
            </button> 
            <div class="text-sm font-medium text-center bg-white text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px">
                    <li class="me-2">
                        <a href="{{ route('ps.latest.home') }}" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-indigo-600 hover:border-indigo-500 dark:hover:text-indigo-600">Keseluruhan Data</a>
                    </li>
                    <li class="me-2">
                        <a href="{{ route('ps.latest.rekap') }}" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-indigo-600 hover:border-indigo-500 dark:hover:text-indigo-600">Rekapitulasi Data</a>
                    </li>
                </ul>
            </div>
            <div class="relative mt-1 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 sm:px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-4 sm:px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-4 sm:px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-4 sm:px-6 py-3">
                                Informasi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($telat as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-4 sm:px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $no++ }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-gray-900">
                                {{ ucwords($item['student']['name']) }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-gray-900">
                                {{ \Carbon\Carbon::parse($item->date_time_late)->format('d M Y') }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-gray-900">
                                {{ ucwords($item['information']) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection    