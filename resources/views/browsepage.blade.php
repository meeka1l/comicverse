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
            .publishers{
                padding:32px;
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
.orange{
    color: orange;
    font-family: 'Anton';
}
.genre-section {
    margin: 20px 0;
}

.genre-links {
    display: flex;
    flex-wrap: wrap;
}

.genre-links a {
    margin-right: 10px;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
}

.genre-links a:hover {
    background-color: #f0f0f0;
}
.active-genre {
    font-weight: bold; 
    font-family: 'Anton';
}
.publisherheader{
    font-family: 'Anton';
    font-size: 3em;
    color: white;
}
.DCsection {
    position: relative; /* Allows for positioning of the overlay */
    background-image: url('../../build/images/dcgif.gif');
    padding: 2%;
    background-repeat: no-repeat; /* Prevents tiling */
    background-size: cover; /* Ensures the image covers the entire section */
    background-position: center; /* Centers the background image */
    margin-bottom: 2%;
}

.DCsection::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Translucent black overlay */
    z-index: 1; /* Places the overlay above the background image */
}

.DCsection > * {
    position: relative; /* Ensures content appears above the overlay */
    z-index: 2; /* Keeps text and elements above the overlay */
}

.WSJsection {
    position: relative; /* Allows for positioning of the overlay */
    background-image: url('../../build/images/narutogif.gif');
    padding: 2%;
    background-repeat: no-repeat; /* Prevents tiling */
    background-size: cover; /* Ensures the image covers the entire section */
    background-position: center; /* Centers the background image */
}

.WSJsection::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Translucent black overlay */
    z-index: 1; /* Places the overlay above the background image */
}

.WSJsection > * {
    position: relative; /* Ensures content appears above the overlay */
    z-index: 2; /* Keeps text and elements above the overlay */
}

        </style>
</head>
<body>
    <div class="browsebanner">

    <div class="header-container">
    <h2 class="upperheader">ComicVERSE</h2>
    <div class="uppernavigation">
        <a href="{{route('cart.index')}}">
            <h2 class="orange">MyCart</h2>
        </a>
        <h2>|</h2>
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
        <main>
        <section class="publishers">
<h3 class="section-title">
        Popular Publishers
    </h3>
 <!-- Popular publishers section -->
 <section class="DCsection">
    
    <h3 class="publisherheader">DC Comics</h3>
    <div class="grid">
        @foreach ($allBooks->filter(function($book) {
            return str_contains(strtolower($book->author), 'dc');
        }) as $book)
        <div class="card" onclick="openModal({
                 id: '{{ $book->id }}',
                    image: '{{ asset('storage/' . $book->image) }}',
                    title: '{{ e($book->title) }}',
                    price: {{ $book->price }},
                    author: '{{ $book->author }}',
                    description: '{{ e($book->description) }}',
                    genre: '{{ $book->genre }}'
                })">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                    <h4>{{ $book->title }}</h4>
                    <p>${{ number_format($book->price, 2) }}</p>
                    <p>{{ $book->author }}</p>
                </div>
        @endforeach
    </div>
</section>

<section class="WSJsection">
    
    <h3 class="publisherheader">Shonen Jump</h3>
    <div class="grid">
        @foreach ($allBooks->filter(function($book) {
            return str_contains(strtolower($book->author), 'shonen');
        }) as $book)
        <div class="card" onclick="openModal({
                 id: '{{ $book->id }}',
                    image: '{{ asset('storage/' . $book->image) }}',
                    title: '{{ e($book->title) }}',
                    price: {{ $book->price }},
                    author: '{{ $book->author }}',
                    description: '{{ e($book->description) }}',
                    genre: '{{ $book->genre }}'
                })">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                    <h4>{{ $book->title }}</h4>
                    <p>${{ number_format($book->price, 2) }}</p>
                    <p>{{ $book->author }}</p>
                </div>
        @endforeach
    </div>
</section>

</section>
            <section class="main-section">
            <!-- Browse by Genre Section -->
