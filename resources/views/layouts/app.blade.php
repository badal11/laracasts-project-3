@extends('layouts.master')

@section('body')
    <div id="app" class="h-screen antialiased leading-none">
        @yield('navbar')

        <div class="mx-auto">
            @yield('content')
        </div>

        <div class="fixed bottom-0 right-0 mb-5 mr-5">
            @include('flash::message')
        </div>

        @yield('footer')
    </div>
@endsection
