@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <center>
                <li>{{ $error }}</li>
            </center>
        </div>
    @endforeach
@endif
