@extends('layouts.navbar')


@section ('content')
    <div class="p-4 sm:ml-4 md:ml-64">
        <div class="p-4 border-2 border-gray-200 bg-slate-100 rounded-lg dark:border-gray-700 mt-4 sm:mt-14">
            <h1 class="text-xl">Data Siswa</h1>
            <h3 class="text-sm">
                <span class="text-gray-500">Home / </span>Data Siswa
            </h3>
         
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 sm:mt-8">
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
                                NIS
                            </th>
                            <th scope="col" class="px-4 sm:px-6 py-3">
                                Rombel
                            </th>
                            <th scope="col" class="px-4 sm:px-6 py-3">
                                Rayon
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($studentRayon as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-4 sm:px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $no++ }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-gray-900">
                                {{ ucwords($item['name']) }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-gray-900">
                                {{ ucwords($item['nis']) }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-gray-900">
                                {{ ucwords($item['rombel']['rombel']) }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-gray-900">
                                {{ ucwords($item['rayon']['rayon']) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection    