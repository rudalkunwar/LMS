@extends('instructor.layouts.app')
@push('title')
    Edit Assignment
@endpush

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center border-b-2">
            <h1 class="text-3xl font-bold text-gray-800 py-2">Edit Assignment</h1>
            <a href="{{ route('instructor.assignments.index') }}"
                class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-arrow-left-line text-lg"></i>
                <span class="font-semibold">Back</span>
            </a>
        </div>
        <div>
            <form action="{{ route('instructor.assignments.update', $assignment->id) }}" method="POST"
                class="bg-white p-6 rounded-md shadow-md">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="{{ $assignment->title }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ $assignment->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                    <input type="datetime-local" name="due_date" id="due_date" value="{{ $assignment->due_date }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="total_marks" class="block text-sm font-medium text-gray-700">Total Marks</label>
                    <input type="number" name="total_marks" id="total_marks" value="{{ $assignment->total_marks }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 w-full">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
