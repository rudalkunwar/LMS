@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Lesson</h2>

    <form action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Course Selection -->
        <div class="flex flex-col">
            <label for="course_id" class="font-semibold text-gray-700">Course</label>
            <select id="course_id" name="course_id" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <!-- Add courses dynamically -->
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Lesson Title -->
        <div class="flex flex-col">
            <label for="title" class="font-semibold text-gray-700">Lesson Title</label>
            <input type="text" id="title" name="title" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Lesson Description -->
        <div class="flex flex-col">
            <label for="description" class="font-semibold text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
        </div>

        <!-- Lesson Type -->
        <div class="flex flex-col">
            <label for="lesson_type" class="font-semibold text-gray-700">Lesson Type</label>
            <select id="lesson_type" name="lesson_type" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="video">Video</option>
                <option value="document">Document</option>
                <option value="quiz">Quiz</option>
                <option value="text">Text</option>
            </select>
        </div>

        <!-- Content URL (Optional) -->
        <div class="flex flex-col">
            <label for="content_url" class="font-semibold text-gray-700">Content URL</label>
            <input type="url" id="content_url" name="content_url" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="URL for video/document (optional)">
        </div>

        <!-- Lesson Order -->
        <div class="flex flex-col">
            <label for="order" class="font-semibold text-gray-700">Lesson Order</label>
            <input type="number" id="order" name="order" value="0" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end space-x-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create Lesson
            </button>
            <a href="{{ route('lessons.index') }}" class="px-6 py-2 bg-gray-300 text-gray-700 font-semibold rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
