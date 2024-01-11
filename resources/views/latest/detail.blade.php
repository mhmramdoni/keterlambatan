@extends('layouts.navbar')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 bg-slate-100 rounded-lg dark:border-gray-700 mt-14">
        <h1 class="text-xl">Detail Data Keterlambatan</h1>
        <h3 class="text-sm">
            <span class="text-gray-500">Home / Data Keterlambatan / </span> Detail Data Keterlambatan
        </h3>
        @if (Auth::user()->role == "ps")
        <button>
            <a href="{{ route('ps.latest.rekap') }}" type="button" class="text-gray-900 bg-white border border-indigo-600 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 mt-8 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-4" viewBox="0 0 448 512">
                    <path fill="#8b5cf6" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </a> 
        </button>
        @else
        <button>
            <a href="{{ route('latest.rekap') }}" type="button" class="text-gray-900 bg-white border border-indigo-600 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 mt-8 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-4" viewBox="0 0 448 512">
                    <path fill="#8b5cf6" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </a> 
        </button>
        @endif
        @if (count($latest) > 0)
            <h2 class="text-gray-500 text-lg">
                <span class="text-2xl  text-slate-700">{{ $latest[0]->student->name }} </span> | {{ $latest[0]->student->nis }} | {{ $latest[0]->student->rayon->rayon }}
            </h2>
        @else
            <p class="text-red-500">Tidak ada data yang tersedia.</p>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-4">
            @php $no = 1; @endphp
            @foreach($latest as $item)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mt-2 text-xl font-semibold tracking-tight text-blue-900 dark:text-white">Keterlambatan Ke - {{$no++}}</h5>
                        </a>
                        <p class="mt-2 mb-3 font-sm text-gray-700 dark:text-gray-400">{{ date('d M Y', strtotime($item['date_time_late'])) }}</p>
                        <p class="mb-3 font-normal text-sky-500 dark:text-sky-500">{{ $item->information }}</p>
                        <a href="#">
                            @if ($item['bukti'])
                                <img class="rounded-t-lg w-25 h-25" src="{{ asset('img/' . $item['bukti']) }}" alt="Bukti">
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>    
</div>        
@endsection