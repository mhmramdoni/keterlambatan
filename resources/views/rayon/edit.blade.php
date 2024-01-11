@extends('layouts.navbar')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 bg-slate-100   rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-xl">Tambah Data Rayon</h1>
            <h3 class="text-sm">
                <span class="text-gray-500">Home / Data Rayon / </span>Tambah Data Rayon
            </h3>
                <div class="py-8 px-4 mt-8 max-w-2xl lg:py-16 border border-gray-300 bg-white rounded-lg">
                    <form action="{{ route('rayon.update', $rayon['id']) }}" method="post">
                        @csrf
                        @method('PATCH')
                 
                        @if(Session::get('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <span class="font-medium">{{ Session::get('success') }}</span>
                        </div> 
                        @endif
                        @if($errors->any())
                            <ul  class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li> 
                                @endforeach
                            </ul>
                        @endif 
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rayon</label>
                                <input type="text" name="rayon" id="name" value="{{ $rayon['rayon'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                            </div>
                            <div>
                                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembimbing Siswa</label>
                                <select id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                    <option selected disabled hidden>Pilih Pembimbing Siswa</option>
                                    @foreach ($users->where('role', 'ps') as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $rayon->user_id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-white border border-indigo-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                           Edit Data
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection