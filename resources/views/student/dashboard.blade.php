@extends('instructor.layouts.app')
@section('content')
    <h2>Student Dashboard</h2>
    <form action="{{ route('student.logout') }}" method="POST">
        @csrf
        <button type="submit">logout</button>
    </form>
@endsection
