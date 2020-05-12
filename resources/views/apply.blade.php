@extends("layouts.app")

@section("content")

    <main class="py-4">
    <div class="container">
        <form method="post">
            @csrf
            <div class="row">
                <div class="form-group col">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="{{ Auth::user()->email }}" readonly>
                </div>
                <div class="form-group col">
                    <label for="exampleFormControlInput1">Username</label>
                    <input type="username" class="form-control" id="exampleFormControlInput1" name="username" placeholder="{{ Auth::user()->name }}" readonly>
                </div>
            </div>


            <div class="form-group">
                <label for="exampleFormControlSelect1">Functie</label>
                <select class="form-control" id="exampleFormControlSelect1" name="functie" required>
                    <option value="support">Support</option>
                    <option name="moderator">Moderator</option>
                    <option name="builder">Builder</option>
                    <option name="eventmanager">Eventmanager</option>
                    <option name="developer">Developer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Motivatie</label>
                <textarea name="motivatie" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ervaring</label>
                <textarea name="ervaring" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Waarom moeten wij precies jou kiezen?</label>
                <textarea name="waaromjij" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Solliciteer</button>
        </form>
    </div>
    </main>




@endsection
