<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <link href="/css/index.css" type="text/css" rel="stylesheet">
            <title>TDB Minetopia</title>
        </head>
        <body>
            <div class="banner">
                <div class="header">
                    <ul>
                        <li><a href=" {{  route("discord") }} ">Discord</a></li>
                        <li><a href="{{ route("home") }}">Inloggen</a></li>
                        <li><a href="#" onclick="window.open('/plots');">Plots</a></li>
                    </ul>
                </div>
                <div class="banner-content">
                    <h1>TDB Minetopia</h1>
                    <p>De beste MCBE NL reallife roleplaying server!</p>
                    <button onclick="window.open('minecraft://?addExternalServer=TDBNetwork|play.tdbnetwork.nl:19132')">Join de server!</button>
                </div>
            </div>

            <div class="content">
                <div class="items">
                    <div class="item">
                        <h2>Professioneel staffteam</h2>
                        <p>Ons staffteam houdt met elke beslissing rekening met de speler. De speler is het belangrijkste wat er in de server is en waarvoor wij bezig zijn en daarom proberen we alles eraan te doen om jullie tevreden te houden.</p>
                    </div>
                    <div class="item">
                        <h2>Unieke features</h2>
                        <ul>
                            <li>Huisdieren</li>
                            <li>3D models</li>
                            <li>Auto buy plot</li>
                            <li>En nog veel meer 😄...</li>
                        </ul>
                    </div>
                    <div class="item">
                        <h2>Webshop</h2>
                        <p>Koop nu toffe items voor een eerlijke prijs en ondersteun de server!</p>
                        <p><a href="{{  route("shop") }}">Koop een item</a></p>
                    </div>
                </div>
            </div>

            <div class="splashcontent" id="first">
                <div class="content">
                    <h2> PlotIndex </h2>
                    <p>Bekijk alle info over de Plots op de TDB PlotIndex!</p>
                    <button onclick="window.open('/plots')">PlotIndex</button>
                </div>
            </div>

            <div class="splashcontent" id="second">
                <div class="content">
                    <h2>Discord server</h2>
                    <p>Join nu onze discord server en maak een babbel met medespelers!</p>
                    <button onclick="window.open('/discord')">Discord</button>
                </div>
            </div>

            <div class="splashcontent" id="third">
                <div class="content">
                    <h2>Werken bij TDB</h2>
                    <p>Zin om van TDB een betere server te maken? Versterk het team nu en solliciteer voor een stafffunctie!</p>
                    <button onclick="window.open('/solliciteren')">Solliciteren</button>
                </div>
            </div>

        <div class="footer">
            <p>TDB Minetopia | Deze website is met liefde ontwikkelt door <a href="https://mohamedelyousfi.me">Mohamed</a></p>
        </div>
        </body>

<script>
    function notAvailable(){
        swal("Soon!", "Deze functie is nog niet beschikbaar!", "error");
    }
</script>
    </html>
