@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-8 py-6">
        <div class="flex justify-between items-center py-2 mb-4 pb-2 shadow-md">
            <h1 class="text-3xl font-bold text-gray-800 px-4">Edit Student</h1>
            <a href="{{ route('students.index') }}"
                class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-arrow-left-line text-lg"></i>
                <span class="font-semibold">Back</span>
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border @error('name') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('name', $student->name) }}" required>
                    @error('name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border @error('email') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('email', $student->email) }}" required>
                    @error('email')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone_number" class="block text-gray-700 text-sm font-medium mb-2">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number"
                        class="w-full px-4 py-2 border @error('phone_number') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('phone_number', $student->phone_number) }}">
                    @error('phone_number')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-medium mb-2">Address</label>
                    <input type="text" id="address" name="address"
                        class="w-full px-4 py-2 border @error('address') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('address', $student->address) }}">
                    @error('address')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="mb-4">
                    <label for="dob" class="block text-gray-700 text-sm font-medium mb-2">Date of Birth</label>
                    <input type="date" id="dob" name="dob"
                        class="w-full px-4 py-2 border @error('dob') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('dob', $student->dob) }}">
                    @error('dob')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Course -->
                <div class="mb-4">
                    <label for="course_id" class="block text-gray-700 text-sm font-medium mb-2">Assign Course</label>
                    <select id="course_id" name="course_id"
                        class="w-full px-4 py-2 border @error('course_id') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="">Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}"
                                {{ $student->course_id == $course->id ? 'selected' : '' }}>
                                {{ $course->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- User Image (photo) -->
                <div class="mb-4">
                    <label for="photo" class="block text-gray-700 text-sm font-medium mb-2">Student Image
                        (Optional)</label>
                    <input type="file" id="photo" name="photo"
                        class="w-full px-4 py-2 border @error('photo') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('photo')
                        <p class="mt-1 text -red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-blue-500 w-full px-6 py-2 rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300">
                    Update Student
                </button>
            </form>
        </div>
    </div>
    <script>
        // Optional: Preview image before upload
        document.getElementById('photo').addEventListener('change', function(event) {
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
