@extends('admin.layouts.app')

@section('content')
    <div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
        <h1 class="text-3xl font-bold text-gray-800">View Student</h1>
        <a href="{{ route('admin.students.index') }}"
            class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
            <i class="ri-arrow-left-line text-lg"></i>
            <span class="font-semibold">Back</span>
        </a>
    </div>

    <div class="container mx-auto px-8 py-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Student Details</h2>

            <div class="space-y-4">
                <!-- Name -->
                <p><span class="font-semibold text-gray-700">Name:</span> {{ $student->name }}</p>

                <!-- Email -->
                <p><span class="font-semibold text-gray-700">Email:</span> {{ $student->email }}</p>

                <!-- Phone Number -->
                <p><span class="font-semibold text-gray-700">Phone Number:</span> {{ $student->phone_number }}</p>

                <!-- Address -->
                <p><span class="font-semibold text-gray-700">Address:</span> {{ $student->address }}</p>

                <!-- Date of Birth -->
                <p><span class="font-semibold text-gray-700">Date of Birth:</span> {{ $student->dob }}</p>

                <!-- Course -->
                <p><span class="font-semibold text-gray-700">Course:</span> {{ $student->course->title ?? 'N/A' }}</p>

                <!-- Image -->
                <p>
                    <span class="font-semibold text-gray-700">Photo:</span>
                    <!-- photo and Additional Info -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Student Photo</h3>
                        @if ($student->photo)

                            <div class="mb-4">
                                <img src="{{ Storage::url($student->photo) }}" alt="{{ $student->title }} photo"
                                    class="w-full h-64 object-cover rounded-lg shadow-md">
                            </div>
                            <div class="text-center">
                                <a href="{{ Storage::url($student->photo) }}" target="_blank"
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
                </p>
            </div>
        </div>
    </div>
@endsection
