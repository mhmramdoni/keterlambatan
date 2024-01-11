@extends('layouts.navbar')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 bg-slate-100   rounded-lg dark:border-gray-700 mt-14">
        <h1 class="text-xl">Tambah Data Siswa</h1>
        <h3 class="text-sm">
            <span class="text-gray-500">Home / Data Siswa / </span>Tambah Data Siswa
        </h3>
            <div class=" py-8 px-10 mt-8 max-w-2xl lg:py-16 border border-gray-300 bg-white rounded-lg">
                <form action="{{ route('student.store') }}" method="post">
                    @csrf
                    @if($errors->any())
                        <ul  class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li> 
                            @endforeach
                        </ul>
                    @endif 

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Nama" required="">
                        </div>
                        <div class="w-full">
                            <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                            <input type="text" name="nis" id="nis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="NIS" required="">
                        </div>
                        <div>
                            <label for="rombel_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rombel</label>
                            <select id="rombel_id" name="rombel_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                @foreach ($rombel as $item )
                                <option selected disabled hidden>Pilih Rombel</option>
                                <option value="{{$item->id}}">{{$item->rombel}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="rayon_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rayon</label>
                            <select id="rayon_id" name="rayon_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                @foreach ($rayon as $item )
                                <option selected disabled hidden>Pilih Rayon</option>
                                <option value="{{$item->id}}">{{$item->rayon}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-white border border-indigo-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Tambah Siswa
                    </button>
                </form>
            </div>
    </div>

</div>
@endsection