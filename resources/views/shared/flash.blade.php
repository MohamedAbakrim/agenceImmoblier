<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @yield('content')
</div>  