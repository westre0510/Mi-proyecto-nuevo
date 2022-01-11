{{-- invoca master.blade.php para usar el layout --}}
@extends('dashboard.master')
{{-- Invoca la validacion de validation-error.blade.php --}}
@include('dashboard.partials.validation-error')
@section('content')
    <form action="{{ route('post.store') }}" method="POST">
        @include('dashboard.post._form')
    </form>
@endsection
