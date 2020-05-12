@extends("layouts.app")

@section("content")
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
    <a class="navbar-brand" href="{{ route("hk") }}">Staffpaneel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContentA" aria-controls="navbarSupportedContentA" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContentA">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href=" {{ route("hk") }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" {{ route("hk.applies") }}">Sollicitaties</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" {{ route("hk.bans") }}">Bans</a>
            </li>
        </ul>
    </div>
    </div>
</nav>
<main class="py-4">
    @yield("staffcontent")
</main>

@endsection
