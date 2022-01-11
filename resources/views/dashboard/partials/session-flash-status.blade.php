{{-- condicional de que si status existe se muestre el mensaje de que se creo el post --}}
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
