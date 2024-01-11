<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Erorrs Permission</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class=" bg-gray-100">
    <div class="flex justify-center items-center h-screen flex-col" style="margin-top: 2%">
        <img src="img/error2.svg" class="mx-auto" width="300" alt="Icon">
        <h4 class="text-center  text-xl mt-4">Anda tidak diizinkan mengakses halaman ini!</h4>
        <div class="mt-3">
            @if (Auth::user()->role == 'admin')
            <a href="{{ route('home.page') }}">
                   <button type="button" class="mt-5 text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-80/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</button>
            </a>
            @else 
                <a href="{{ route('home.page') }}">
                    <button type="button" class="mt-5 text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-80/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</button>
                </a>
            @endif
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    @stack ('script')
</body>
</html>

