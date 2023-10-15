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
                <div class="relative z-0 w-full mb-6 group">
                    <label class="font-semibold md:text-lg text-sm" for="username">Username</label>
                    <input type="text" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-black border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Masukkan Username Anda" required />
                    @if(session('error'))
                    <p class="text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> Username atau password salah!</p>
                    @endif
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label class="font-semibold md:text-lg text-sm" for="password">Kata Sandi</label>
                    <div class="flex">
                        <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-black border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Masukkan Kata Sandi Anda" required />
                        <button type="button" id="togglePassword" class="absolute top-1/2 right-2 transform -translate-y-1/2 text-gray-600 focus:outline-none">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12.09 0C4.5 0 0 12 0 12C0 12 4.5 24 12.09 24C19.5 24 24 12 24 12C24 12 19.5 0 12.09 0ZM12 4C15.33 4 18 7.6 18 12C18 16.44 15.33 20 12 20C8.7 20 6 16.44 6 12C6 7.6 8.7 4 12 4ZM12 8C10.35 8 9 9.8 9 12C9 14.2 10.35 16 12 16C13.65 16 15 14.2 15 12C15 11.6 14.88 11.24 14.82 10.88C14.58 11.52 14.1 12 13.5 12C12.66 12 12 11.12 12 10C12 9.2 12.36 8.56 12.84 8.24C12.57 8.12 12.3 8 12 8Z" fill="black"/>
                                </svg>
                            </svg>
                        </button>
                    </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var passwordInput = document.getElementById('password');
        var toggleButton = document.getElementById('togglePassword');
        var eyeIcon = document.getElementById('eyeIcon');

        toggleButton.addEventListener('click', function() {
            var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            if (type === 'password') {
                eyeIcon.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M12.09 0C4.5 0 0 12 0 12C0 12 4.5 24 12.09 24C19.5 24 24 12 24 12C24 12 19.5 0 12.09 0ZM12 4C15.33 4 18 7.6 18 12C18 16.44 15.33 20 12 20C8.7 20 6 16.44 6 12C6 7.6 8.7 4 12 4ZM12 8C10.35 8 9 9.8 9 12C9 14.2 10.35 16 12 16C13.65 16 15 14.2 15 12C15 11.6 14.88 11.24 14.82 10.88C14.58 11.52 14.1 12 13.5 12C12.66 12 12 11.12 12 10C12 9.2 12.36 8.56 12.84 8.24C12.57 8.12 12.3 8 12 8Z" fill="black"/>
                    </svg>
                `;
            } else {
                eyeIcon.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M9.47 15.28C9.28 15.28 9.09 15.21 8.94 15.06C8.12 14.24 7.67 13.15 7.67 12C7.67 9.61004 9.61 7.67004 12 7.67004C13.15 7.67004 14.24 8.12004 15.06 8.94004C15.2 9.08004 15.28 9.27004 15.28 9.47004C15.28 9.67004 15.2 9.86004 15.06 10L10 15.06C9.85 15.21 9.66 15.28 9.47 15.28ZM12 9.17004C10.44 9.17004 9.17 10.44 9.17 12C9.17 12.5 9.3 12.98 9.54 13.4L13.4 9.54004C12.98 9.30004 12.5 9.17004 12 9.17004Z" fill="#2F3555"/>
                      <path d="M5.6 18.51C5.43 18.51 5.25 18.45 5.11 18.33C4.04 17.42 3.08 16.3 2.26 15C1.2 13.35 1.2 10.66 2.26 8.99998C4.7 5.17998 8.25 2.97998 12 2.97998C14.2 2.97998 16.37 3.73998 18.27 5.16998C18.6 5.41998 18.67 5.88998 18.42 6.21998C18.17 6.54998 17.7 6.61998 17.37 6.36998C15.73 5.12998 13.87 4.47998 12 4.47998C8.77 4.47998 5.68 6.41998 3.52 9.80998C2.77 10.98 2.77 13.02 3.52 14.19C4.27 15.36 5.13 16.37 6.08 17.19C6.39 17.46 6.43 17.93 6.16 18.25C6.02 18.42 5.81 18.51 5.6 18.51Z" fill="#2F3555"/>
                      <path d="M12 21.02C10.67 21.02 9.37 20.75 8.12 20.22C7.74 20.06 7.56 19.62 7.72 19.24C7.88 18.86 8.32 18.68 8.7 18.84C9.76 19.29 10.87 19.52 11.99 19.52C15.22 19.52 18.31 17.58 20.47 14.19C21.22 13.02 21.22 10.98 20.47 9.81C20.16 9.32 19.82 8.85 19.46 8.41C19.2 8.09 19.25 7.62 19.57 7.35C19.89 7.09 20.36 7.13 20.63 7.46C21.02 7.94 21.4 8.46 21.74 9C22.8 10.65 22.8 13.34 21.74 15C19.3 18.82 15.75 21.02 12 21.02Z" fill="#2F3555"/>
                      <path d="M12.69 16.27C12.34 16.27 12.02 16.02 11.95 15.66C11.87 15.25 12.14 14.86 12.55 14.79C13.65 14.59 14.57 13.67 14.77 12.57C14.85 12.16 15.24 11.9 15.65 11.97C16.06 12.05 16.33 12.44 16.25 12.85C15.93 14.58 14.55 15.95 12.83 16.27C12.78 16.26 12.74 16.27 12.69 16.27Z" fill="#2F3555"/>
                      <path d="M2 22.75C1.81 22.75 1.62 22.68 1.47 22.53C1.18 22.24 1.18 21.76 1.47 21.47L8.94 14C9.23 13.71 9.71 13.71 10 14C10.29 14.29 10.29 14.77 10 15.06L2.53 22.53C2.38 22.68 2.19 22.75 2 22.75Z" fill="#2F3555"/>
                      <path d="M14.53 10.2199C14.34 10.2199 14.15 10.1499 14 9.99994C13.71 9.70994 13.71 9.22994 14 8.93994L21.47 1.46994C21.76 1.17994 22.24 1.17994 22.53 1.46994C22.82 1.75994 22.82 2.23994 22.53 2.52994L15.06 9.99994C14.91 10.1499 14.72 10.2199 14.53 10.2199Z" fill="#2F3555"/>
                    </svg>
                `;
            }
        });
    });
</script>
</body>
</html>
