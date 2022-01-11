@csrf
<div class="form-group">
    <label for="title">Título</label>
    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
    {{-- mesaje de error especifico para title --}}
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="url_clean">URL Limpia</label>
    <input class="form-control" type="text" name="url_clean" id="url_clean"
        value="{{ old('url_clean', $post->url_clean) }}">
</div>
<div class="form-group">
    <label for="categoria_id">Categoría</label>
    <select name="category_id" class="form-control" id="category_id">
        @foreach ($categories as $title => $id)
            <option {{$post->category_id == $id ? 'selected="selected"' : ''}}  value="{{ $id }}">{{ $title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="posted">Posteado</label>
    <select name="posted" class="form-control" id="posted">
        @include('dashboard.partials.option-yes-not',['val'=> $post->posted]);
    </select>
</div>
<div class="form-group">
    <label for="content" class="form-label">Contenido</label>
    {{-- el siguiente codigo {{old('content')}} es para recordar el valor del campo del formulario --}}
    <textarea class="form-control" id="content" name="content"
        rows="3">{{ old('content', $post->content) }}</textarea>
    {{-- mesaje de error especifico para content --}}
    @error('content')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<input type="submit" value="Enviar" class="btn btn-primary">
