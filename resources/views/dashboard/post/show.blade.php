{{-- invoca master.blade.php para usar el layout --}}
@extends('dashboard.master')
@section('content')
    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input readonly class="form-control" type="text" name="title" id="title" value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <label for="url_clean">URL Limpia</label>
        <input readonly class="form-control" type="text" name="url_clean" id="url_clean" value="{{ $post->url_clean }}">
    </div>
    <div class="form-group">
        <label for="content" class="form-label">Contenido</label>
        <textarea readonly class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
    </div>
    <a class="btn btn-success mt-3 mb-3" href="{{route('post.index')}}">Regresar</a>
@endsection
