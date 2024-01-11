@extends('layouts.navbar')

@section('content')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 bg-slate-100   rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-xl">Tambah Data Keterlambatan</h1>
            <h3 class="text-sm">
                <span class="text-gray-500">Home / Data Keterlambatan / </span>Tambah Data Keterlambatan
            </h3>
                <div class="py-8 px-4 mt-8 max-w-2xl lg:py-16 border border-gray-300 bg-white rounded-lg">
                    <form action="{{ route('latest.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($errors->any())
                            <ul class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li> 
                                @endforeach
                            </ul>
                        @endif 

                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="student_id class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Siswa</label>
                                <select id="student_id" name="student_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                    @foreach ($students as $item )
                                    <option selected disabled hidden>Pilih Siswa</option>
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                <input type="datetime-local" name="date_time_late" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tanggal" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="information" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan Keterlambatan</label>
                                <textarea id="information" name="information" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Keterangan"></textarea>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="bukti" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Bukti</label>
                                <input  type="file" name="bukti" id="bukti" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" >Tambah Bukti</div>
                            </div>    
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-white border border-indigo-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Tambah Data Keterlambatan
                        </button>
                    </form>
                </div>
        </div>
    </div>            
@endsection