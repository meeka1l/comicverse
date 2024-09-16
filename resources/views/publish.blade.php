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
            max-width: 800px;
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
    </style>
</head>
<body>
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
        <header>
            <h1>Publish Your Work</h1>
            <p>Submit your latest comic or manga to share with the world!</p>
        </header>

        <div>
            <form method="POST" action="{{ route('publish') }}" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" required />
                </div>

                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>

                <div>
                    <label for="image">Cover Image</label>
                    <input id="image" name="image" type="file" />
                </div>

                <div>
                    <button type="submit">Publish</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