<section class="genre-section">
    <h3 class="section-title">Browse by Genre</h3>
    <div class="genre-links">
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => null]) }}"
       class="{{ request()->query('genre') === null ? 'active-genre' : '' }}">All</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Action']) }}"
       class="{{ request()->query('genre') === 'Action' ? 'active-genre' : '' }}">Action</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Adventure']) }}"
       class="{{ request()->query('genre') === 'Adventure' ? 'active-genre' : '' }}">Adventure</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Romance']) }}"
       class="{{ request()->query('genre') === 'Romance' ? 'active-genre' : '' }}">Romance</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Fantasy']) }}"
       class="{{ request()->query('genre') === 'Fantasy' ? 'active-genre' : '' }}">Fantasy</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Science Fiction']) }}"
       class="{{ request()->query('genre') === 'Science Fiction' ? 'active-genre' : '' }}">Science Fiction</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Horror']) }}"
       class="{{ request()->query('genre') === 'Horror' ? 'active-genre' : '' }}">Horror</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Mystery']) }}"
       class="{{ request()->query('genre') === 'Mystery' ? 'active-genre' : '' }}">Mystery</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Thriller']) }}"
       class="{{ request()->query('genre') === 'Thriller' ? 'active-genre' : '' }}">Thriller</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Slice of Life']) }}"
       class="{{ request()->query('genre') === 'Slice of Life' ? 'active-genre' : '' }}">Slice of Life</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Comedy']) }}"
       class="{{ request()->query('genre') === 'Comedy' ? 'active-genre' : '' }}">Comedy</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Historical']) }}"
       class="{{ request()->query('genre') === 'Historical' ? 'active-genre' : '' }}">Historical</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Sports']) }}"
       class="{{ request()->query('genre') === 'Sports' ? 'active-genre' : '' }}">Sports</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Isekai']) }}"
       class="{{ request()->query('genre') === 'Isekai' ? 'active-genre' : '' }}">Isekai</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Seinen']) }}"
       class="{{ request()->query('genre') === 'Seinen' ? 'active-genre' : '' }}">Seinen</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Josei']) }}"
       class="{{ request()->query('genre') === 'Josei' ? 'active-genre' : '' }}">Josei</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Superhero']) }}"
       class="{{ request()->query('genre') === 'Superhero' ? 'active-genre' : '' }}">Superhero</a>
    <a href="{{ route('browse', ['search' => request()->query('search'), 'genre' => 'Anthology']) }}"
       class="{{ request()->query('genre') === 'Anthology' ? 'active-genre' : '' }}">Anthology</a>
</div>

</section>


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
                    <strong>Author:</strong>
                    <p id="modalBookAuthor" class="book-author"></p>
                    <p id="modalBookDescription" class="book-description"></p>
                    <p id="modalBookGenre" class="book-genre"></p>
                    <label for="quantity"><strong>Quantity:</strong></label>
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


     <!-- All Books Section -->
<section>
<h3 class="section-title">
    {{ request()->query('search') ? 'Search by: ' . request()->query('search') : 'All Books' }}
</h3>
    <div class="grid">
    @foreach ($allBooks as $book)
    <div class="card" onclick="openModal({
             id: '{{ $book->id }}',
                image: '{{ asset('storage/' . $book->image) }}',
                title: '{{ e($book->title) }}',
                price: {{ $book->price }},
                author: '{{ $book->author }}',
                description: '{{ e($book->description)}}',
                genre: '{{ $book->genre }}'
            })">
                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                <h4>{{ $book->title }}</h4>
                <p>${{ number_format($book->price, 2) }}</p>
                <p>{{ $book->author }}</p>
            </div>
@endforeach

    </div>
</section>
</section>

</main>
<script>
            
        // Function to open the modal
function openModal(book) {
    document.getElementById('modalBookImage').src = book.image;
    document.getElementById('modalBookTitle').innerText = book.title;
    document.getElementById('modalBookPrice').innerText = `$${book.price.toFixed(2)}`;
    document.getElementById('modalBookAuthor').innerText = book.author;
    document.getElementById('modalBookDescription').innerText = book.description;
    document.getElementById('modalBookGenre').innerText = book.genre;

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

</script>
</body>
</html>