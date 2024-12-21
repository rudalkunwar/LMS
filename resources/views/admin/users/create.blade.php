@extends('layouts.app')

@section('content')
    <div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
        <h1 class="text-3xl font-bold text-gray-800">Add User</h1>
        <a href="{{ route('admin.users.index') }}"
            class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
            <i class="ri-arrow-left-line text-lg"></i>
            <span class="font-semibold">Cancel</span>
        </a>
    </div>
    <div class="container mx-auto px-8 py-6">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white p-6 rounded-lg shadow-md">
                <!--  Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2"> Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border @error('name') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border @error('email') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role (User/Instructor) -->
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-sm font-medium mb-2">Select Role</label>
                    <select id="role" name="role"
                        class="w-full px-4 py-2 border @error('role') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>
                        <option value="">Select Role</option>
                        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="instructor" {{ old('role') == 'instructor' ? 'selected' : '' }}>Instructor</option>
                    </select>
                    @error('role')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone_number" class="block text-gray-700 text-sm font-medium mb-2">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number"
                        class="w-full px-4 py-2 border @error('phone_number') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-medium mb-2">Address</label>
                    <input type="text" id="address" name="address"
                        class="w-full px-4 py-2 border @error('address') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('address') }}">
                    @error('address')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="mb-4">
                    <label for="dob" class="block text-gray-700 text-sm font-medium mb-2">Date of Birth</label>
                    <input type="date" id="dob" name="dob"
                        class="w-full px-4 py-2 border @error('dob') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('dob') }}">
                    @error('dob')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Courses (multi-select) -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Assign Courses</label>
                    <div class="space-y-2">
                        @foreach ($courses as $course)
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="course_{{ $course->id }}" name="courses[]"
                                    class="w-5 h-5 border @error('courses') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                                    value="{{ $course->id }}" {{ in_array($course->id, old('courses', [])) ? 'checked' : '' }}>
                                <label for="course_{{ $course->id }}" class="text-gray-700">{{ $course->title }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('courses')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- User Image (photo) -->
                <div class="mb-4">
                    <label for="photo" class="block text-gray-700 text-sm font-medium mb-2">Student Image (Optional)</label>
                    <input type="file" id="photo" name="photo"
                        class="w-full px-4 py-2 border @error('photo') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('photo')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border @error('password') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('password') }}">
                    @error('password')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-4 py-2 border @error('password_confirmation') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-blue-500 w-full px-6 py-2 rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300">
                    Create User
                </button>
            </div>
        </form>
    </div>
@endsection
