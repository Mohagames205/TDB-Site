@extends("layouts.hk")

@section("staffcontent")
    <div class="container">
        <div class="card">

            <div class="card-header"><h3>Verbande spelers</h3></div>

            <div class="card-body">

                @if(count($bans) > 0)
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Bantijd</th>
                        <th>Reden</th>
                        <th>Gebanned door</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($bans as $ban)
                        <thead class="thead-light">
                        <tr>
                            <th colspan="2">
                                {{ $ban->player }}
                            </th>
                            <th>

                                <a href=" {{ route("hk.bans") }}" onclick="event.preventDefault(); deleteRequest('{{ $ban->player }}')"><span class="fas fa-trash" aria-hidden="true"></span></a>
                                <form method="post" id="deleteform{{ $ban->player }}" action="{{ route("hk.bans") . "/" .  $ban->player }}" style="outline: hidden;">
                                    @method("delete")
                                    @csrf
                                </form>
                            </th>

                        </tr>
                        </thead>
                        <tr>
                            <td><b>{{ $ban->getTime()["days"] }}</b> dagen <b>{{ $ban->getTime()["hours"] }}</b> uren <b>{{ $ban->getTime()["minutes"] }}</b> minuten <b>{{ $ban->getTime()["seconds"] }}</b> seconden</td>
                            <td>{{ $ban->reason }}</td>
                            <td> {{ $ban->staff }}</td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>

                @else

                    <p>Er zijn geen spelers verbannen! :o</p>

                @endif

            </div>
        </div>
    </div>
    <script>
        function deleteRequest(playername)
        {
            Swal.fire({
                title: 'Opgepast!',
                text: "Wilt u " + playername + " echt unbannen?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Verwijderen!'
            }).then((result) => {
                if (result.value) {
                    console.log(playername);
                    console.log("deleteform" + playername);
                    document.getElementById('deleteform' + playername).submit();
                }
            })
        }
    </script>
@endsection
