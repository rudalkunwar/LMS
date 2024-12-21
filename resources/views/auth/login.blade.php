@include('partials.header')
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full sm:w-96 space-y-6">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Field -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative mt-2">
                    <input type="email" name="email" id="email"
                        class="block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm transition duration-200 ease-in-out"
                        placeholder="Enter your email" required>
                    <i class="ri-mail-line absolute top-3 right-3 text-gray-500"></i>
                </div>
                @error('email')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative mt-2">
                    <input type="password" name="password" id="password"
                        class="block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm transition duration-200 ease-in-out"
                        placeholder="Enter your password" required>
                    <i class="ri-lock-line absolute top-3 right-3 text-gray-500"></i>
                </div>
                @error('password')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me Checkbox -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition duration-200 ease-in-out">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}"
                    class="text-sm text-indigo-600 hover:text-indigo-800 transition duration-200">Forgot
                    password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-md text-lg hover:bg-indigo-700 transition duration-300 ease-in-out focus:outline-none">
                Login
            </button>
        </form>

        <!-- Register Link -->
        <p class="text-center text-sm text-gray-600">
            Don't have an account? <a href="{{ route('register') }}"
                class="text-indigo-600 hover:text-indigo-800 transition duration-200">Sign up</a>
        </p>
    </div>
</div>
</body>

</html>
