@if(session()->has('success'))
    <div class="alert alert-success" id="initalHidden">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-danger" id="initalHidden">
        {{ session()->get('warning') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" id="initalHidden">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
