@extends('components.layouts.app')

@section('body-class', 'd-flex flex-column min-vh-100')

@section('content')
    <main class="p-5 my-auto" id="content">
        {!! $slot !!}
    </main>
@endsection
