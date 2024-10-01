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
                font-size: 3em;
                font-weight: bolder;
                color: #ffd1b4;
            }
            .main-section {
                padding: 32px;
            }
            .header-search {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .search-form {
            display: flex;
            align-items: center;
        }
        .search-form input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 8px;
        }
        .search-form button {
            padding: 8px 16px;
            background-color: #ffd1b4;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }
        </style>
</head>
<body>
<main class="main-section">
    <div class="header-search">
            <h1>Browse Page</h1>
            
            <!-- Search Form -->
            <form class="search-form" method="GET" action="{{ route('browse') }}">
                <input type="text" name="search" placeholder="Search by title or author..." value="{{ request()->query('search') }}">
                <button type="submit">Search</button>
            </form>
        </div>
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
</body>
</html>