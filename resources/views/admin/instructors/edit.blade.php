@extends('admin.layouts.app')

@section('content')
    <div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
        <h1 class="text-3xl font-bold text-gray-800">Edit Instructor</h1>
        <a href="{{ route('instructors.index') }}"
            class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
            <i class="ri-arrow-left-line text-lg"></i>
            <span class="font-semibold">Cancel</span>
        </a>
    </div>
    <div class="container mx-auto px-8 py-6">
        <form action="{{ route('instructors.update', $instructor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Edit Instructor</h2>
                <!-- First Name Field -->
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 text-sm font-medium mb-2">First Name</label>
                    <input type="text" id="first_name" name="first_name"
                        class="w-full px-4 py-2 border @error('first_name') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('first_name', $instructor->first_name) }}" required>
                    @error('first_name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name Field -->
                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 text-sm font-medium mb-2">Last Name</label>
                    <input type="text" id="last_name" name="last_name"
                        class="w-full px-4 py-2 border @error('last_name') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('last_name', $instructor->last_name) }}" required>
                    @error('last_name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border @error('email') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('email', $instructor->email) }}" required>
                    @error('email')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number Field -->
                <div class="mb-4">
                    <label for="phone_number" class="block text-gray-700 text-sm font-medium mb-2">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number"
                        class="w-full px-4 py-2 border @error('phone_number') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('phone_number', $instructor->phone_number) }}">
                    @error('phone_number')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Department Field -->
                <div class="mb-4">
                    <label for="department" class="block text-gray-700 text-sm font-medium mb-2">Department</label>
                    <input type="text" id="department" name="department"
                        class="w-full px-4 py-2 border @error('department') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('department', $instructor->department) }}">
                    @error('department')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 px-6 py-2 w-full rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
