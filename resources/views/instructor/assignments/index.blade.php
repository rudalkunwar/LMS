@extends('instructor.layouts.app')
@push('title')
    Assignments
@endpush

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center border-b-2">
            <h1 class="text-3xl font-bold text-gray-800 py-2">Assignments</h1>
            <a href="{{ route('instructor.assignments.create') }}"
                class="bg-green-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-green-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-add-line text-lg"></i>
                <span class="font-semibold">Add New Assignment</span>
            </a>
        </div>
        <div class="bg-white shadow-md rounded-md overflow-hidden mt-2">
            <table class="table-auto w-full border-collapse border border-gray-200 text-center">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Due Date</th>
                        <th class="border px-4 py-2">Total Marks</th>
                        <th class="border px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assignments as $assignment)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $assignment->title }}</td>
                            <td class="border px-4 py-2">{{ $assignment->due_date }}</td>
                            <td class="border px-4 py-2">{{ $assignment->total_marks }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('instructor.assignments.show', $assignment->id) }}"
                                    class="text-blue-500 hover:underline">View</a> |
                                <a href="{{ route('instructor.assignments.edit', $assignment->id) }}"
                                    class="text-yellow-500 hover:underline">Edit</a> |
                                <form action="{{ route('instructor.assignments.destroy', $assignment->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2" colspan="4">No Assignments aviliable</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
