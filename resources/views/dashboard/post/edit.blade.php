{{-- invoca master.blade.php para usar el layout --}}
@extends('dashboard.master')
@section('content')
    {{-- Invoca la validacion de validation-error.blade.php --}}
    @include('dashboard.partials.validation-error')
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @method('PUT')
        @include('dashboard.post._form')
    </form>
    <br>
    <form action="{{ route('post.image', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col">
                <input type="submit" class="btn btn-primary" value="subir">
            </div>
        </div>
    </form>
@endsection
