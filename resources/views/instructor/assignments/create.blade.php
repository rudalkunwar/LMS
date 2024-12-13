@extends('instructor.layouts.app')
@push('title')
    Create Assignment
@endpush

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center border-b-2 py-2">
            <h1 class="text-3xl font-bold text-gray-800 py-2">Create Assignment</h1>
            <a href="{{ route('instructor.assignments.index') }}"
                class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-arrow-left-line text-lg"></i>
                <span class="font-semibold">Back</span>
            </a>
        </div>
        <div class="">
            <form action="{{ route('instructor.assignments.store') }}" method="POST" class="bg-white p-6"
                enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                    <input type="hidden" name="course_id" id="course" value="{{ $course->id }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <input type="text" value="{{ $course->title }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        disabled>
                </div>
                <div class="mb-4">
                    <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                    <input type="datetime-local" name="due_date" id="due_date"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="total_marks" class="block text-sm font-medium text-gray-700">Total Marks</label>
                    <input type="number" name="total_marks" id="total_marks"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="file_path" class="block text-sm font-medium text-gray-700">Upload File</label>
                    <input type="file" name="file_path" id="file_path" accept=".docx,.doc,.pdf"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 w-full">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
