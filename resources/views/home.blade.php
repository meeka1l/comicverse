<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ComicVerse</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f9fafb;
                color: rgba(0, 0, 0, 0.5);
                margin: 0;
            }
            h1 {
                margin-left: 5%;
                font-family: 'Anton', sans-serif;
                font-size: 3em;
                font-weight: bolder;
                color: #ffc09a;
            }
            .container {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
            }
            header {
                width: 100%;
                padding: 16px 0;
                background-color: #F59E0B;
                color: white;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .header-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            nav a {
                margin-left: 16px;
                padding: 8px 16px;
                color: white;
                border: 1px solid transparent;
                text-decoration: none;
                transition: color 0.3s, border-color 0.3s;
            }
            nav a:hover {
                color: rgba(255, 255, 255, 0.7);
                border-color: #FF2D20;
            }
            .main-section {
                padding: 32px;
            }
            .banner {
                position: relative;
                background-size: cover;
                background-position: center;
                height: 400px;
                margin-bottom: 48px;
                color: white;
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .banner::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
            }
            .banner-content {
                z-index: 1;
            }
            .banner h2 {
                font-size: 3.75rem;
                font-weight: bold;
            }
            .banner p {
                font-size: 1.5rem;
                margin-top: 16px;
            }
            .banner a {
                display: inline-block;
                margin-top: 24px;
                padding: 12px 32px;
                background-color: #F97316;
                color: white;
                font-weight: bold;
                border-radius: 8px;
                text-decoration: none;
                transition: background-color 0.3s, color 0.3s;
            }
            .banner a:hover {
                background-color: black;
                color: #F97316;
            }
            .section-title {
                font-size: 2rem;
                font-weight: bold;
                margin-bottom: 16px;
            }
            .grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 24px;
            }
            .card {
                background-color: white;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                padding: 16px;
                text-align: center;
            }
            .card img {
                width: 100%;
                height: 250px;
                object-fit: cover;
                border-radius: 8px;
                margin-bottom: 16px;
            }
            .card h4 {
                font-size: 1.25rem;
                font-weight: bold;
            }
            .card p {
                color: #6b7280;
            }
            footer {
                width: 100%;
                background-color: #1f2937;
                color: white;
                padding: 32px 0;
            }
            footer .footer-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 24px;
                text-align: center;
            }
            footer h5 {
                font-size: 1.25rem;
                font-weight: bold;
                margin-bottom: 8px;
            }
            footer p {
                color: #9ca3af;
            }
            footer ul {
                list-style: none;
                padding: 0;
            }
            footer ul li a {
                color: #9ca3af;
                text-decoration: none;
                transition: color 0.3s;
            }
            footer ul li a:hover {
                color: white;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="container header-container">
                <h1>ComicVERSE</h1>
                @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </nav>
                @endif
            </div>
        </header>

        <main class="main-section">
            <div class="banner" style="background-image: url('../../build/images/batman.webp');">
                <div class="banner-content">
                    <h2>ComicVERSE</h2>
                    <p>The ultimate hub for comic and manga!</p>
                    <a href="#">Browse</a>
                </div>
            </div>

            <!-- Trending Section -->
            <section>
                <h3 class="section-title">Trending</h3>
                <div class="grid">
                    <div class="card">
                        <img src="../../build/images/kagurabachi1.webp" alt="Kagurabachi.vol1">
                        <h4>Kagurabachi.Vol1</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/spawn1.webp" alt="SpawnIssue1">
                        <h4>SpawnIssue1</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/bluelock1.jpg" alt="Blue Lock.Vol1">
                        <h4>Blue Lock.Vol1</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/ronin.webp" alt="The Last Ronin.Issue1">
                        <h4>The Last Ronin.Issue1</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/onepiece.jpg" alt="One Piece.vol108">
                        <h4>One Piece.Vol108</h4>
                        <p>$10.99</p>
                    </div>
                </div>
            </section>

            <!-- Bestsellers Section -->
            <section>
                <h3 class="section-title">Bestsellers</h3>
                <div class="grid">
                    <div class="card">
                        <img src="../../build/images/kagurabachi1.webp" alt="Kagurabachi.vol1">
                        <h4>Kagurabachi.Vol1</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/spawn1.webp" alt="SpawnIssue1">
                        <h4>SpawnIssue1</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/bluelock1.jpg" alt="Blue Lock.Vol1">
                        <h4>Blue Lock.Vol1</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/ronin.webp" alt="The Last Ronin.Issue1">
                        <h4>The Last Ronin.Issue1</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/onepiece.jpg" alt="One Piece.vol108">
                        <h4>One Piece.Vol108</h4>
                        <p>$10.99</p>
                    </div>
                </div>
            </section>

            <!-- Classics Section -->
            <section>
                <h3 class="section-title">Classics</h3>
                <div class="grid">
                    <div class="card">
                        <img src="../../build/images/spiderman_classic.jpg" alt="Spiderman Classic">
                        <h4>Spiderman Classic</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/batman_classic.webp" alt="Batman Classic">
                        <h4>Batman Classic</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/superman_classic.webp" alt="Superman Classic">
                        <h4>Superman Classic</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/hulk_classic.webp" alt="Hulk Classic">
                        <h4>Hulk Classic</h4>
                        <p>$10.99</p>
                    </div>
                    <div class="card">
                        <img src="../../build/images/ironman_classic.jpg" alt="Ironman Classic">
                        <h4>Ironman Classic</h4>
                        <p>$10.99</p>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <div class="container footer-grid">
                <div>
                    <h5>Company</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Order Status</a></li>
                    </ul>
                </div>
                <div>
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Security</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>
</html>
