@include('partials.header')

<div class="font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
        <div class="flex justify-center items-center gap-6 max-w-6xl w-full">
            <!-- Form Section -->
            <div class="border border-gray-300 rounded-lg p-6 shadow-lg w-1/2">
                <form class="space-y-6" method="POST" action="{{ route('admin.login') }}">
                    @csrf <!-- Assuming you are using Laravel's CSRF protection -->
                    <!-- Heading -->
                    <div class="mb-6">
                        <h3 class="text-gray-800 text-3xl font-extrabold">Sign in</h3>
                    </div>

                    <!-- Heading -->
                    @error('email')
                        <div class="mb-6 px-2">
                            <h3 class="text-red-600">{{ $message }}</h3>
                        </div>
                    @enderror
                    <!-- email Input -->
                    <div>
                        <label for="email" class="text-gray-800 text-sm mb-2 block">Email</label>
                        <div class="relative flex items-center">
                            <input id="email" name="email" type="email" required
                                class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-blue-600"
                                placeholder="Enter email" />
                            <i class="ri-user-line absolute right-4 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="text-gray-800 text-sm mb-2 block">Password</label>
                        <div class="relative flex items-center">
                            <input id="password" name="password" type="password" required
                                class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-blue-600"
                                placeholder="Enter password" />
                            <i class="ri-lock-line absolute right-4 text-gray-400 cursor-pointer"></i>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                            <label for="remember-me" class="ml-2 text-sm text-gray-800">
                                Remember me
                            </label>
                        </div>
                        <a href="javascript:void(0);" class="text-blue-600 hover:underline text-sm font-semibold">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none shadow-lg">
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')
