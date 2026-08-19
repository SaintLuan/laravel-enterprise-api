<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel Enterprise API') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=newsreader:400,500,600&family=ibm-plex-sans:400,500" rel="stylesheet">
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

            a {
                color: inherit;
                text-decoration: none;
            }

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

            nav {
                display: flex;
                gap: 1.5rem;
            }

            nav a {
                color: var(--mute);
            }

            nav a:hover,
            .mark:hover {
                color: var(--ink);
            }

            .hero {
                padding: 4.5rem 0 3.5rem;
                border-bottom: 1px solid var(--line);
            }

            .kicker {
                margin: 0 0 1.5rem;
                color: var(--mute);
                font-size: 11px;
                letter-spacing: 0.18em;
                text-transform: uppercase;
            }

            h1 {
                margin: 0;
                max-width: 14ch;
                font-family: Newsreader, "Times New Roman", serif;
                font-size: clamp(3.4rem, 9vw, 7rem);
                font-weight: 500;
                line-height: 0.92;
                letter-spacing: -0.04em;
            }

            .hero-foot {
                display: grid;
                grid-template-columns: 1fr auto;
                gap: 2rem;
                align-items: end;
                margin-top: 3.5rem;
            }

            .lead {
                max-width: 34rem;
                margin: 0;
                color: var(--mute);
                font-size: 16px;
                line-height: 1.6;
            }

            .cta {
                font-size: 11px;
                letter-spacing: 0.16em;
                text-transform: uppercase;
                border-bottom: 1px solid var(--ink);
                padding-bottom: 0.2rem;
            }

            .cta:hover { opacity: 0.55; }

            .index {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                padding: 0;
            }

            article {
                padding: 2.25rem 1.5rem 2.5rem 0;
                border-right: 1px solid var(--line);
            }

            article:last-child {
                padding-right: 0;
                padding-left: 1.5rem;
                border-right: 0;
            }

            article:nth-child(2) { padding-left: 1.5rem; }

            .num {
                display: block;
                margin-bottom: 1.75rem;
                color: var(--mute);
                font-size: 11px;
                letter-spacing: 0.16em;
            }

            h2 {
                margin: 0 0 0.85rem;
                font-family: Newsreader, serif;
                font-size: 1.5rem;
                font-weight: 500;
            }

            article p,
            article li {
                margin: 0;
                color: var(--mute);
                line-height: 1.7;
            }

            article ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            article li + li { margin-top: 0.3rem; }

            code {
                font-family: "IBM Plex Sans", sans-serif;
                font-size: 0.92em;
                color: var(--ink);
            }

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
                .hero { padding: 3rem 0 2.5rem; }
                .hero-foot,
                .index { grid-template-columns: 1fr; }
                article,
                article:nth-child(2),
                article:last-child {
                    padding: 1.75rem 0;
                    border-right: 0;
                    border-bottom: 1px solid var(--line);
                }
                article:last-child { border-bottom: 0; }
            }
        </style>
    </head>
    <body>
        <div class="wrap">
            <header>
                <a class="mark" href="{{ route('home') }}">Laravel Enterprise API</a>
                <nav>
                    <a href="{{ route('docs.swagger') }}">Open Swagger</a>
                    <a href="{{ url('/api/v1/health') }}">Health</a>
                </nav>
            </header>

            <main>
                <section class="hero">
                    <p class="kicker">Portfolio / REST</p>
                    <h1>API for operations.</h1>
                    <div class="hero-foot">
                        <p class="lead">
                            A versioned Laravel service for customers, products, and orders.
                            Built to show professional PHP architecture without excess.
                        </p>
                        <a class="cta" href="{{ route('docs.swagger') }}">Open Swagger</a>
                    </div>
                </section>

                <section class="index">
                    <article>
                        <span class="num">01</span>
                        <h2>Intent</h2>
                        <p>A public foundation with clear HTTP, application, and domain boundaries. Auth, resources, and CI come next.</p>
                    </article>
                    <article>
                        <span class="num">02</span>
                        <h2>Stack</h2>
                        <ul>
                            <li>PHP 8.4 · Laravel 13</li>
                            <li>MySQL 8 · Redis 7</li>
                            <li>Sanctum · Docker · Pest</li>
                        </ul>
                    </article>
                    <article>
                        <span class="num">03</span>
                        <h2>Surface</h2>
                        <p>Versioned under <code>/api/v1</code>. First route: <code>GET /health</code>.</p>
                    </article>
                </section>
            </main>

            <footer>
                <span>2026</span>
                <span>v1</span>
            </footer>
        </div>
    </body>
</html>
