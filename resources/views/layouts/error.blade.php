@if ($errors->any())
    <div class="alert alert-danger">
        The following validation errors have occured:<br />
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif