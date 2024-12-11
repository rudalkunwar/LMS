<aside id="sidebar" class="fixed md:static w-72 h-screen bg-gray-900 text-white z-30">
    <div class="flex flex-col h-full">
        <!-- Logo Section -->
        <div class="p-6 border-b border-gray-700">
            <div class="flex justify-between items-center">
                <a href="">Learning Hub | Instructor</a>
                <button id="closeSidebar" class="md:hidden text-gray-400 hover:text-white">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto custom-scrollbar">
            <ul class="p-4 space-y-6">
                <!-- Dashboard Section -->
                <li>
                    <a href="{{ route('instructor.dashboard') }}"
                        class="nav-link flex items-center gap-3 text-sm px-4 py-3 rounded-lg hover:bg-sky-600 transition-colors {{ Request::is('instructor/dashboard') ? 'active' : '' }}">
                        <i class="ri-dashboard-line w-5"></i>
                        <span class="text-md">Dashboard</span>
                    </a>
                </li>

                <!-- College Management Section -->
                <li class="text-sm font-semibold text-gray-700 dark:text-gray-300">College Management</li>

                <!-- Students -->
                <li>
                    <a href="{{ route('instructor.students.index') }}"
                        class="nav-link flex items-center gap-3 text-sm px-4 py-3 rounded-lg hover:bg-sky-600 transition-colors {{ Request::is('instructor/students') ? 'active' : '' }}">
                        <i class="ri-user-line w-5"></i>
                        <span class="text-md">Students</span>
                    </a>
                </li>

                <!-- Courses -->
                <li>
                    <a href="{{ route('instructor.courses.index') }}"
                        class="nav-link flex items-center gap-3 text-sm px-4 py-3 rounded-lg hover:bg-sky-600 transition-colors {{ Request::is('instructor/courses') ? 'active' : '' }}">
                        <i class="ri-book-line w-5"></i>
                        <span class="text-md">Courses</span>
                    </a>
                </li>

                <!-- Assignments -->
                <li>
                    <a href=""
                        class="nav-link flex items-center gap-3 text-sm px-4 py-3 rounded-lg hover:bg-sky-600 transition-colors {{ Request::is('instructor/assignments') ? 'active' : '' }}">
                        <i class="ri-file-list-line w-5"></i>
                        <span class="text-md">Assignments</span>
                    </a>
                </li>

                <!-- Grades -->
                <li>
                    <a href=""
                        class="nav-link flex items-center gap-3 text-sm px-4 py-3 rounded-lg hover:bg-sky-600 transition-colors {{ Request::is('instructor/grades') ? 'active' : '' }}">
                        <i class="ri-bar-chart-box-line w-5"></i>
                        <span class="text-md">Grades</span>
                    </a>
                </li>
                <!-- College Management Section -->
                <li class="text-sm font-semibold text-gray-700 dark:text-gray-300">Others</li>
                <!-- Reports -->
                <li>
                    <a href=""
                        class="nav-link flex items-center gap-3 text-sm px-4 py-3 rounded-lg hover:bg-sky-600 transition-colors {{ Request::is('instructor/reports') ? 'active' : '' }}">
                        <i class="ri-bar-chart-line w-5"></i>
                        <span class="text-md">Reports</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- Logout Section -->
        <div class="p-4 border-t border-gray-700">
            <p>
                &copy;
                {{ date('Y') }}
                Learning Hub
            </p>
        </div>
    </div>
</aside>

@push('script')
    <script>
        // DOM Elements
        const toggleButton = document.getElementById('toggleSidebar');
        const closeButton = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        closeButton.addEventListener('click', () => {
            sidebar.classList.add('hidden');
        });
    </script>
@endpush
