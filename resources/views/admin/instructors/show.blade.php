@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800">Instructor Details</h1>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <!-- Profile Section -->
            <div class="flex items-center p-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white">
                <div class="flex-shrink-0">
                    <img class="h-24 w-24 rounded-full object-cover border-4 border-white shadow-lg"
                        src="{{ $instructor->photo_url }}" alt="{{ $instructor->first_name }} {{ $instructor->last_name }}">
                </div>
                <div class="ml-6">
                    <div class="mb-2">
                        <span class="font-bold text-lg">Name:</span>
                        <span class="text-lg">{{ $instructor->first_name }} {{ $instructor->last_name }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-bold">Department:</span>
                        <span>{{ $instructor->department }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-bold">Email:</span>
                        <span>{{ $instructor->email }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-bold">Phone:</span>
                        <span>{{ $instructor->phone_number }}</span>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <table class="min-w-full bg-white border-t border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-b text-left text-gray-600 font-medium">SN</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 border-b text-gray-800">{{ $instructor->id }}</td>
                        <td class="px-6 py-4 border-b">
                            <a href="{{ route('instructors.edit', $instructor->id) }}"
                                class="text-blue-600 hover:text-blue-800 font-medium transition">Edit</a>
                            <form action="{{ route('instructors.destroy', $instructor->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:text-red-800 font-medium transition ml-4">Delete</button>
                            </form>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Back Button -->
        <div class="mt-8 text-center">
            <a href="{{ route('instructors.index') }}"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 shadow-md transition duration-300">
                Back to Instructors List
            </a>
        </div>
    </div>
@endsection
