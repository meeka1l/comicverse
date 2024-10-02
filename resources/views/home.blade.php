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
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.7); /* Black w/ opacity */
    justify-content: center; /* Center modal */
    align-items: center; /* Center modal */
    
}

.modal-content {
    background-color: white;
    border-radius: 15px; /* Rounded edges */
    padding: 20px;
    width: 400px; /* Adjust width as necessary */
    max-width: 90%; /* Responsive max width */
    margin-left: 33%;
    margin-top: 2%;
    overflow-y: auto; /* Allow vertical scrolling if content is too large */
}
.modal-body {
    display: flex; /* Enable flexbox */
    align-items: flex-start; /* Align items at the start (top) */
    text-align: left; /* Align text to the left */
}

.modal-body img {
    width: 200px; /* Set a fixed width for the image */
    height: auto; /* Maintain aspect ratio */
    margin-right: 20px; /* Space between image and text */
}

.text-container {
    display: flex; /* Create a flex container */
    flex-direction: column; /* Stack items vertically */
}

.text-container h4,
.text-container p,
.text-container input {
    margin: 10px 0; /* Add some vertical spacing */
}


.book-image {
    width: 300px; /* Set a smaller width for the image */
    height: auto; /* Maintain aspect ratio */
    border-radius: 8px; /* Rounded edges for the image */
    margin-bottom: 16px; /* Space below the image */
}

/* Other modal styles */
.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.close {
    cursor: pointer;
    font-size: 24px; /* Size of the close button */
}
.book-description {
    max-height: 100px; /* Set a fixed height for the description box */
    overflow-y: auto; /* Enable vertical scrolling */
    margin-top: 10px; /* Space above the description */
}
.overlay {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 999; /* Sit below the modal */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    background-color: rgba(0, 0, 0, 0.7); /* Black w/ opacity */
}

/* Show overlay when modal is open */
.modal.show + .overlay {
    display: block; /* Show overlay when modal is active */
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
                    <a href="{{route('browse')}}">Browse</a>
                </div>
            </div>
<!-- Book Details Modal -->
<div id="bookModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 id="bookModalLabel">Book Details</h5>
            <button type="button" class="close" onclick="closeModal()">&times;</button>
        </div>
        <form id="addToCartForm" action="/add-to-cart" method="POST">
        @csrf
            <div class="modal-body">
                <img id="modalBookImage" src="" alt="Book Cover" class="img-fluid book-image">
                <div class="text-container">
                    <h4 id="modalBookTitle" class="book-title"></h4>
                    <p id="modalBookPrice" class="book-price"></p>
                    <p id="modalBookAuthor" class="book-author"></p>
                    <p id="modalBookDescription" class="book-description"></p>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <input type="hidden" id="bookId" name="book_id" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" onclick="closeModal()">Close</button>
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </div>
        </form>
    </div>
</div>


<!-- Overlay -->
<div id="overlay" class="overlay" onclick="closeModal()"></div>

   <!-- Trending Section -->
   <section>
    <h3 class="section-title">Trending</h3>
    <div class="grid">
        @foreach ($trendingBooks as $book)
            <div class="card" onclick="openModal({
             id: '{{ $book->id }}',
                image: '{{ asset('storage/' . $book->image) }}',
                title: '{{ $book->title }}',
                price: {{ $book->price }},
                author: '{{ $book->author }}',
                description: '{{ e($book->description)}}'
            })">
                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                <h4>{{ $book->title }}</h4>
                <p>${{ number_format($book->price, 2) }}</p>
                <p>{{ $book->author }}</p>
            </div>
        @endforeach
    </div>
</section>

            <!-- Classics Section -->
            <section>
    <h3 class="section-title">Classics</h3>
    <div class="grid">
        @foreach ($classicBooks as $book)
        <div class="card" onclick="openModal({
                image: '{{ asset('storage/' . $book->image) }}',
                title: '{{ $book->title }}',
                price: {{ $book->price }},
                author: '{{ $book->author }}',
                description: '{{e($book->description) }}'
            })">
                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                <h4>{{ $book->title }}</h4>
                <p>${{ number_format($book->price, 2) }}</p>
                <p>{{ $book->author }}</p>
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
            
        // Function to open the modal
function openModal(book) {
    document.getElementById('modalBookImage').src = book.image;
    document.getElementById('modalBookTitle').innerText = book.title;
    document.getElementById('modalBookPrice').innerText = `$${book.price.toFixed(2)}`;
    document.getElementById('modalBookAuthor').innerText = book.author;
    document.getElementById('modalBookDescription').innerText = book.description;

    // Set the book ID in the hidden input
    document.getElementById('bookId').value = book.id;
    

    document.getElementById('overlay').style.display = 'block';
    document.getElementById('bookModal').style.display = 'block';
}



// Function to close the modal
function closeModal() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('bookModal').style.display = 'none';
}


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
