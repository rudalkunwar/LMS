<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learning Hub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .active {
            background-color: #e2e8f0;
            color: #1f2937;
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex antialiased bg-gray-50 text-gray-800">
        <div class="flex flex-col fixed top-0 left-0 w-64 bg-white h-full border-r">
            <div class="flex items-center justify-center h-16 border-b">
                <div class="text-3xl py-2">Learning Hub</div>
            </div>
            <div class="overflow-y-auto overflow-x-hidden flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('dashboard') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-home-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('students.index') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('students.index') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-team-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('instructors.index') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('instructors.index') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-user-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Instructors</span>
                        </a>
                    </li>
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Tasks</div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('courses.index') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('courses.index') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-book-2-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Courses</span>
                        </a>
                    </li>
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Settings</div>
                        </div>
                    </li>
                    <li>
                        <a href=""
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('profile.index') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-user-settings-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                    <i class="ri-logout-box-line w-5 h-5"></i>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex-grow flex flex-col">
            <div class="flex-grow p-6">
                <div class="flex-1 ml-64 overflow-hidden pl-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
