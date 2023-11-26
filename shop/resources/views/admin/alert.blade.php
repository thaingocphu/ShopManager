@if ($errors->any())
    <div>
         @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    </div>
@endif
{{-- custom message by session --}}
@if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif

@if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p>
@endif
