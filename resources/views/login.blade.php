@extends('layouts.navbar')
    <section class=" bg-gray-800 dark:bg-gray-900">
        <div class="flex flex-col md:flex-row items-center justify-center ml-18 px-10 py-20 mx-auto md:h-screen lg:py-0">
            <div class="md:w-auto md:pr-8  md:mb-0">
                <img class="w-full h-auto" src="img/login.svg" alt="User Photo">
            </div>
            <div class="md:w-1/2 w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-semibold leading-tight tracking-tight text-indigo-500 md:text-xl dark:text-white">
                        Rekap Keterlambatan
                    </h1>
                    <h3 class="text-sm">
                        <span class="text-gray-700">Silahkan Login !</span>
                    </h3>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login.auth') }}" method="post">
                        @csrf
                        @if (Session::get('failed'))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium">{{ Session::get('failed') }}</span>.
                            </div> 
                        @endif
                        @if (Session::get('logout')) 
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium">{{ Session::get('logout') }}</span>.
                            </div>
                        @endif  
                        @if (Session::get('canAccess')) 
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium">{{ Session::get('canAccess') }}</span>.
                            </div>
                        @endif  
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@email.com" required="">
                            @error('email')
                                <small class="text-red-800">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            @error('password')
                                <small class="text-red-800">{{ $message }}</small>
                            @enderror
                        </div>   
                        <button type="submit" class="w-full text-white bg-indigo-500 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                      
                    </form>
                </div>
            </div>
        </div>
    </section>   

