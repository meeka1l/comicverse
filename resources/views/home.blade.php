<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ComicVERSE</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
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
                color: #ffd1b4;
            }
            .container {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
            }
            header {
                width: 100%;
                padding: 16px 0;
                background-color: #ff8d13;
                color: white;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .header-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .header-container a{
                font-family: 'Krona One';
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
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .card:hover {
                transform: scale(1.05); /* Pop out effect */
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Enhance shadow on hover */
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
            .banner-content p{
                font-weight: bolder;
            }
            .banner-content h2{
                font-weight: bolder;
            }
            .publish-button {
                display: inline-block;
                margin-left: 10px;
                padding: 10px 20px;
                background: linear-gradient(45deg, #ff8c00, #ffa500); /* Orange gradient background */
                color: white;
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
                text-transform: uppercase;
                font-size: 16px;
                transition: all 0.4s ease-in-out; /* Smooth transition for all properties */
                position: relative;
                overflow: hidden;
            }

            .publish-button::before {
                content: "";
                position: absolute;
                top: 50%;
                left: 50%;
                width: 300%;
                height: 300%;
                background: rgba(255, 255, 255, 0.2); /* Light overlay */
                transition: all 0.5s ease;
                border-radius: 50%;
                transform: translate(-50%, -50%) scale(0);
            }

            .publish-button:hover::before {
                transform: translate(-50%, -50%) scale(1);
            }

            .publish-button:hover {
                background: linear-gradient(45deg, #ffa500, #ff8c00); /* Inverse gradient on hover */
                color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
                transform: scale(1.1); /* Slight scale effect */
            }

            nav{
                display: flex;
                flex-direction: row;
            }

            /* Base styles for the loading screen */
.loading-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: white;
    z-index: 9999; /* Ensure it's on top of everything */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.5s ease;
    overflow: hidden; /* To hide overflow during animations */
    pointer-events: none; /* Prevents clicks while hidden */
}

.loading-screen.show {
    opacity: 1;
    pointer-events: auto; /* Allows clicks while visible */
}

/* Spinner styles */
.loader {
    border: 8px solid rgba(255, 255, 255, 0.3); /* Light grey */
    border-top: 8px solid #ff6f61; /* Orange color */
    border-radius: 50%;
    width: 60px;
    height: 60px;
    animation: spin 1s linear infinite, pulse 2s ease-in-out infinite; /* Added pulse animation */
}

/* Keyframes for spinning animation */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Keyframes for pulse animation */
@keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.2); opacity: 0.7; }
    100% { transform: scale(1); opacity: 1; }
}

/* Text styles */
.loading-text {
    margin-top: 20px;
    font-size: 24px;
    font-weight: bold;
    color: #ff6f61; /* Orange color */
    animation: fadeInOut 2s ease-in-out infinite; /* Added fade-in and fade-out animation */
}

/* Keyframes for text fade animation */
@keyframes fadeInOut {
    0% { opacity: 0; }
    50% { opacity: 1; }
    100% { opacity: 0; }
}

        </style>
    </head>
    <body>
    <div id="loading-screen" class="loading-screen">
        <div class="loader"></div>
        <div class="loading-text">ComicVERSE</div>
    </div>
</div>

        <header>
            <div class="container header-container">
                <h1>ComicVERSE</h1>
                @if (Route::has('login'))
                <nav>
                    @auth
                    @if (auth()->user()->role=='admin')
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @endif
                        <a href="{{ url('/publish') }}" class="publish-button">
                            Publish
                        </a>
                        <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
        
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
        @foreach ($trendingBooks as $book)
            <div class="card">
                <!-- Display the image by encoding the binary data as base64 -->
                <img src="data:image/jpeg;base64,{{ base64_encode($book->image) }}" alt="{{ $book->title }}">
                <h4>{{ $book->title }}</h4>
                <p>${{ number_format($book->price, 2) }}</p>
            </div>
        @endforeach
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

            <!-- All Books Section -->
<section>
    <h3 class="section-title">All Books</h3>
    <div class="grid">
        @foreach ($allBooks as $book)
            <div class="card">
            <!-- Display the image by encoding the binary data as base64 -->
            <img src="data:image/jpeg;base64,{{ base64_encode($book->image) }}" alt="{{ $book->title }}">   
            <h4>{{ $book->title }}</h4>
                <p>${{ number_format($book->price, 2) }}</p>
            </div>
        @endforeach
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
        <script>
    document.addEventListener("DOMContentLoaded", function() {
        var loadingScreen = document.getElementById('loading-screen');

        // Function to show loading screen
        function showLoadingScreen() {
            loadingScreen.classList.add('show');
            setTimeout(function() {
                loadingScreen.classList.remove('show');
            }, 2000); // 2 seconds delay
        }

        // Show loading screen on page load
        showLoadingScreen();

        // Show loading screen on page transition
        document.querySelectorAll('a').forEach(function(anchor) {
            anchor.addEventListener('click', function(event) {
                if (this.getAttribute('href') !== '#' && !this.getAttribute('href').startsWith('http')) {
                    event.preventDefault(); // Prevent default navigation
                    showLoadingScreen();
                    setTimeout(function() {
                        window.location.href = anchor.getAttribute('href');
                    }, 2000); // Delay navigation for 2 seconds
                }
            });
        });
    });
</script>

    </body>
    
</html>
