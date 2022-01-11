@extends('dashboard.master')

@section('content')
    <div class="form-group">
        <label for="title">Título</label>
        <input readonly class="form-control" type="text" name="title" id="title" value="{{ $category->title }}">
    </div>
    <div class="form-group">
        <label for="url_clean">Url limpia</label>
        <input readonly class="form-control" type="text" name="url_clean" id="url_clean"
            value="{{ $category->url_clean }}">
    </div>
    <a class="btn btn-success mt-3 mb-3" href="{{route('category.index')}}">Regresar</a>
@endsection
