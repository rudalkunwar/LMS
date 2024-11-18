@extends('layouts.app')

@section('content')
    <div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
        <h1 class="text-3xl font-bold text-gray-800">Add Student</h1>
        <a href="{{ route('students.index') }}"
            class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
            <i class="ri-arrow-left-line text-lg"></i>
            <span class="font-semibold">Cancel</span>
        </a>
    </div>
    <div class="container mx-auto px-8 py-6">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Add New Student</h2>

                <!-- First Name -->
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 text-sm font-medium mb-2">First Name</label>
                    <input type="text" id="first_name" name="first_name"
                        class="w-full px-4 py-2 border @error('first_name') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 text-sm font-medium mb-2">Last Name</label>
                    <input type="text" id="last_name" name="last_name"
                        class="w-full px-4 py-2 border @error('last_name') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('last_name') }}" required>
                    @error('last_name')
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

                <!-- Course -->
                <div class="mb-4">
                    <label for="course_id" class="block text-gray-700 text-sm font-medium mb-2">Course</label>
                    <select id="course_id" name="course_id"
                        class="w-full px-4 py-2 border @error('course_id') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>
                        <option value="">Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-blue-500 w-full px-6 py-2 rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300">
                    Create Student
                </button>
            </div>
        </form>
    </div>
@endsection
