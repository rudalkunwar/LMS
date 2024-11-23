@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-8 py-6">
        <div class="flex justify-between items-center py-2 mb-4 pb-2 shadow-md">
            <h1 class="text-3xl font-bold text-gray-800 px-4">Students</h1>
            <a href="{{ route('students.create') }}"
                class="bg-green-500 px-4 py-2 rounded-lg text-white  hover:bg-green-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-add-line text-lg"></i>
                <span class="font-semibold">Add Student</span>
            </a>
        </div>
        <div class="w-full">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="border-b bg-gray-100 text-left">
                        <th class="px-6 py-3">SN</th>
                        <th class="px-6 py-3">First Name</th>
                        <th class="px-6 py-3">Last Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Phone Number</th>
                        <th class="px-6 py-3">Course</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse($students as $student)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $i++ }}</td>
                            <td class="px-6 py-4">{{ $student->first_name }}</td>
                            <td class="px-6 py-4">{{ $student->last_name }}</td>
                            <td class="px-6 py-4">{{ $student->email }}</td>
                            <td class="px-6 py-4">{{ $student->phone_number }}</td>
                            <td class="px-6 py-4">{{ $student->course->title }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('students.edit', $student->id) }}"
                                    class="bg-blue-500 px-4 py-2 rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300">
                                    Edit
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 px-4 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center">No students found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
