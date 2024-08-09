@extends('layouts.base', ['title' => $title ?? null])

@section('content')
    <x-navbar />

    <!-- Page Content -->
        <main class="py-6 sm:py-8 lg:py-16 min-h-[calc(100vh-7rem)]">
        {{ $slot }}
        </main>

    <x-footer />
@endsection
