<aside id="sidebar" class="fixed md:static w-72 h-screen bg-gray-900 text-white z-30">
    <div class="flex flex-col h-full">
        <!-- Logo Section -->
        <div class="p-6 border-b border-gray-700">
            <div class="flex justify-between items-center">
                <a href="">Learning Hub</a>
                <button id="closeSidebar" class="md:hidden text-gray-400 hover:text-white">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto custom-scrollbar">
            <ul class="p-4 space-y-2">
                <li>
                    <a href=""
                        class="nav-link flex items-center gap-3 text-sm px-4 py-3 rounded-lg hover:bg-sky-600 transition-colors {{ Request::is('admin/role') ? 'active' : '' }}">
                        <i class="fas fa-th-large w-5"></i>
                        <span class="text-md"> {{ __('Roles') }}</span>
                    </a>
                </li>
                <li>
                    <a href=""
                        class="nav-link flex items-center gap-3 text-sm px-4 py-3 rounded-lg hover:bg-sky-600 transition-colors {{ Request::is('admin/users') ? 'active' : '' }}">
                        <i class="fa-regular fa-user w-5"></i>
                        <span class="text-md"> {{ __('Users') }}</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Logout Section -->
        <div class="p-4 border-t border-gray-700">
            <p>
                &copy;
                {{ date('Y') }}
                MarginTop Solutions
            </p>
        </div>
    </div>
</aside>
<aside id="iconSidebar" class="hidden w-20 h-screen bg-gray-900 text-white z-20 ">
    <div class="flex flex-col h-full">
        <div class="flex flex-col h-full">
            <!-- Logo Section -->
            <div class="p-6 border-b border-gray-700">
                <div class="flex justify-between items-center">
                    LH</a>
                </div>
            </div>
            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto custom-scrollbar">
                <ul class="p-4 space-y-2">
                    <li>
                        <a href=""
                            class="nav-link flex items-center gap-3 text-sm px-4 py-3 rounded-lg hover:bg-sky-600 transition-colors {{ Request::is('admin/role') ? 'active' : '' }}">
                            <i class="fas fa-th-large w-5"></i>
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="nav-link flex items-center gap-3 text-sm px-4 py-3 rounded-lg hover:bg-sky-600 transition-colors {{ Request::is('admin/users') ? 'active' : '' }}">
                            <i class="fa-regular fa-user w-5"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Logout Section -->
            <div class="p-4 border-t border-gray-700">
                <p>
                    &copy;
                    {{ date('Y') }}
                </p>
            </div>
        </div>
    </div>
</aside>

@push('script')
    <script>
        // DOM Elements
        const toggleButton = document.getElementById('toggleSidebar');
        const toggleMobileButton = document.getElementById('toggleMobileSidebar');
        const closeButton = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');
        const iconSidebar = document.getElementById('iconSidebar');

        toggleButton.addEventListener('click', () => {

            sidebar.classList.toggle('hidden');

            if (sidebar.classList.contains("hidden")) {
                iconSidebar.classList.remove('hidden');
            } else {
                iconSidebar.classList.add('hidden');
            }
        });

        closeButton.addEventListener('click', () => {
            sidebar.classList.add('hidden');
            iconSidebar.classList.add('hidden');
        });

        toggleMobileButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        })
    </script>
@endpush
