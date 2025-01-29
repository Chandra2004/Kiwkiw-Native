<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chandra Tri Antomo - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <style>
        body {
            background-color: #1F2937; /* Dark background */
            color: #FFFFFF; /* White text */
        }
    </style>
</head>
<body>
    <header class="bg-gray-800 py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-3xl font-bold text-white">ChandraMVC</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">Home</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">Features</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">Docs</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">Contact</a></li>
                </ul>
            </nav>
            <div>
                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-300">Sign In</a>
                <a href="#" class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded-lg ml-2 transition duration-300">Sign Up</a>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-16 text-center">
        <h2 class="text-5xl font-bold text-white">Welcome to ChandraMVC</h2>
        <p class="text-lg text-gray-400 mt-4">A powerful yet lightweight MVC framework designed for developers who value simplicity and performance.</p>
        <div class="mt-8 flex justify-center space-x-4">
            <a href="<?= $model['base_url'] ?>/ikan" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg shadow-lg transition duration-300">Get Started</a>
            <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white px-8 py-3 rounded-lg text-lg shadow-lg transition duration-300">Learn More</a>
        </div>
    </main>

    <section class="container mx-auto px-6 py-12 text-center">
        <h3 class="text-2xl font-semibold text-white">Database Connection Status</h3>
        <p class="text-gray-400 mt-2">Database connection established successfully. All tables are ready to use.</p>
    </section>

    <footer class="bg-gray-800 py-6 mt-12 text-center text-gray-400">
        <p>&copy; 2025 Chandra Tri Antomo. All rights reserved.</p>
    </footer>
</body>
</html>