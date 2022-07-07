<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bitcoin tracker</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body id="app">
<header class="py-5 bg-surface-primary shadow border-bottom">
    <div class="container-xl">
        <div>
            <div class="row align-items-center">
                <div class="col-md-6 col-12 mb-3 mb-md-0">
                    <h1 class="h2 mb-0 ls-tight">Bitcoin tracker</h1>
                </div>
                <div class="col-md-6 col-12 text-md-end">
                    <div class="mx-n1">
                        <a href="https://github.com/dyanakiev/bitcoin-tracker" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                            <span>GitHub</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="py-10 bg-surface-secondary">
    <div class="container-xl">
        <h1>Bitcoin price graph</h1>
        <bitcoin-chart></bitcoin-chart>
        <h1>Subscribe for price changes</h1>
        <subscribe-form></subscribe-form>
    </div>

</main>
</body>
</html>
