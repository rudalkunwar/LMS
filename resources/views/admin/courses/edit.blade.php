@extends('admin.layouts.app')

@section('content')
    <div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
        <h1 class="text-3xl font-bold text-gray-800">Edit Course</h1>
        <a href="{{ route('courses.index') }}"
            class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
            <i class="ri-arrow-left-line text-lg"></i>
            <span class="font-semibold">Cancel</span>
        </a>
    </div>
    <div class="container mx-auto px-8 py-6">
        <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-white p-6 rounded-lg shadow-md">
                <!-- Course Code -->
                <div class="mb-4">
                    <label for="code" class="block text-gray-700 text-sm font-medium mb-2">Course Code</label>
                    <input type="text" id="code" name="code"
                        class="w-full px-4 py-2 border @error('code') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('code', $course->code) }}" required>
                    @error('code')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Course Title -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-medium mb-2">Course Title</label>
                    <input type="text" id="title" name="title"
                        class="w-full px-4 py-2 border @error('title') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('title', $course->title) }}" required>
                    @error('title')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Description</label>
                    <textarea id="description" name="description"
                        class="w-full px-4 py-2 border @error('description') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        rows="4" required>{{ old('description', $course->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Course Image (Thumbnail) -->
                <div class="mb-4">
                    <label for="thumbnail" class="block text-gray-700 text-sm font-medium mb-2">Course Image
                        (Optional)</label>
                    <input type="file" id="thumbnail" name="thumbnail"
                        class="w-full px-4 py-2 border @error('thumbnail') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('thumbnail')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @if ($course->thumbnail)
                        <div class="mt-2">
                            <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                            <img src="{{ Storage::url($course->thumbnail) }}" alt="Course Thumbnail"
                                class="h-32 w-auto object-cover rounded-lg">
                        </div>
                    @endif
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-medium mb-2">Status</label>
                    <select id="status" name="status"
                        class="w-full px-4 py-2 border @error('status') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>
                        <option value="active" {{ old('status', $course->status) == 'active' ? 'selected' : '' }}>Active
                        </option>
                        <option value="inactive" {{ old('status', $course->status) == 'inactive' ? 'selected' : '' }}>
                            Inactive</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-4">
                    <button type="submit"
                        class="bg-blue-500 w-full px-6 py-2 rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300">
                        Update Course
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Optional: Preview image before upload
        document.getElementById('thumbnail').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.classList.add('h-32', 'w-auto', 'object-cover', 'rounded-lg', 'mt-2');

                const previewContainer = document.querySelector('.mt-2');
                if (previewContainer) {
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(preview);
                } else {
                    event.target.closest('.mb-4').querySelector('label').insertAdjacentElement('afterend',
                        preview);
                }
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
