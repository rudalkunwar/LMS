@extends('layouts.app')

@section('content')
    <div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
        <h1 class="text-3xl font-bold text-gray-800">Edit Courses</h1>
        <a href="{{ route('courses.index') }}"
            class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
            <i class="ri-arrow-left-line text-lg"></i>
            <span class="font-semibold">Cancel</span>
        </a>
    </div>
    <div class="container mx-auto px-8 py-6">
        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="bg-white p-6 rounded-lg shadow-md">
                <!-- Course Title -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-medium mb-2">Course Title</label>
                    <input type="text" id="title" name="title"
                        class="w-full px-4 py-2 border @error('title') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ $course->title }}" required>
                    @error('title')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lecture Hours -->
                <div class="mb-4">
                    <label for="lecture_hours" class="block text-gray-700 text-sm font-medium mb-2">Lecture Hours</label>
                    <input type="number" id="lecture_hours" name="lecture_hours"
                        class="w-full px-4 py-2 border @error('lecture_hours') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ $course->lecture_hours }}" required>
                    @error('lecture_hours')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Description</label>
                    <textarea id="description" name="description"
                        class="w-full px-4 py-2 border @error('description') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        rows="4" required>{{ $course->description }}</textarea>
                    @error('description')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Instructor -->
                <div class="mb-4">
                    <label for="instructor_id" class="block text-gray-700 text-sm font-medium mb-2">Instructor</label>
                    <select id="instructor_id" name="instructor_id"
                        class="w-full px-4 py-2 border @error('instructor_id') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>
                        @foreach ($instructors as $instructor)
                            <option value="{{ $instructor->id }}"
                                {{ old('instructor_id', $course->instructor_id) == $instructor->id ? 'selected' : '' }}>
                                {{ $instructor->first_name . ' ' . $instructor->last_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('instructor_id')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Course Image -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-medium mb-2">Course Image
                        (Optional)</label>
                    <input type="file" id="image" name="image"
                        class="w-full px-4 py-2 border @error('image') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('image')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-blue-500 w-full px-6 py-2 rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300">
                    Update Course
                </button>
            </div>
        </form>
    </div>
@endsection
