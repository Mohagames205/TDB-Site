<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <!-- Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->
            <script type="text/javascript" async=true>
                (function() {
                    var host = window.location.hostname;
                    var element = document.createElement('script');
                    var firstScript = document.getElementsByTagName('script')[0];
                    var milliseconds = new Date().getTime();
                    var url = 'https://quantcast.mgr.consensu.org'
                        .concat('/choice/', 'TVqJFs7mKBKYu', '/', host, '/choice.js')
                        .concat('?timestamp=', milliseconds);
                    var uspTries = 0;
                    var uspTriesLimit = 3;
                    element.async = true;
                    element.type = 'text/javascript';
                    element.src = url;

                    firstScript.parentNode.insertBefore(element, firstScript);

                    function makeStub() {
                        var TCF_LOCATOR_NAME = '__tcfapiLocator';
                        var queue = [];
                        var win = window;
                        var cmpFrame;

                        function addFrame() {
                            var doc = win.document;
                            var otherCMP = !!(win.frames[TCF_LOCATOR_NAME]);

                            if (!otherCMP) {
                                if (doc.body) {
                                    var iframe = doc.createElement('iframe');

                                    iframe.style.cssText = 'display:none';
                                    iframe.name = TCF_LOCATOR_NAME;
                                    doc.body.appendChild(iframe);
                                } else {
                                    setTimeout(addFrame, 5);
                                }
                            }
                            return !otherCMP;
                        }

                        function tcfAPIHandler() {
                            var gdprApplies;
                            var args = arguments;

                            if (!args.length) {
                                return queue;
                            } else if (args[0] === 'setGdprApplies') {
                                if (
                                    args.length > 3 &&
                                    args[2] === 2 &&
                                    typeof args[3] === 'boolean'
                                ) {
                                    gdprApplies = args[3];
                                    if (typeof args[2] === 'function') {
                                        args[2]('set', true);
                                    }
                                }
                            } else if (args[0] === 'ping') {
                                var retr = {
                                    gdprApplies: gdprApplies,
                                    cmpLoaded: false,
                                    cmpStatus: 'stub'
                                };

                                if (typeof args[2] === 'function') {
                                    args[2](retr);
                                }
                            } else {
                                queue.push(args);
                            }
                        }

                        function postMessageEventHandler(event) {
                            var msgIsString = typeof event.data === 'string';
                            var json = {};

                            try {
                                if (msgIsString) {
                                    json = JSON.parse(event.data);
                                } else {
                                    json = event.data;
                                }
                            } catch (ignore) {}

                            var payload = json.__tcfapiCall;

                            if (payload) {
                                window.__tcfapi(
                                    payload.command,
                                    payload.version,
                                    function(retValue, success) {
                                        var returnMsg = {
                                            __tcfapiReturn: {
                                                returnValue: retValue,
                                                success: success,
                                                callId: payload.callId
                                            }
                                        };
                                        if (msgIsString) {
                                            returnMsg = JSON.stringify(returnMsg);
                                        }
                                        event.source.postMessage(returnMsg, '*');
                                    },
                                    payload.parameter
                                );
                            }
                        }

                        while (win) {
                            try {
                                if (win.frames[TCF_LOCATOR_NAME]) {
                                    cmpFrame = win;
                                    break;
                                }
                            } catch (ignore) {}

                            if (win === window.top) {
                                break;
                            }
                            win = win.parent;
                        }
                        if (!cmpFrame) {
                            addFrame();
                            win.__tcfapi = tcfAPIHandler;
                            win.addEventListener('message', postMessageEventHandler, false);
                        }
                    };

                    if (typeof module !== 'undefined') {
                        module.exports = makeStub;
                    } else {
                        makeStub();
                    }

                    var uspStubFunction = function() {
                        var arg = arguments;
                        if (typeof window.__uspapi !== uspStubFunction) {
                            setTimeout(function() {
                                if (typeof window.__uspapi !== 'undefined') {
                                    window.__uspapi.apply(window.__uspapi, arg);
                                }
                            }, 500);
                        }
                    };

                    var checkIfUspIsReady = function() {
                        uspTries++;
                        if (window.__uspapi === uspStubFunction && uspTries < uspTriesLimit) {
                            console.warn('USP is not accessible');
                        } else {
                            clearInterval(uspInterval);
                        }
                    };

                    if (typeof window.__uspapi === 'undefined') {
                        window.__uspapi = uspStubFunction;
                        var uspInterval = setInterval(checkIfUspIsReady, 6000);
                    }
                })();
            </script>
            <!-- End Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <link href="/css/index.css" type="text/css" rel="stylesheet">
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167986749-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-167986749-1');
            </script>

            <title>TDB Life</title>
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
                    <h1>TDB Life</h1>
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
                    <p>Join nu onze discord server en babbel gezellig mee!</p>
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
            <p>TDB Life | Deze website is met liefde ontwikkelt door <a href="https://mohamedelyousfi.me">Mohamed</a></p>
        </div>
        </body>
    </html>
