<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ComicVerse</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="font-sans antialiased bg-gray-50 text-black/50">
        <div class="min-h-screen flex flex-col items-center">
            <!-- Navigation -->
            <header class="w-full py-4 bg-yellow-600 text-white shadow-md">
                <div class="container mx-auto flex justify-between items-center">
                    <h1 class="text-3xl font-bold">ComicVerse</h1>
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </header>

            <!-- Main Content -->
            <div class="container mx-auto p-8">
                <!-- Browse section -->
                <div class="relative bg-cover bg-center h-96 w-full mb-12" style="background-image: url('../../build/images/batman.webp');">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white">
                        <h2 class="text-6xl font-bold">ComicVerse</h2>
                        <p class="text-2xl mt-2">The ultimate hub for comic and manga!</p>
                        <a href="#" class="mt-6 px-8 py-3 bg-orange-500 text-white font-bold rounded-md transition-colors duration-300 ease-in-out hover:bg-black hover:text-orange-500 hover:bg-opacity-100">Browse</a>
                    </div>
                </div>
                

                <!-- Trending Section -->
                <section class="mb-8">
                    <h3 class="text-2xl font-bold mb-4">Trending</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                        <!-- Add your comic items here -->
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/kagurabachi1.webp" alt="Kagurabachi.vol1" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">Kagurabachi.Vol1</h4>
                            <p class="text-gray-500">$10.99</p>
                        </div>
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/spawn1.webp" alt="SpawnIssue1" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">SpawnIssue1</h4>
                            <p class="text-gray-500">$10.99</p>
                        </div>
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/bluelock1.jpg" alt="Blue Lock.Vol1" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">Blue Lock.Vol1</h4>
                            <p class="text-gray-500">$10.99</p>
                        </div>
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/ronin.webp" alt="The Last Ronin.Issue1" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">The Last Ronin.Issue1</h4>
                            <p class="text-gray-500">$10.99</p>
                        </div>
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/onepiece.jpg" alt="One Piece.vol108" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">One Piece.Vol108</h4>
                            <p class="text-gray-500">$10.99</p>
                        </div>
                       
                    </div>
                </section>

                <!-- Bestsellers Section -->
                <section class="mb-8">
                    <h3 class="text-2xl font-bold mb-4">Bestsellers</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                        <!-- Add your comic items here -->
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/kagurabachi1.webp" alt="Kagurabachi.vol1" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">Kagurabachi.Vol1</h4>
                            <p class="text-gray-500">$10.99</p>
                        </div>
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/spawn1.webp" alt="SpawnIssue1" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">SpawnIssue1</h4>
                            <p class="text-gray-500">$10.99</p>
                        </div>
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/bluelock1.jpg" alt="Blue Lock.Vol1" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">Blue Lock.Vol1</h4>
                            <p class="text-gray-500">$10.99</p>
                        </div>
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/ronin.webp" alt="The Last Ronin.Issue1" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">The Last Ronin.Issue1</h4>
                            <p class="text-gray-500">$10.99</p>
                        </div>
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/onepiece.jpg" alt="One Piece.vol108" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">One Piece.Vol108</h4>
                            <p class="text-gray-500">$10.99</p>
                        
                       
                    </div>
                </section>

                <!-- Classics Section -->
                <section class="mb-8">
                    <h3 class="text-2xl font-bold mb-4">Classics</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                        <!-- Add your comic items here -->
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/naruto.jpg" alt="Naruto" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">Check Out Naruto!</h4>
                        </div>
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/spiderman.jpg" alt="SUPAIDAMAN" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">Check Out SpiderMan!</h4>
                        </div>
                        <div class="bg-white shadow-md rounded-md p-4">
                            <img src="../../build/images/dragonball.webp" alt="Dragonball" class="w-full h-64 object-cover mb-4 rounded-md">
                            <h4 class="text-lg font-bold">Check Out DragonBall!</h4>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Footer -->
            <footer class="w-full bg-gray-800 text-white py-8 mt-8">
                <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="col-span-1 md:col-span-2 lg:col-span-4 text-center mb-4">
                        <h5 class="text-lg font-bold">ComicVerse</h5>
                        <p class="text-gray-400">The ultimate hub for comic and manga!</p>
                    </div>
                    <div>
                        <h6 class="font-bold mb-2">Customer Service</h6>
                        <ul class="text-gray-400">
                            <li><a href="#" class="hover:text-white">Shipping Info</a></li>
                            <li><a href="#" class="hover:text-white">Terms & Conditions</a></li>
                            <li><a href="#" class="hover:text-white">FAQ</a></li>
                        </ul>
                    </div>
                    <div>
                        <h6 class="font-bold mb-2">My Account</h6>
                        <ul class="text-gray-400">
                            <li><a href="#" class="hover:text-white">Order Status</a></li>
                            <li><a href="#" class="hover:text-white">Account Settings</a></li>
                            <li><a href="#" class="hover:text-white">Subscription Settings</a></li>
                        </ul>
                    </div>
                    <div>
                        <h6 class="font-bold mb-2">Community</h6>
                        <ul class="text-gray-400">
                            <li><a href="#" class="hover:text-white">Instagram</a></li>
                            <li><a href="#" class="hover:text-white">Facebook</a></li>
                            <li><a href="#" class="hover:text-white">Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
