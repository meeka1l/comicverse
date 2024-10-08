<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publish Your Work</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-container h1 {
            margin: 0;
        }

        nav a {
            
            display: inline-block;
            padding: 10px 20px;
            border: #ff6f61;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 16px;
            position: relative;
            overflow: hidden;
        
        }

        nav a:hover {
            text-decoration: underline;
        }

        .publish-button {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(45deg, #ff6f61, #ff8c00); /* Gradient background */
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
            background: linear-gradient(45deg, #ff8c00, #ff6f61); /* Inverse gradient on hover */
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
            transform: scale(1.1); /* Slight scale effect */
        }

        main {
            max-width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="file"], textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background: linear-gradient(45deg, #ff6f61, #ff8c00); /* Gradient background */
            color: white;
            border: none;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.4s ease-in-out;
        }

        button:hover {
            background: linear-gradient(45deg, #ff8c00, #ff6f61); /* Inverse gradient on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
            transform: scale(1.05); /* Slight scale effect */
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
.form-container {
    max-width: 600px; /* Set a max width for the form */
    margin: 20px auto; /* Center the form horizontally */
    padding: 20px; /* Add some padding around the form */
    background-color: #f9f9f9; /* Light background for the form */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.form-group {
    margin-bottom: 15px; /* Space between form fields */
}

.form-group label {
    display: block; /* Make labels block elements */
    margin-bottom: 5px; /* Space between label and input */
    font-weight: bold; /* Bold labels */
}

.form-group input,
.form-group textarea {
    width: 100%; /* Full width inputs */
    padding: 10px; /* Padding inside inputs */
    border: 1px solid #ccc; /* Border around inputs */
    border-radius: 4px; /* Rounded corners for inputs */
    font-size: 16px; /* Font size for inputs */
}

.form-group button {
    background-color: #007bff; /* Primary button color */
    color: white; /* Button text color */
    padding: 10px 15px; /* Padding around button text */
    border: none; /* No border */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 16px; /* Font size for button */
}

.form-group button:hover {
    background-color: #0056b3; /* Darker button color on hover */
}

.alert {
    margin-bottom: 15px; /* Space below alert */
    color: #ff0000; /* Red text for error messages */
    background-color: #f8d7da; /* Light red background for alert */
    padding: 10px; /* Padding inside alert */
    border: 1px solid #f5c6cb; /* Border for alert */
    border-radius: 4px; /* Rounded corners for alert */
}
.tabs {
    display: flex;
    cursor: pointer;
    margin-bottom: 20px;
}

.tab-button {
    flex: 1;
    padding: 10px;
    background: #eee;
    border: 1px solid #ccc;
    border-radius: 5px 5px 0 0;
    text-align: center;
    color: black;
}

.tab-button.active {
    background: #fff;
    border-bottom: none; /* Hide bottom border for active tab */
}

.tab-content {
    border: 1px solid #ccc;
    border-radius: 0 0 5px 5px;
    padding: 20px;
}

.tab-content.active {
    display: block;
}

.tab-content:not(.active) {
    display: none;
}
.grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px,200px));
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


    </style>
</head>
<body>
<div id="loading-screen" class="loading-screen">
        <div class="loader"></div>
        <div class="loading-text">ComicVERSE</div>
    </div>
    <header>
        <div class="header-container">
            <h1>ComicVERSE</h1>
            <nav>
                <a href="{{ url('/publish') }}" class="publish-button">Publish</a>
                <a href="{{ url('/') }}">Home</a>
                <a href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>
        </div>
    </header>

    <main>
         <!-- Tab Navigation -->
    <div class="tabs">
        <button class="tab-button active" onclick="openTab(event, 'publish')">Publish</button>
        <button class="tab-button" onclick="openTab(event, 'other-works')">Other Works</button>
    </div>
    <div id="publish" class="tab-content active">
        <header>
            <h1>Publish Your Work</h1>
            <p>Submit your latest comic or manga to share with the world!</p>
        </header>
        <div class="form-container">
    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" name="title" type="text" required />
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="form-group">
        <label for="genre">Genre:</label>
    <select name="genre" id="genre">
        <option value="">Select a genre</option>
        <option value="Action">Action</option>
        <option value="Adventure">Adventure</option>
        <option value="Romance">Romance</option>
        <option value="Fantasy">Fantasy</option>
        <option value="Science Fiction">Science Fiction</option>
        <option value="Horror">Horror</option>
        <option value="Mystery">Mystery</option>
        <option value="Thriller">Thriller</option>
        <option value="Slice of Life">Slice of Life</option>
        <option value="Comedy">Comedy</option>
        <option value="Historical">Historical</option>
        <option value="Sports">Sports</option>
        <option value="Isekai">Isekai</option>
        <option value="Seinen">Seinen</option>
        <option value="Josei">Josei</option>
        <option value="Superhero">Superhero</option>
        <option value="Anthology">Anthology</option>
    </select>

        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input id="price" name="price" type="number" step="0.01" max="99999" required />
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input id="stock" name="stock" type="number" max="99999999999" required />
        </div>

        <div class="form-group">
            <label for="image">Cover Image (PNG/JPEG/JPG/GIF)</label>
            <input id="image" name="image" type="file" required onchange="previewImage(event)" />
        </div>

         <!-- Image Preview -->
    <div class="form-group">
        <label>Image Preview</label>
        <img id="imagePreview" src="" alt="Image Preview" style="max-width: 300px; display: none;" />
    </div>

        <div class="form-group">
            <button type="submit">Publish</button>
        </div>
    </form>
</div>
</div>
<div id="other-works" class="tab-content">
    <h2>Your Works</h2>

    @if($userBooks->isEmpty())
        <p>You have not published any books yet.</p>
    @else
        <div class="grid">
            @foreach($userBooks as $book)
                <div class="card">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                    <h4>{{ $book->title }}</h4>
                    <p>${{ number_format($book->price, 2) }}</p>
                    <p>{{ $book->author }}</p>
                    
                    <!-- Delete Form -->
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>

           </main>
    <script>
        function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
        function openTab(evt, tabName) {
    // Hide all tab content
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => content.classList.remove('active'));

    // Remove 'active' class from all tab buttons
    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(button => button.classList.remove('active'));

    // Show the current tab and set the button to active
    document.getElementById(tabName).classList.add('active');
    evt.currentTarget.classList.add('active');
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
