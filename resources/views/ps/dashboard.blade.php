@extends ('layouts.navbar')

@section ('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 bg-slate-100   rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-xl">Dashboard</h1>
            <h3 class="text-sm">
                <span class="text-gray-500">Home / </span>Dashboard
            </h3>
            <div class="py-2 px-4 mt-8 max-w-full lg:py-16 border border-gray-300 bg-white rounded-lg flex flex-col lg:flex-row justify-between items-center">
                <div class="mb-4 lg:mb-20 lg:ml-14">
                    <h2 class="text-2xl font-semibold text-indigo-600 dark:text-indigo-600">Selamat Datang, {{ Auth::user()->name }} !</h2>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">Website ini digunakan untuk merekap data keterlambatan siswa</p>
                </div>
                <div class="flex-shrink-0">
                    <img class="w-full lg:w-70 h-40 mr-0 lg:mr-16" src="img/dashboard.svg" alt="User Photo">
                </div>
            </div>
            
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3"> 
                <div class="max-w-xl p-6 bg-white mt-8 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-4 text-xl tracking-tight text-gray-500 dark:text-white">Data Peserta Didik</h5>
                    </a>
                    <div class="flex items-center">
                        <div class="bg-slate-100  w-10 h-11  rounded-3xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-7 mt-2 ml-2"  viewBox="0 0 448 512">
                                <path fill="#6366f1" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                            </svg>
                        </div>
                        <p class="mb-2 ml-4 font-semibold  text-2xl text-gray-500 dark:text-gray-400">{{$studentWithSameRayon}}</p>
                    </div>
            </div>
            <div class="max-w-2xl p-6 bg-white mt-8 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-4 text-xl tracking-tight text-gray-500 dark:text-white">Keterlambatan Hari ini</h5>
                        <h5 class="mb-4 text-sm font-semibold tracking-tight text-gray-500 dark:text-white">Tanggal</h5>
                    </a>
                    <div class="flex items-center">
                        <div class="bg-slate-100  w-10 h-11  rounded-3xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-7 mt-2 ml-2"  viewBox="0 0 448 512">
                                <path fill="#6366f1" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                            </svg>
                        </div>
                        <p class="mb-2 ml-4 font-semibold  text-2xl text-gray-500 dark:text-gray-400"></p>
                    </div>
            </div>
            </div>
        </div>
    </div>

@endsection    