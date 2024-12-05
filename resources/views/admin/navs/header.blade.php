<header class="bg-white border-b border-gray-200 sticky top-0 z-10">
    <div class="flex items-center justify-between px-4 py-3">
        <!-- Left Section -->
        <div class="flex items-center gap-4">
            <button id="toggleSidebar" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <!-- Search Bar -->
            <div class="relative">
                <input type="text" placeholder="Search..."
                    class="w-full md:w-80 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-sky-500 focus:ring-1 focus:ring-sky-500 outline-none transition-colors" />
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>

        <div class="flex items-center gap-6 pl-2">
            <!-- Notification Icons -->
            <div class="px-2 flex gap-6">
                <button class="relative text-gray-500 hover:text-gray-700">
                    <i class="far fa-envelope text-xl"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 rounded-full flex items-center justify-center">3</span>
                </button>
                <button class="relative text-gray-500 hover:text-gray-700">
                    <i class="far fa-bell text-xl"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 rounded-full flex items-center justify-center">5</span>
                </button>
            </div>

            <!-- Profile -->
            <div class="flex items-center gap-3 ">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full overflow-hidden ring-2 ring-gray-200" id="profileDropdown"
                        onclick="toggleProfileDropdown()">
                        <img src="{{ asset('images/profile.jpg') }}" alt="Profile"
                            class="w-full h-full object-cover" />
                    </div>
                    <!-- Dropdown menu -->
                    <div id="profileDropdownMenu"
                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-10">
                        <div class="py-1">
                            <a href=""
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@push('script')
    <script>
        function toggleProfileDropdown() {
            const dropdownMenu = document.getElementById('profileDropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        }

        // Close the dropdown if clicked outside
        window.addEventListener('click', function(event) {
            const dropdownMenu = document.getElementById('dropdownMenu');
            if (!dropdown.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
@endpush
