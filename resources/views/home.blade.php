@extends('layouts.app')

@section('content')
    <main class="py-4">
<div class="container">


    @if(session("maxapplies"))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p> {{ session("maxapplies") }} </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header"><h3>Jouw sollicitaties</h3></div>

        <div class="card-body">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if(count(Auth()->user()->applications) > 0)
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Functie</th>
                        <th>Staff opmerking</th>
                        <th></th>
                    </tr>

                    </thead>
                    <div class="accordion" id="accordionExample">
                    <tbody>

             @foreach(Auth()->user()->applications as $application)
                 <thead class="thead-light">
                <tr>
                    <th colspan="3">Solliciatie #{{ $application->id }}  <span class="badge badge-{{ $application->applystatus->color }}">{{ $application->applystatus->change_text }}</span></th>
                </tr>
                 </thead>
                <tr>
                    <td>{{ $application->functie }}</td>
                    <td>{{ $application->staffopmerking ?? "Nog geen opmerking" }}</td>

                    <td><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $application->id }}" aria-expanded="false" aria-controls="collapse{{ $application->id }}">
                            Meer info
                        </button></td>
                </tr>
                 <tr>
                     <td colspan="3">
                         <div id="collapse{{ $application->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                             <h4>Motivatie</h4>
                             <p>{{ $application->motivatie }}</p>
                             <h4>Waarom jij?</h4>
                             <p>{{ $application->waaromjij }}</p>
                             <h4>Ervaring</h4>
                             <p> {{ $application->ervaring }}</p>
                         </div>
                     </td>
                 </tr>

                @endforeach
                    </tbody>
                    </div>
                </table>
                @else
                    <p> U heeft geen actieve sollicitaties, solliciteer nu!</p>
                    <a class="btn btn-outline-primary" href="{{ route("apply") }}">Solliciteren</a>
                @endif
        </div>
    </div>
</div>
    </main>
@endsection
