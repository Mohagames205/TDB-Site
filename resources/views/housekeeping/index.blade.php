@extends("layouts.hk")

@section("staffcontent")

    <div class="py-lg-4">
        <div class="container">

            <h2>Welkom {{ auth()->user()->name }}</h2>

            <div class="row">
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">
                            Verbannen spelers
                        </div>
                        <div class="card-body">
                            <h3> TEST </h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">
                            Online spelers
                        </div>
                        <div class="card-body">
                            <h3> TEST </h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">
                            Unieke spelers
                        </div>
                        <div class="card-body">
                            <h3> TEST </h3>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>



@endsection
