<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('js/app.js') }}" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            font-family: "Poppins";
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
                <p class="flex w-auto flex-col text-black font-bold text-3xl mt-14 text-center lg:text-left md:text-center">
                    RELASI <br>Relawan Ahmad Syukri
                </p>

                <div class="flex justify-center md:flex md:justify-center lg:justify-start">
                <form class="py-48 w-full">
                    <div class="relative z-0 w-full mb-6 group">
                        <label class="">Email address</label>
                        <input type="text" class="block py-2.5 px-0 w-full text-sm text-black border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Masukkan Username Anda" required />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label class="">Password</label>
                        <input type="password" class="block py-2.5 px-0 w-full text-sm text-black border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Masukkan Kata Sandi Anda" required />
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
