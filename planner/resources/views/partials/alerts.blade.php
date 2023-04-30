@if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        {{ session()->get('success') }}
    </div>
@endif

