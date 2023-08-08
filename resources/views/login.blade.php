<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('js/app.js') }}" rel="stylesheet">
    <title>Login</title>
    <!-- Replace the font paths according to your file names and folder structure -->
    <link rel="stylesheet" href="{{ asset('fonts/Poppins-Regular.ttf') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fonts/Poppins-Bold.ttf') }}" type="text/css">
    <link rel="icon" href="assets/LOGO_KPU_RI.png">

    <style>
        body {
            background-image: url('assets/login/bacground_login.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="container mx-auto my-10">
    <div class="w-[100%] lg:w-[40%]">
        <div class="flex justify-center md:justify-center lg:justify-start">
            <img src="assets/LOGO_KPU_RI.png" alt="logo">
        </div>
        <p class="flex w-auto flex-col text-black font-bold mt-10 2xl:text-5xl xl:text-4xl lg:text-3xl text-2xl text-center lg:text-left md:text-center">
            RELASI <br>Relawan Ahmad Syukri
        </p>
        <div class="flex justify-center md:flex md:justify-center  2xl:mx-0 xl:mx-0 lg:mx-0 md:mx-5 sm:mx-5 mx-5 lg:justify-start">
            <form class="2xl:py-[200px] xl:py-[80px] lg:py-[100px] py-[80px] w-full poppins-font text-2xl" action="/login" method="post">
                @csrf
                <div class="relative z-0 w-full mb-6 group ">
                    <label class="font-semibold md:text-lg text-sm" for="username">Username</label>
                    <input type="text" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-black border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Masukkan Username Anda" required />
                    @if(session('error'))
                        <p class=" text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> Username atau password salah!</p>
                    @endif
                </div>
                <div class="relative z-0 w-full mb-6  group">
                    <label class="font-semibold md:text-lg text-sm" for="password">Kata Sandi</label>
                    <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-black border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Masukkan Kata Sandi Anda" required />
                </div>

                <div class="flex justify-between">
                    <div class="flex items-center mb-4">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-[#5097FC] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ingat Saya</label>
                    </div>

                    <p class="text-sm font-medium underline underline-offset-1 text-gray-900 dark:text-gray-300"><a href="#">Lupa Kata Sandi?</a></p>
                </div>

                <button type="submit" class="w-[100%] text-white bg-[#5097FC] hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Masuk</button>
            </form>
        </div>
    </div>
</div>
<div class="relative">
    <img class="hidden lg:block absolute bottom-0 right-0 w-[50%] object-cover z-20" src="/assets/login/map.png" alt="map">
</div>
</body>
</html>
