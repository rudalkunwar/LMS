@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Course Details</h1>
            <div class="flex space-x-2">
                <a href="{{ route('courses.edit', $course) }}" 
                   class="bg-yellow-500 px-4 py-2 rounded-lg text-white shadow-lg hover:bg-yellow-600 transition-colors duration-300 flex items-center space-x-2">
                    <i class="ri-edit-line"></i>
                    <span>Edit</span>
                </a>
                <a href="{{ route('courses.index') }}"
                   class="bg-gray-500 px-4 py-2 rounded-lg text-white shadow-lg hover:bg-gray-600 transition-colors duration-300 flex items-center space-x-2">
                    <i class="ri-arrow-left-line"></i>
                    <span>Back to Courses</span>
                </a>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Course Details Card -->
            <div class="md:col-span-2 bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-gray-800">{{ $course->title }}</h2>
                            <p class="text-gray-600 mt-1">
                                <span class="font-medium">Course Code:</span> {{ $course->code }}
                            </p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold 
                            {{ $course->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($course->status) }}
                        </span>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Description</h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $course->description }}
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 mt-6">
                        <div>
                            <h4 class="text-md font-semibold text-gray-700 mb-2">Created At</h4>
                            <p class="text-gray-600">
                                {{ $course->created_at->format('F d, Y H:i A') }}
                            </p>
                        </div>
                        <div>
                            <h4 class="text-md font-semibold text-gray-700 mb-2">Last Updated</h4>
                            <p class="text-gray-600">
                                {{ $course->updated_at->format('F d, Y H:i A') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thumbnail and Additional Info -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Course Thumbnail</h3>
                    @if($course->thumbnail)
                        <div class="mb-4">
                            <img src="{{ Storage::url($course->thumbnail) }}" 
                                 alt="{{ $course->title }} Thumbnail" 
                                 class="w-full h-64 object-cover rounded-lg shadow-md">
                        </div>
                        <div class="text-center">
                            <a href="{{ Storage::url($course->thumbnail) }}" 
                               target="_blank" 
                               class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="ri-download-line mr-2"></i>Download Image
                            </a>
                        </div>
                    @else
                        <div class="bg-gray-100 rounded-lg p-6 text-center">
                            <i class="ri-image-line text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">No thumbnail uploaded</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection