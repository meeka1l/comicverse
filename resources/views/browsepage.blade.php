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
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f9fafb;
                color: rgba(0, 0, 0, 0.5);
                margin: 0;
            }
            h1 {
                font-family: 'Anton', sans-serif;
                font-size: 5em;
                font-weight: bolder;
                color: white;
            }
            .main-section {
                padding: 32px;
                background: linear-gradient(to bottom, white 60%, black);
            }
            .header-search {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5%;
        }
        .search-form {
            display: flex;
            align-items: center;
            
        }
        .search-form input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-right: 8px;
            width: 700px; /* Increase the width to make the search bar wider */
        }
        .search-form button {
            padding: 8px 16px;
            color: white;
            background-color: #ff8d13;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }
       .browsebanner{
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 70%, rgba(255, 255, 255, 1) 100%),  url('../../build/images/climber_manga.jpeg'); /* Path to your background image */
    background-size: cover; /* Cover the entire div */
    background-position: center; /* Center the background image */  
    margin-top: 0;
       }
       .header-container {
    display: flex; /* Use flexbox for layout */
    justify-content: space-between; /* Space between the header and navigation */
    align-items: center; /* Center items vertically */
}

.upperheader {
    margin-top: 0;
    color: white;
    padding-top: 2%;
    padding-left: 2%;
    font-family: 'Krona One';
}

.uppernavigation {
    margin-top: 0;
    margin-right: 2%; /* Add some right margin for spacing */
    color: white;
    font: 'Krona One';
}

.uppernavigation h2 {
    display: inline; /* Keep the items inline */
    margin-left: 8px; /* Add space between Home and Logout */
    cursor: pointer; /* Change the cursor to pointer for interactivity */
    
}
.uppernavigation a {
    text-decoration: none; /* Remove underline from links */
    color: white; /* Set text color to white */
}
        </style>
</head>
<body>
    <div class="browsebanner">

    <div class="header-container">
    <h2 class="upperheader">ComicVERSE</h2>
    <div class="uppernavigation">
    <a href="{{ route('home') }}">
            <h2>Home</h2>
        </a>
        <h2>|</h2>
        @if (Auth::check())
            <!-- Show Logout if user is logged in -->
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <h2>Logout</h2>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <!-- Show Login if user is not logged in -->
            <a href="{{ route('login') }}">
                <h2>Login</h2>
            </a>
        @endif
    </div>
</div>

    <div class="header-search">
    
            
            <h1>Browse Catalogue</h1>
            
            <!-- Search Form -->
            <form class="search-form" method="GET" action="{{ route('browse') }}">
                <input type="text" name="search" placeholder="Search by title or author..." value="{{ request()->query('search') }}">
                <button type="submit">Search</button>
            </form>
        </div>
        </div>
        <main class="main-section">
     <!-- All Books Section -->
<section>
<h3 class="section-title">
    {{ request()->query('search') ? 'Search by: ' . request()->query('search') : 'All Books' }}
</h3>
    <div class="grid">
    @foreach ($allBooks as $book)
    <div class="card">
        <!-- Use the correct path to the image -->
        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
        <h4>{{ $book->title }}</h4>
        <p>${{ number_format($book->price, 2) }}</p>
        <p>{{ $book->author }}</p>
    </div>
@endforeach

    </div>
</section>
</main>
</body>
</html>