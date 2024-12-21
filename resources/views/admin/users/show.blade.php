@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 py-6">
        <!-- Heading Section -->
        <div class="pl-8 shadow-md mb-6">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-3xl font-bold text-gray-800">View User</h1>
                <a href="{{ route('admin.users.index') }}"
                    class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
                    <i class="ri-arrow-left-line text-lg"></i>
                    <span class="font-semibold">Back</span>
                </a>
            </div>
        </div>

        <!-- User Details Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">User Details</h2>

            <div class="space-y-6">
                <!-- Name -->
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-lg text-gray-700">Name:</p>
                    <p class="text-gray-600">{{ $user->name }}</p>
                </div>

                <!-- Email -->
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-lg text-gray-700">Email:</p>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>

                <!-- Phone Number -->
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-lg text-gray-700">Phone Number:</p>
                    <p class="text-gray-600">{{ $user->phone_number }}</p>
                </div>

                <!-- Address -->
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-lg text-gray-700">Address:</p>
                    <p class="text-gray-600">{{ $user->address }}</p>
                </div>

                <!-- Date of Birth -->
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-lg text-gray-700">Date of Birth:</p>
                    <p class="text-gray-600">{{ $user->dob }}</p>
                </div>

                <!-- Course(s) -->
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-lg text-gray-700">Course(s):</p>
                    @if ($courses->isNotEmpty())
                        <ul class="list-disc pl-6">
                            @foreach ($courses as $course)
                                <li class="text-gray-600">{{ $course->title }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600">No courses assigned</p>
                    @endif
                </div>
            </div>

            <!-- Photo Section -->
            <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">User Photo</h3>
                @if ($user->photo)
                    <div class="mb-4">
                        <img src="{{ Storage::url($user->photo) }}" alt="{{ $user->name }} photo"
                            class="w-full h-64 object-cover rounded-lg shadow-md">
                    </div>
                    <div class="text-center">
                        <a href="{{ Storage::url($user->photo) }}" target="_blank"
                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                            <i class="ri-download-line mr-2"></i>Download Image
                        </a>
                    </div>
                @else
                    <div class="bg-gray-100 rounded-lg p-6 text-center">
                        <i class="ri-image-line text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">No photo uploaded</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
