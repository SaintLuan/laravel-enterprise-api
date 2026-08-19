<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Docs · {{ config('app.name', 'Laravel Enterprise API') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=newsreader:400,500,600&family=ibm-plex-sans:400,500" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/swagger-ui-dist@5/swagger-ui.css">
        <style>
            :root {
                --bg: #f4f1ea;
                --ink: #161513;
                --mute: #7a756c;
                --line: #d8d2c6;
            }

            * { box-sizing: border-box; }

            html, body { margin: 0; }

            body {
                min-height: 100vh;
                background: var(--bg);
                color: var(--ink);
                font-family: "IBM Plex Sans", ui-sans-serif, system-ui, sans-serif;
                font-size: 14px;
                letter-spacing: 0.01em;
            }

            a { color: inherit; text-decoration: none; }

            .wrap {
                width: min(1080px, calc(100% - 3rem));
                margin: 0 auto;
            }

            header {
                display: flex;
                align-items: baseline;
                justify-content: space-between;
                gap: 1.5rem;
                padding: 1.75rem 0 1.5rem;
                border-bottom: 1px solid var(--line);
            }

            .mark,
            nav {
                font-size: 11px;
                letter-spacing: 0.14em;
                text-transform: uppercase;
            }

            nav { display: flex; gap: 1.5rem; }
            nav a { color: var(--mute); }
            nav a:hover,
            .mark:hover,
            nav a.is-current { color: var(--ink); }

            .hero {
                padding: 3.5rem 0 2.5rem;
                border-bottom: 1px solid var(--line);
            }

            .kicker {
                margin: 0 0 1.25rem;
                color: var(--mute);
                font-size: 11px;
                letter-spacing: 0.18em;
                text-transform: uppercase;
            }

            h1 {
                margin: 0;
                font-family: Newsreader, "Times New Roman", serif;
                font-size: clamp(3rem, 8vw, 5.5rem);
                font-weight: 500;
                line-height: 0.92;
                letter-spacing: -0.04em;
            }

            .lead {
                max-width: 34rem;
                margin: 1.75rem 0 0;
                color: var(--mute);
                font-size: 16px;
                line-height: 1.6;
            }

            #swagger-ui {
                padding: 1.5rem 0 2rem;
            }

            .swagger-ui { font-family: "IBM Plex Sans", ui-sans-serif, system-ui, sans-serif; color: var(--ink); }
            .swagger-ui .topbar,
            .swagger-ui .information-container.wrapper,
            .swagger-ui .scheme-container { display: none; }
            .swagger-ui .wrapper { padding: 0; max-width: none; }
            .swagger-ui .info { margin: 0; }
            .swagger-ui .wrapper .block { background: transparent; }
            .swagger-ui .opblock-tag-section { border: 0; }
            .swagger-ui .opblock-tag {
                border-bottom: 1px solid var(--line);
                font-family: Newsreader, serif;
                font-size: 1.5rem;
                font-weight: 500;
                color: var(--ink);
                padding: 1.5rem 0;
            }
            .swagger-ui .opblock-tag small { font-family: "IBM Plex Sans", sans-serif; font-size: 13px; color: var(--mute); }
            .swagger-ui .opblock {
                margin: 0.85rem 0;
                border: 1px solid var(--line);
                border-radius: 0;
                box-shadow: none;
                background: transparent;
            }
            .swagger-ui .opblock .opblock-summary {
                padding: 0.7rem 0.9rem;
                border: 0;
            }
            .swagger-ui .opblock .opblock-summary-method {
                min-width: 4.5rem;
                background: var(--ink) !important;
                color: var(--bg);
                font-size: 10px;
                letter-spacing: 0.12em;
                border-radius: 0;
            }
            .swagger-ui .opblock.opblock-get,
            .swagger-ui .opblock.opblock-post,
            .swagger-ui .opblock.opblock-put,
            .swagger-ui .opblock.opblock-patch,
            .swagger-ui .opblock.opblock-delete {
                background: transparent;
                border-color: var(--line);
            }
            .swagger-ui .opblock .opblock-summary-path,
            .swagger-ui .opblock .opblock-summary-path__deprecated {
                font-family: "IBM Plex Sans", sans-serif;
                font-size: 13px;
                color: var(--ink);
            }
            .swagger-ui .opblock .opblock-summary-description { color: var(--mute); }
            .swagger-ui .opblock-body { background: transparent; }
            .swagger-ui .opblock-section-header {
                background: transparent;
                box-shadow: none;
                border-bottom: 1px solid var(--line);
            }
            .swagger-ui .opblock-description-wrapper p,
            .swagger-ui .response-col_description,
            .swagger-ui table thead tr td,
            .swagger-ui table thead tr th,
            .swagger-ui .parameter__name,
            .swagger-ui .parameter__type,
            .swagger-ui .tab li { color: var(--mute); font-family: inherit; }
            .swagger-ui .btn {
                border-radius: 0;
                box-shadow: none;
                font-family: inherit;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                font-size: 11px;
            }
            .swagger-ui .btn.execute { background: var(--ink); color: var(--bg); border-color: var(--ink); }
            .swagger-ui .btn.try-out__btn { border-color: var(--ink); color: var(--ink); }
            .swagger-ui .highlight-code, .swagger-ui .microlight, .swagger-ui pre { background: #ebe6dc !important; }
            .swagger-ui .model-box, .swagger-ui section.models { border-color: var(--line); background: transparent; }
            .swagger-ui section.models h4 { font-family: Newsreader, serif; color: var(--ink); }
            .swagger-ui svg { fill: var(--ink); }

            footer {
                display: flex;
                justify-content: space-between;
                gap: 1rem;
                padding: 1.5rem 0 2rem;
                border-top: 1px solid var(--line);
                color: var(--mute);
                font-size: 11px;
                letter-spacing: 0.12em;
                text-transform: uppercase;
            }

            @media (max-width: 800px) {
                .wrap { width: calc(100% - 2rem); }
            }
        </style>
    </head>
    <body>
        <div class="wrap">
            <header>
                <a class="mark" href="{{ route('home') }}">Laravel Enterprise API</a>
                <nav>
                    <a class="is-current" href="{{ route('docs.swagger') }}">Open Swagger</a>
                    <a href="{{ url('/api/v1/health') }}">Health</a>
                </nav>
            </header>

            <section class="hero">
                <p class="kicker">Docs / OpenAPI</p>
                <h1>The contract.</h1>
                <p class="lead">Interactive specification for <code>/api/v1</code>. Try the health endpoint, then follow the resources as they land.</p>
            </section>

            <div id="swagger-ui"></div>

            <footer>
                <span>2026</span>
                <span>v1</span>
            </footer>
        </div>

        <script src="https://unpkg.com/swagger-ui-dist@5/swagger-ui-bundle.js"></script>
        <script>
            window.onload = () => {
                window.ui = SwaggerUIBundle({
                    url: "{{ url('/docs/openapi.yaml') }}",
                    dom_id: '#swagger-ui',
                    deepLinking: true,
                    docExpansion: 'list',
                    defaultModelsExpandDepth: 0,
                    presets: [SwaggerUIBundle.presets.apis],
                    layout: 'BaseLayout',
                });
            };
        </script>
    </body>
</html>
