@extends('layouts.app')
@push('title')
    Dashboard
@endpush
@section('content')
    <main class="p-6 bg-gray-100 min-h-screen">
        <div class="container mx-auto">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800 pl-4 md:pl-8">Dashboard</h1>
            </div>
            <div class="mb-6">
                @include('admin.dashboard_partials.info-cards')
            </div>
            <div class="py-2 mb-6">
                <h2 class="text-xl font-bold text-gray-800 pl-4 md:pl-8">Line Chart</h2>
                @include('admin.dashboard_partials.line-chart')
            </div>
            <div class="py-2 mb-6">
                <h2 class="text-xl font-bold text-gray-800 pl-4 md:pl-8">Bar Chart</h2>
                @include('admin.dashboard_partials.bar-chart')
            </div>
            <div class="mb-6">
                <h2 class="text-xl font-bold text-gray-800 pl-4 md:pl-8">Table</h2>
                @include('admin.dashboard_partials.table')
            </div>
        </div>
    </main>
@endsection
