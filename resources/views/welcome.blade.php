<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')


</head>

<body class="bg-background">
    <header class="flex justify-between items-center mt-8 article">
        <div class="flex items-center">
            <img src="../assets/logo.svg" alt="" width="30">
            <span class="font-playfair ml-4 text-lg font-bold text-primary">
                IDN<span class="text-secondary">'S</span> Library
            </span>
        </div>

        <nav>
            <ul class="flex space-x-8">
                <li class="nav-item"><a href="#">Home</a></li>
                <li class="nav-item"><a href="#">About</a></li>
                <li class="nav-item"><a href="#">Contact</a></li>
                <li class="nav-item"><a href="#">Vision</a></li>
            </ul>
        </nav>

        <div class="relative">
            <i class="fa-solid fa-magnifying-glass absolute top-1/2 left-3 transform -translate-y-1/2"></i>
            <input class="w-80 h-11 ps-9 py-2 rounded-md focus:outline-none" type="text" placeholder="Search.."
                name="search">
        </div>

        <div class="flex items-center space-x-6">
            <a href="#" class="bg-transparent text-primary uppercase text-lg font-semibold font-roboto">
                Login
            </a>
            <a href="#" class="btn-primary">
                Register
            </a>
        </div>
    </header>

    <main class="section">
        <!-- Hero -->
        <article class="flex items-center justify-between relative">
            <section class="mt-14">
                <h4 class="text-gray-500 font-semibold text-lg">Anywhere and Everywhere. </h4>
                <h1 class="text-primary text-5xl font-semibold tracking-wide mt-3">Welcome To TEE’S LIBRARY</h1>
                <p class="font-roboto text-lg font-normal text-gray-500 tracking-wide w-2/6 leading-9 mt-3">Track your
                    Reading and Build your Library.
                    Discover your next Favourite Book.
                    Browse from the Largest Collections of Ebooks.
                    Read stories from anywhere at anytime.</p>

                <button class="btn-primary mt-4">Get Started For Free</button>

                <!-- Contact Section at Bottom -->
                <div class="flex flex-col items-start mt-16 gap-y-3">
                    <p class="text-lg font-semibold text-primary">Contact us</p>
                    <p class="text-sm font-normal text-slate-400">Address: Bogor, Indonesia</p>
                    <p class="text-sm font-normal text-slate-400">Email: IDNLibrary@gmail.com</p>
                    <div class="flex space-x-4 mt-2">
                        <a href="#">
                            <i class="fab fa-facebook-square text-2xl"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter-square text-2xl"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram-square text-2xl"></i>
                        </a>
                    </div>
                </div>
            </section>

            <section class="absolute right-0 top-0 px">
                <img src="../assets/Illustration.svg" width="650" alt="">
            </section>
        </article>
    </main>

</body>
</html>