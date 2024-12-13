@extends('instructor.layouts.app')
@push('title')
    Assignment Details
@endpush

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center border-b-2">
            <h1 class="text-3xl font-bold text-gray-800 py-2">Assignment Details</h1>
            <a href="{{ route('instructor.assignments.index') }}"
                class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-arrow-left-line text-lg"></i>
                <span class="font-semibold">Back</span>
            </a>
        </div>
        <div>
            <div class="bg-white p-6 rounded-md shadow-md">
                <p class="mb-4"><strong>Description:</strong> {{ $assignment->description }}</p>
                <p class="mb-4"><strong>Due Date:</strong> {{ $assignment->due_date }}</p>
                <p class="mb-4"><strong>Total Marks:</strong> {{ $assignment->total_marks }}</p>
            </div>
        </div>
    </div>
@endsection
