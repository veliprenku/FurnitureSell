<!doctype html>
<html lang="en">
	<!doctype html>
	<html lang="en">
	<head>
	  <!-- Meta Tags -->
	  <meta charset="utf-8">
	  <link rel="shortcut icon" href="images/dreamlogo.png">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Furni - Furniture and Interior Design</title>
	  <script src="https://cdn.tailwindcss.com"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
      <style>
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes bounceIn {
        0% {
            transform: scale(0.9);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }

    .animate-fade-in-down {
        animation: fadeInDown 0.8s ease-out;
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }

    .animate-bounce-in {
        animation: bounceIn 0.6s ease-out;
    }
</style>


	</head>

	<body>
		<div class="gtranslate_wrapper"></div>
		<script>window.gtranslateSettings = {"default_language":"en","detect_browser_language":true,"languages":["en","de","sq"],"wrapper_selector":".gtranslate_wrapper","flag_style":"3d"}</script>
		<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
		
		<?php include('header.php')?>

        <section class="relative bg-gradient-to-r from-blue-50 to-gray-50 py-20 overflow-hidden">
    <!-- Background SVG -->
    <div class="absolute inset-0 pointer-events-none">
        <svg class="w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600">
            <g fill="none" stroke="currentColor" stroke-width="0.5">
                <circle cx="400" cy="300" r="200" />
                <circle cx="400" cy="300" r="280" />
                <circle cx="400" cy="300" r="350" />
            </g>
        </svg>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-gray-800 font-poppins animate-fade-in-down">
                Kitchen Essentials
            </h1>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto animate-fade-in-up">
                Transform your space with our curated collection of premium kitchen furniture and essentials, blending style and functionality.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Product Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-200 to-gray-50 opacity-0 group-hover:opacity-20 transition-opacity"></div>
                <img src="images/product-3.png" alt="Ergonomic Round Table"
                    class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 group-hover:text-primary transition-colors">
                        Ergonomic Round Table
                    </h3>
                    <p class="text-gray-600 mt-2 mb-4">
                        Crafted with solid wood and a carved base, perfect for dining spaces.
                    </p>
                    <p class="text-sm text-gray-500"><strong>Dimensions:</strong> 120cm diameter x 75cm height</p>
                </div>
            </div>

            <!-- Product Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-200 to-gray-50 opacity-0 group-hover:opacity-20 transition-opacity"></div>
                <img src="images/product-1.png" alt="Modern Kitchen Set"
                    class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 group-hover:text-primary transition-colors">
                        Modern Kitchen Set
                    </h3>
                    <p class="text-gray-600 mt-2 mb-4">
                        High-quality laminated wood, designed for contemporary kitchens.
                    </p>
                    <p class="text-sm text-gray-500"><strong>Dimensions:</strong> Customizable based on configuration.</p>
                </div>
            </div>

            <!-- Product Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-200 to-gray-50 opacity-0 group-hover:opacity-20 transition-opacity"></div>
                <img src="images/product-2.png" alt="Kruzo Aero Chair"
                    class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 group-hover:text-primary transition-colors">
                        Kruzo Aero Chair
                    </h3>
                    <p class="text-gray-600 mt-2 mb-4">
                        Soft breathable fabric, ideal for relaxation spaces or lounges.
                    </p>
                    <p class="text-sm text-gray-500"><strong>Dimensions:</strong> 80cm x 75cm x 100cm</p>
                </div>
            </div>

            <!-- Product Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-200 to-gray-50 opacity-0 group-hover:opacity-20 transition-opacity"></div>
                <img src="images/product-4.png" alt="Nordic Chair"
                    class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 group-hover:text-primary transition-colors">
                        Nordic Chair
                    </h3>
                    <p class="text-gray-600 mt-2 mb-4">
                        Minimalist solid wood design, perfect for executive dining or meeting spaces.
                    </p>
                    <p class="text-sm text-gray-500"><strong>Dimensions:</strong> 45cm x 45cm x 90cm</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-16 animate-bounce-in">
            <a href="products.pdf" target="_blank"
                class="inline-block bg-gradient-to-r from-primary to-blue-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                View All Products (PDF)
            </a>
        </div>
    </div>
</section>



		<?php include('footer.php')?>


		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

	</body>

</html>
