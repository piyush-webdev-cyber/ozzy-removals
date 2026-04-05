<?php
// Prevent browsers/proxies from caching the old thankyou page.
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Google Tag Manager -->
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-N8RQF6XN');
        </script>
        <!-- End Google Tag Manager -->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Indexing Control: Prevent indexing but allow following of internal links -->
        <meta name="robots" content="noindex, follow">

        <title>Thank You! | Ozzy Removals</title>
        <meta name="description" content="Your moving quote request has been received. We'll be in touch shortly.">
        <meta property="og:title" content="Thank You! | Ozzy Removals">
        <meta property="og:description" content="Your moving quote request has been received. We'll be in touch shortly.">
        <meta property="og:image" content="https://images.unsplash.com/photo-1606744837616-59c9e5696800?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:url" content="https://ozzyremovals.au/thankyou.php">
        <link rel="canonical" href="https://ozzyremovals.au/thankyou.php">

        <link rel="icon" type="image/webp" href="/IMAGE/favicon1.webp?v=1.1">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=1.1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">

        <style>
        /* Premium + homepage-matching thank you (dark slate backdrop, elevated light card) */
        body {
            background: var(--bg-page);
            color: var(--text-on-dark);
        }

        .ty-shell {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .ty-main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: clamp(2.75rem, 6vw, 4.75rem) 0;
            position: relative;
            overflow: hidden;
        }

        /* Homepage-like backdrop: gradient + glow + grain */
        .ty-main::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 15% 10%, rgba(34, 211, 238, 0.18), transparent 55%),
                radial-gradient(circle at 90% 25%, rgba(245, 158, 11, 0.16), transparent 55%),
                radial-gradient(circle at 35% 85%, rgba(56, 189, 248, 0.10), transparent 60%),
                linear-gradient(135deg, #020617 0%, #0b1223 38%, #0f172a 62%, #020617 100%);
            pointer-events: none;
            opacity: 1;
        }

        .ty-main::after {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(ellipse 110% 70% at 70% 35%, transparent 40%, rgba(2, 6, 23, 0.55) 100%),
                url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.5'/%3E%3C/svg%3E");
            opacity: 0.06;
            mix-blend-mode: overlay;
        }

        .ty-panel {
            width: min(960px, calc(100% - 2.5rem));
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .ty-check {
            width: 92px;
            height: 92px;
            margin: 0 auto 1.25rem;
            border-radius: 999px;
            border: 2px solid rgba(16, 185, 129, 0.7);
            display: grid;
            place-items: center;
            color: rgba(16, 185, 129, 0.95);
            background:
                radial-gradient(circle at 30% 30%, rgba(16, 185, 129, 0.22), rgba(16, 185, 129, 0.06) 60%),
                rgba(15, 23, 42, 0.35);
            box-shadow:
                0 18px 50px rgba(2, 6, 23, 0.55),
                inset 0 0 0 1px rgba(241, 245, 249, 0.08);
            animation: tyPop 0.7s cubic-bezier(0.22, 1.4, 0.36, 1) both, tyFloat 6s ease-in-out 0.9s infinite;
        }

        .ty-check svg {
            width: 40px;
            height: 40px;
        }

        @keyframes tyPop {
            0% { transform: scale(0.65); opacity: 0; }
            55% { transform: scale(1.08); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes tyFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        .ty-title {
            margin: 0 0 0.5rem;
            font-family: var(--font-display);
            font-weight: 800;
            letter-spacing: -0.03em;
            color: var(--text-on-dark);
            font-size: clamp(1.8rem, 3.4vw, 2.6rem);
            opacity: 0;
            transform: translateY(10px);
            animation: tyFadeUp 0.6s ease 0.08s both;
        }

        .ty-subtitle {
            margin: 0 auto 1.4rem;
            max-width: 44rem;
            color: #cbd5e1;
            font-size: 1.05rem;
            line-height: 1.55;
            opacity: 0;
            transform: translateY(10px);
            animation: tyFadeUp 0.6s ease 0.16s both;
        }

        @keyframes tyFadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .ty-logos {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.25rem;
            flex-wrap: wrap;
            margin: 1.1rem 0 2rem;
            opacity: 0;
            transform: translateY(10px);
            animation: tyFadeUp 0.6s ease 0.24s both;
        }

        .ty-logo {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 0.75rem;
            border-radius: 999px;
            border: 1px solid rgba(241, 245, 249, 0.12);
            background: rgba(30, 41, 59, 0.55);
            backdrop-filter: blur(10px);
            box-shadow: 0 14px 34px rgba(2, 6, 23, 0.35);
            color: var(--text-on-dark);
            font-weight: 700;
            font-size: 0.9rem;
        }

        .ty-logo small {
            font-weight: 700;
            color: #94a3b8;
        }

        .ty-content {
            display: grid;
            gap: 1.25rem;
            margin: 0 auto;
            max-width: 760px;
            text-align: left;
            opacity: 0;
            transform: translateY(10px);
            animation: tyFadeUp 0.7s ease 0.32s both;
        }

        .ty-card {
            background: rgba(241, 245, 249, 0.96);
            border-radius: 22px;
            padding: 1.25rem 1.25rem 1.35rem;
            box-shadow:
                0 28px 70px rgba(2, 6, 23, 0.45),
                0 0 0 1px rgba(34, 211, 238, 0.10);
            border: 1px solid rgba(15, 23, 42, 0.08);
            position: relative;
            overflow: hidden;
        }

        .ty-card::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: radial-gradient(circle at 30% 0%, rgba(34, 211, 238, 0.18), transparent 55%);
            opacity: 0.9;
        }

        @media (min-width: 768px) {
            .ty-card {
                padding: 1.6rem 1.75rem 1.75rem;
            }
        }

        .ty-card h2 {
            margin: 0 0 0.75rem;
            font-family: var(--font-display);
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #0f172a;
            font-size: 1.15rem;
        }

        .ty-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 0.75rem;
        }

        .ty-list li {
            display: grid;
            grid-template-columns: 22px 1fr;
            gap: 0.65rem;
            color: #475569;
            line-height: 1.5;
            font-size: 0.98rem;
        }

        .ty-list strong {
            color: #0f172a;
        }

        .ty-dot {
            width: 18px;
            height: 18px;
            border-radius: 999px;
            display: grid;
            place-items: center;
            margin-top: 0.1rem;
            background: rgba(34, 211, 238, 0.18);
            color: #0e7490;
        }

        .ty-actions {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        @media (min-width: 520px) {
            .ty-actions {
                flex-direction: row;
                justify-content: center;
            }
        }

        .ty-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.9rem 1.4rem;
            border-radius: var(--radius-btn);
            background: var(--color-accent);
            border: 1px solid var(--color-accent-border);
            color: #0f172a;
            font-weight: 700;
            box-shadow: var(--shadow-accent);
            transition: transform 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        }

        .ty-btn-primary:hover {
            background: var(--color-accent-hover);
            transform: translateY(-1px);
            box-shadow: 0 22px 55px rgba(2, 6, 23, 0.25);
        }

        .ty-btn-ghost {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.9rem 1.4rem;
            border-radius: var(--radius-btn);
            background: rgba(241, 245, 249, 0.92);
            border: 1px solid rgba(15, 23, 42, 0.14);
            color: #0f172a;
            font-weight: 700;
            transition: background 0.2s ease, border-color 0.2s ease;
        }

        .ty-btn-ghost:hover {
            background: #f1f5f9;
            border-color: rgba(15, 23, 42, 0.18);
        }

        .ty-footer {
            padding: 1.75rem 0 2.25rem;
            color: #94a3b8;
            text-align: center;
            font-size: 0.9rem;
        }
        </style>
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8RQF6XN" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <a href="#main-content" class="skip-link">Skip to main content</a>

        <div class="page-wrap ty-shell">
            <header id="main-header" class="site-header">
                <nav class="container site-header__inner" role="navigation" aria-label="Main Navigation">
                    <a href="index.html" class="site-header__logo">
                        <img src="https://ozzyremovals.au/iMAGES/logo-main.png" alt="Ozzy Removals Logo" class="logo-invert" width="160" height="48">
                    </a>
                    <div class="nav-desktop">
                        <a href="index.html">Home</a>
                        <a href="index.html#services">Services</a>
                        <a href="index.html#pricing">Pricing</a>
                        <a href="contact.html">Contact</a>
                        <a href="tel:0410000256" class="nav-desktop__phone">0410 000 256</a>
                    </div>
                </nav>
            </header>

            <main id="main-content" class="ty-main">
                <div class="ty-panel">
                    <div class="ty-check" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                            <path d="M20 7L10 17l-5-5" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <h1 class="ty-title">Your quote request has been received.</h1>
                    <p class="ty-subtitle">We’re already reviewing your move details. One of our Perth-based coordinators will reach out shortly. If your move is urgent or same-day, you can call us now and we’ll prioritise your booking.</p>

                    <div class="ty-logos" aria-label="Trust signals">
                        <span class="ty-logo">
                            <span style="font-weight:900;">Google</span>
                            <small>Reviews</small>
                        </span>
                        <span class="ty-logo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="#f59e0b" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <span>Top rated</span>
                        </span>
                        <span class="ty-logo">
                            <span style="font-weight:900;">BBB</span>
                            <small>Accredited</small>
                        </span>
                    </div>

                    <div class="ty-content">
                        <section class="ty-card" aria-label="What happens next">
                            <h2>Here’s what happens from here</h2>
                            <ul class="ty-list">
                                <li>
                                    <span class="ty-dot">1</span>
                                    <span><strong>Confirmation:</strong> We’ll confirm your date, time window and truck size based on the details you provided.</span>
                                </li>
                                <li>
                                    <span class="ty-dot">2</span>
                                    <span><strong>Call-back (when requested):</strong> A coordinator may call you to clarify access, stairs or special items.</span>
                                </li>
                                <li>
                                    <span class="ty-dot">3</span>
                                    <span><strong>Locked-in booking:</strong> Once confirmed, we reserve your crew and truck and send final details via SMS or email.</span>
                                </li>
                            </ul>
                            <div class="ty-actions">
                                <a href="tel:0410000256" class="ty-btn-primary">Call us now</a>
                                <a href="index.html" class="ty-btn-ghost">Back to homepage</a>
                            </div>
                        </section>
                    </div>

                    <footer class="ty-footer">
                        <p>© <span id="year"></span> Ozzy Removals Perth. All rights reserved.</p>
                        <p>Perth’s leading moving company – affordable, reliable &amp; hassle‑free removals.</p>
                    </footer>
                </div>
            </main>
        </div>

        <script>
            document.getElementById('year').textContent = new Date().getFullYear();
        </script>
    </body>
    </html>