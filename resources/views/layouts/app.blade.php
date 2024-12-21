<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title> @stack('title') </title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <style>
        .nav-link.active {
            background-color: #0284c7;
        }

        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #ffffff rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    @php
        $user = Auth::user();
    @endphp
    <div class="flex min-h-screen relative">
        <!-- Conditionally load the sidebar based on user role -->
        @if ($user->role === 'admin')
            @include('admin.navs.sidebar')
        @elseif($user->role === 'instructor')
            @include('instructor.navs.sidebar')
        @elseif($user->role === 'student')
            @include('student.navs.sidebar')
        @endif

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden">
            <!-- Conditionally load the header based on user role -->
            @if ($user->role === 'admin')
                @include('admin.navs.header')
            @elseif($user->role === 'instructor')
                @include('instructor.navs.header')
            @elseif($user->role === 'student')
                @include('student.navs.header')
            @endif

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('script')
</body>

</html>
