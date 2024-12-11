@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Lesson Details</h2>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <!-- Lesson Title -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Title</h3>
            <p class="mt-2 text-gray-600">{{ $lesson->title }}</p>
        </div>

        <!-- Course -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Course</h3>
            <p class="mt-2 text-gray-600">{{ $lesson->course->title }}</p>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Description</h3>
            <p class="mt-2 text-gray-600">{{ $lesson->description }}</p>
        </div>

        <!-- Lesson Type -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Lesson Type</h3>
            <p class="mt-2 text-gray-600 capitalize">{{ $lesson->lesson_type }}</p>
        </div>

        <!-- Content URL -->
        @if($lesson->content_url)
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Content URL</h3>
            <p class="mt-2 text-gray-600">
                <a href="{{ $lesson->content_url }}" target="_blank" class="text-blue-500 hover:underline">{{ $lesson->content_url }}</a>
            </p>
        </div>
        @endif

        <!-- Order -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Lesson Order</h3>
            <p class="mt-2 text-gray-600">{{ $lesson->order }}</p>
        </div>

        <!-- Created At and Updated At -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Created At</h3>
            <p class="mt-2 text-gray-600">{{ $lesson->created_at->format('F j, Y, g:i a') }}</p>
        </div>
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Updated At</h3>
            <p class="mt-2 text-gray-600">{{ $lesson->updated_at->format('F j, Y, g:i a') }}</p>
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route('lessons.index') }}" class="px-6 py-2 bg-gray-300 text-gray-700 font-semibold rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Back to Lessons
            </a>
        </div>
    </div>
</div>
@endsection
