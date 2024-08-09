@extends('layouts.base')

@section('content')
    <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-danger"/>
            </a>
        </div>

        <x-card class="w-full max-w-md pt-6 mt-6">
            <x-slot name='content'>{{ $slot }}</x-slot>
        </x-card>
    </div>
@endsection
