<header class="bg-[rgb(59,93,80)] fixed top-0 left-0 right-0 shadow-lg z-50">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <a href="index.php">
            <img src="images/DreamFurnitureFooter.png" alt="Furni Logo" class="h-10 w-auto">
        </a>
        
        <div class="flex space-x-4">
            <a href="/path/to/portfolio.pdf" download class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <title>Download Portfolio</title>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v6m0 0l-3-3m3 3l3-3" />
                </svg>
                Portfolio
            </a>

            <a href="contact.php" class="flex items-center bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <title>Make Appointment</title>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Appointment
            </a>
        </div>
    </div>
</header>

	
		<nav class="bg-[rgb(59,93,80)] mt-[2.5rem]"> >
			<div class="container mx-auto px-4">
				<div class="flex items-center justify-between h-16">
	
					<div class="md:hidden">
						<button id="nav-toggle" class="text-gray-300 hover:text-white focus:outline-none">
							<svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" aria-hidden="true">
								<path fill-rule="evenodd" d="M4 5h16v2H4V5zm0 7h16v2H4v-2zm0 7h16v2H4v-2z"/>
							</svg>
						</button>
					</div>
	
					<div class="hidden md:flex md:items-center md:space-x-6">
						<a href="index.php" class="text-gray-300 hover:text-white">Home</a>
	
						<div class="relative group">
							<a href="#" class="text-gray-300 hover:text-white inline-flex items-center focus:outline-none">
								<span>Shop</span>
								<svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 20 20" aria-hidden="true">
									<path fill-rule="evenodd" d="M5.293 7.293l4.707 4.707 4.707-4.707 1.414 1.414L10 14.828l-6.414-6.121z"/>
								</svg>
							</a>
							<div class="absolute left-0 top-full mt-0 w-48 bg-white z-20 rounded-md shadow-lg hidden group-hover:block">
								<a href="Kitchen.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Kitchen</a>
								<a href="LivingRoom.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Living Room</a>
								<a href="Tables.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Tables</a>
								<a href="SleepingRoom.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Sleeping Room</a>
								<a href="Sofas.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Sofas</a>
								<a href="Lights.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Lights</a>
							</div>
						</div>
						<a href="blog/blog.php" class="text-gray-300 hover:text-white">Blog</a>
						<a href="about.php" class="text-gray-300 hover:text-white">About us</a>
						<a href="contact.php" class="text-gray-300 hover:text-white">Contact us</a>
					</div>
				</div>
			</div>
	
			<div class="hidden md:hidden" id="mobile-nav">
				<a href="index.php" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Home</a>
				<div class="border-t border-gray-700"></div>
				<div class="relative">
					<button class="w-full flex items-center justify-between text-left px-4 py-2 text-gray-300 hover:bg-gray-700 focus:outline-none" id="mobile-dropdown-toggle">
						<span>Shop</span>
						<svg id="mobile-dropdown-arrow" class="h-5 w-5 transform transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
							<path fill-rule="evenodd" d="M5.293 7.293l4.707 4.707 4.707-4.707 1.414 1.414L10 14.828l-6.414-6.121z" clip-rule="evenodd"/>
						</svg>
					</button>
					<div class="hidden" id="mobile-dropdown">
						<a href="shop/Kitchen.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Kitchen</a>
						<a href="shop/LivingRoom.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Living Room</a>
						<a href="shop/Tables.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Tables</a>
						<a href="shop/SleepingRoom.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Sleeping Room</a>
						<a href="shop/Sofas.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Sofas</a>
						<a href="shop/Lights.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Lights</a>
					</div>
				</div>
				<div class="border-t border-gray-700"></div>
				<a href="/blog/blog.php" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Blog</a>
				<a href="/about.php" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">About us</a>
				<a href="/contact.php" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Contact us</a>
			</div>
		</nav>
		
		  <script>
			document.getElementById('nav-toggle').onclick = function() {
			  var navContent = document.getElementById('mobile-nav');
			  navContent.classList.toggle('hidden');
			};
		
			document.getElementById('mobile-dropdown-toggle').onclick = function() {
			  var dropdown = document.getElementById('mobile-dropdown');
			  dropdown.classList.toggle('hidden');
			};
			</script>