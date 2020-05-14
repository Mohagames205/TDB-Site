@extends("layouts.hk")

@section("staffcontent")
<div class="container">
    <div class="card">
        <div class="card-header"><h3>Sollicitaties</h3></div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if(count($applications) > 0)
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Spelernaam</th>
                    <th>Functie</th>
                    <th>Staff opmerking</th>
                    <th></th>
                </tr>

                </thead>
                <div class="accordion" id="accordionExample">
                    <tbody>
                    @foreach($applications as $application)
                        <thead class="thead-light">
                        <tr>
                            <th colspan="3">
                                Solliciatie #{{ $application->id }}  <span class="badge badge-{{ $application->applystatus->color }}">{{ $application->applystatus->change_text }}</span>
                            </th>
                            <th>
                                <a href=" {{ route("hk.applies") }}" onclick="event.preventDefault(); deleteRequest({{ $application->id }})"><span class="fas fa-trash" aria-hidden="true"></span></a>
                                <form method="post" id="deleteform{{ $application->id }}" action="{{ route("hk.applies") . "/" .  $application->id }}" style="outline: hidden;">
                                    @method("delete")
                                    @csrf
                                </form>
                            </th>
                        </tr>
                        </thead>
                        <tr>
                            <td> {{$application->user->name }}</td>
                            <td>{{ $application->functie }}</td>
                            <td>{{ $application->staffopmerking ?? "Nog geen opmerking" }}</td>

                            <td><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $application->id }}" aria-expanded="false" aria-controls="collapse{{ $application->id }}">
                                    Meer info
                                </button></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div id="collapse{{ $application->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <h4>Motivatie</h4>
                                    <p>{{ $application->motivatie }}</p>
                                    <h4>Waarom jij?</h4>
                                    <p>{{ $application->waaromjij }}</p>
                                    <h4>Ervaring</h4>
                                    <p> {{ $application->ervaring }}</p>
                                    <h4>Email</h4>
                                    <p> {{ $application->user->email }} </p>
                                    <hr>
                                    <form id="change" action=" {{ route("hk.applies") . "/".  $application->id }}" method="POST">
                                        @method("PUT")
                                        @csrf

                                        <input type="text" name="staffopmerking"><br><br>

                                        <button type="submit"  value="1"  name="change" class="btn btn-outline-success">Aannemen</button>

                                        <button type="submit" value="2" name="change" class="btn btn-outline-danger">Afwijzen</button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                </div>
            </table>
                @else
                <p> Er zijn op dit moment geen actieve solliciaties.</p>
                @endif
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h3>Verwerkte solliciaties</h3>
        </div>
        <div class="card-body">

            @if(count($processedapplies) > 0)
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Spelernaam</th>
                    <th>Functie</th>
                    <th>Staff opmerking</th>
                    <th></th>
                </tr>

                </thead>
                <div class="accordion" id="processedApplies">
                    <tbody>

                    @foreach($processedapplies as $application)
                        <thead class="thead-light">
                        <tr>
                            <th colspan="3">
                                Solliciatie #{{ $application->id }}  <span class="badge badge-{{ $application->applystatus->color }}">{{ $application->applystatus->change_text }}</span>
                            </th>
                            <th>
                                <a href=" {{ route("hk.applies") }}" onclick="event.preventDefault(); deleteRequest({{ $application->id }})"><span class="fas fa-trash" aria-hidden="true"></span></a>
                                <form method="post" id="deleteform{{ $application->id }}" action="{{ route("hk.applies") . "/" .  $application->id }}" style="outline: hidden;">
                                    @method("delete")
                                    @csrf
                                </form>
                            </th>

                        </tr>
                        </thead>
                        <tr>
                            <td> {{ $application->user->name }}</td>
                            <td>{{ $application->functie }}</td>
                            <td>{{ $application->staffopmerking ?? "Nog geen opmerking" }}</td>

                            <td><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsep{{ $application->id }}" aria-expanded="false" aria-controls="collapse{{ $application->id }}">
                                    Meer info
                                </button></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div id="collapsep{{ $application->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#processedApplies">
                                    <h4>Motivatie</h4>
                                    <p>{{ $application->motivatie }}</p>
                                    <h4>Waarom jij?</h4>
                                    <p>{{ $application->waaromjij }}</p>
                                    <h4>Ervaring</h4>
                                    <p> {{ $application->ervaring }}</p>
                                    <h4>Email</h4>
                                    <p> {{ $application->user->email }} </p>
                                    <hr>
                                    <form id="change" action=" {{ route("hk.applies") . "/".  $application->id }}" method="POST">
                                        @method("PUT")
                                        @csrf

                                        <input type="text" name="staffopmerking"><br><br>

                                        <button type="submit"  value="1"  name="change" class="btn btn-outline-success">Aannemen</button>

                                        <button type="submit" value="2" name="change" class="btn btn-outline-danger">Afwijzen</button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </div>
            </table>
            @else
            <p>Er zijn op dit moment geen actieve sollicitaties.</p>
            @endif
        </div>
    </div>
    </div>
    <script>
        function deleteRequest(id)
        {
            Swal.fire({
                title: 'Bent u zeker?',
                text: "U kan deze actie niet ongedaan maken!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Verwijderen!'
            }).then((result) => {
                if (result.value) {
                    console.log(id);
                    console.log("deleteform" + id);
                    document.getElementById('deleteform' + id).submit();
                }
            })
        }
    </script>
@endsection
