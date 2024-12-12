@extends('instructor.layouts.app')
@section('content')
    <div class="border-b border-b-black">
        <h2 class="text-3xl py-2 font-bold">My Students</h2>
    </div>
    <div class="mt-2">
        <table class="w-full text-center p-2 ">
            <tr class="border bg-gray-400">
                <th class="p-2">ID</th>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">View</th>
            </tr>
            <tr class="border">
                @forelse ($students as $student)
                    <td class="p-2 border">{{ $student->id }}</td>
                    <td class="p-2 border">{{ $student->name }}</td>
                    <td class="p-2 border">{{ $student->email }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('instructor.students.show', $student->id) }}"
                            class="text-blue-400 hover:underline">more</a>
                    </td>
                @empty
                    <td colspan="4">No students aviliable.</td>
                @endforelse

            </tr>
        </table>
    </div>
@endsection
