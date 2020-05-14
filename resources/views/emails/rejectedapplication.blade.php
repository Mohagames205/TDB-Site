<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TDB Network</title>
</head>

<body style="font-family: Roboto,sans-serif;">
<div class="banner" style="background-color:rgb(16,164,5); padding:20px;color:white;margin-bottom: 50px;">
    <h1> TDB Sollicitatie</h1>
</div>

<div class="text" style="margin: 20px;font-size: medium;color:black">
    <p> Beste {{ $name }},
        <br><br>
        Helaas moeten wij u meedelen dat uw sollicitatie voor {{ $functie }} is afgewezen.<br>
        De opgegeven reden is: <b> {{ $reason ?? "geen reden opgegeven."}}</b><br>
        <br>
        Met vriendelijke groeten,<br>
        TDB Network
    </p>
    <br>
    <hr>
    <p style="color:gray">TDB Network {{ date("Y") }} | Deze mail is automatisch gegenereerd door coole robotjes. <a href="https://tdbnetwork.nl/discord">Join de discord server!</a></p>
</div>
</body>
