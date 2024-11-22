<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title> @stack('title')</title>

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
    <div class="flex min-h-screen relative">
        @include('admin.navs.sidebar')
        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden">
            @include('admin.navs.header')
            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>


    @stack('script')
</body>

</html>
