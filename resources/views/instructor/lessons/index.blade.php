@extends('instructor.layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">All Lessons</h2>

    <div class="mb-6">
        <a href="{{ route('lessons.create') }}" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Add New Lesson
        </a>
    </div>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
        <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="px-6 py-3 text-left">Title</th>
                <th class="px-6 py-3 text-left">Course</th>
                <th class="px-6 py-3 text-left">Lesson Type</th>
                <th class="px-6 py-3 text-left">Order</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lessons as $lesson)
            <tr class="border-b">
                <td class="px-6 py-3">{{ $lesson->title }}</td>
                <td class="px-6 py-3">{{ $lesson->course->title }}</td>
                <td class="px-6 py-3 capitalize">{{ $lesson->lesson_type }}</td>
                <td class="px-6 py-3">{{ $lesson->order }}</td>
                <td class="px-6 py-3">
                    <a href="{{ route('lessons.edit', $lesson->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
