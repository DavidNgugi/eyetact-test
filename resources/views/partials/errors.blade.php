@if ($errors && count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Sorry!</strong> There were more problems with your form.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif