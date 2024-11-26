@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-8 py-6">
        <div class="flex justify-between items-center py-2 mb-6 shadow-md">
            <h1 class="text-3xl font-bold text-gray-800 px-4">Instructors Management</h1>
            <a href="{{ route('instructors.create') }}"
                class="bg-green-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-green-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-add-line text-lg"></i>
                <span class="font-semibold">Add New instructor</span>
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SN</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone
                            Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($instructors as $instructor)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $instructor->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $instructor->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $instructor->phone_number }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $instructor->course->title ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('instructors.show', $instructor) }}"
                                        class="text-blue-600 hover:text-blue-900 transition-colors">
                                        <i class="ri-eye-line text-lg"></i>
                                    </a>
                                    <a href="{{ route('instructors.edit', $instructor->id) }}"
                                        class="text-yellow-600 hover:text-yellow-900 transition-colors">
                                        <i class="ri-edit-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('instructors.destroy', $instructor) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this instructor?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 transition-colors bg-transparent">
                                            <i class="ri-delete-bin-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                No instructors found. <a href="{{ route('instructors.create') }}" class="text-blue-600">Add
                                    a
                                    instructor</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
