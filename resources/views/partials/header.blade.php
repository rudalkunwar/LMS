<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <title>Learning Hub | Header</title>
</head>

<body class="text-gray-800 antialiased">
    <!-- Navbar -->
    <nav class="bg-gray-800 fixed top-0 w-full z-50 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-4 py-3">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-white font-bold text-lg uppercase tracking-wide">
                    Learning Hub
                </a>
            </div>
            <!-- Hamburger Menu -->
            <button class="lg:hidden text-white text-2xl focus:outline-none" onclick="toggleNavbar('mobile-menu')">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Links -->
            <div id="mobile-menu" class="hidden lg:flex lg:items-center lg:space-x-6">
                <a href="/" class="text-gray-300 hover:text-white text-sm uppercase font-medium">
                    Home
                </a>
                <a href="" class="text-gray-300 hover:text-white text-sm uppercase font-medium">
                    Courses
                </a>
                <a href="" class="text-gray-300 hover:text-white text-sm uppercase font-medium">
                    About Us
                </a>
                <a href="" class="text-gray-300 hover:text-white text-sm uppercase font-medium">
                    Contact
                </a>
            </div>
            <!-- Action Button -->
            <div class="hidden lg:block">
                <a href="/login"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm uppercase font-medium shadow hover:bg-blue-600 transition duration-200">
                    Login
                </a>
            </div>
        </div>
    </nav>
