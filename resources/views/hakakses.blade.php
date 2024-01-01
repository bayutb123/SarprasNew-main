@extends('layouts.admin')

@section('main-content')
    <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" >!!!</div>
            <p class="lead text-gray-1000 mb-5">Your account cannot access this resource</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="/home">&larr; Back to Dashboard</a>
        </div>

@endsection
