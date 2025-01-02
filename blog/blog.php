<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="shortcut icon" href="../images/dreamlogo.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="../css/tiny-slider.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/3.3.0/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com/3.3.2"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    
</head>
<body>
<div class="gtranslate_wrapper"></div>
		<script>window.gtranslateSettings = {"default_language":"en","detect_browser_language":true,"languages":["en","de","sq"],"wrapper_selector":".gtranslate_wrapper","flag_style":"3d"}</script>
		<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
    <header class="bg-[rgb(59,93,80)] fixed top-0 left-0 right-0 shadow-lg z-50">
			<div class="container mx-auto px-4 py-2 flex justify-between items-center">
      <a href="index.php">
            <img src="../images/dreamfurniturelogo.png" alt="Furni Logo" class="h-10 w-auto">
        </a>
				<div class="flex space-x-4">
					<a href="/path/to/portfolio.pdf" download class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
							<title>Download Portfolio</title>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v6m0 0l-3-3m3 3l3-3" />
						</svg>
						Portfolio
					</a>
		
					<a href="../contact.html" class="flex items-center bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
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
						<a href="../index.php" class="text-gray-300 hover:text-white">Home</a>
	
						<div class="relative group">
							<a href="#" class="text-gray-300 hover:text-white inline-flex items-center focus:outline-none ">
								<span>Shop</span>
								<svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 20 20" aria-hidden="true">
									<path fill-rule="evenodd" d="M5.293 7.293l4.707 4.707 4.707-4.707 1.414 1.414L10 14.828l-6.414-6.121z"/>
								</svg>
							</a>
							<div class="absolute left-0 top-full mt-0 w-48 bg-white rounded-md shadow-lg hidden group-hover:block z-20">
								<a href="../Kitchen.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Kitchen</a>
								<a href="../LivingRoom.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Living Room</a>
								<a href="../Tables.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Tables</a>
								<a href="../SleepingRoom.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Sleeping Room</a>
								<a href="../Sofas.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Sofas</a>
								<a href="../Lights.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Lights</a>
							</div>
						</div>
						<a href="../blog/blog.php" class="text-gray-300 hover:text-white">Blog</a>
						<a href="../about.php" class="text-gray-300 hover:text-white">About us</a>
						<a href="../contact.php" class="text-gray-300 hover:text-white">Contact us</a>
					</div>
				</div>
			</div>
	
			<div class="hidden md:hidden" id="mobile-nav">
				<a href="../index.php" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Home</a>
				<div class="border-t border-gray-700"></div>
				<div class="relative">
					<button class="w-full flex items-center justify-between text-left px-4 py-2 text-gray-300 hover:bg-gray-700 focus:outline-none" id="mobile-dropdown-toggle">
						<span>Shop</span>
						<svg id="mobile-dropdown-arrow" class="h-5 w-5 transform transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
							<path fill-rule="evenodd" d="M5.293 7.293l4.707 4.707 4.707-4.707 1.414 1.414L10 14.828l-6.414-6.121z" clip-rule="evenodd"/>
						</svg>
					</button>
					<div class="hidden" id="mobile-dropdown">
						<a href="../Kitchen.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Kitchen</a>
						<a href="../LivingRoom.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Living Room</a>
						<a href="../Tables.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Tables</a>
						<a href="../SleepingRoom.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Sleeping Room</a>
						<a href="../Sofas.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Sofas</a>
						<a href="../Lights.php" class="block px-6 py-2 text-gray-300 hover:bg-gray-700">Lights</a>
					</div>
				</div>
				<div class="border-t border-gray-700"></div>
				<a href="blog/blog.php" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Blog</a>
				<a href="../about.php" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">About us</a>
				<a href="../contact.php" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Contact us</a>
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
		
<section class="container mx-auto px-4 py-16 bg-gray-50">
    <div class="text-center mb-12">
        <h1 class="text-5xl font-poppins font-bold text-[rgb(59,93,80)]">Latest Blog Posts</h1>
        <p class="mt-4 text-[rgb(59,93,80)] font-roboto">Stay updated with our latest news and articles</p>
    </div>

    <?php

    $posts_per_page = 6;
    $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($current_page - 1) * $posts_per_page;
    $total_posts_result = $conn->query("SELECT COUNT(*) AS total FROM posts");
    $total_posts_row = $total_posts_result->fetch_assoc();
    $total_posts = $total_posts_row['total'];
    $total_pages = ceil($total_posts / $posts_per_page);
    $stmt = $conn->prepare("SELECT * FROM posts ORDER BY created_at DESC LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $posts_per_page, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex flex-col transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <?php
                    $images = unserialize($row['images']);
                    if (!empty($images)):
                        $image_url = 'uploads/' . htmlspecialchars($images[0]);
                    ?>
                        <div class="relative group">
                            <img src="<?php echo $image_url; ?>" alt="Blog Image" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-800 via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-500 flex items-end p-4">
                                <a href="blog_details.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="text-white font-roboto font-medium text-lg opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    Read More
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="w-full h-56 bg-gray-200 flex items-center justify-center text-gray-500">
                            No Image Available
                        </div>
                    <?php endif; ?>

                    <div class="p-6 flex-grow flex flex-col">
                        <h2 class="text-2xl font-poppins font-semibold mb-2 text-[rgb(59,93,80)] transition-colors duration-300 hover:text-blue-600">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </h2>
                        <p class="text-gray-700 mb-4 font-roboto flex-grow">
                            <?php 
                                $excerpt = strip_tags($row['content']);
                                if (strlen($excerpt) > 100) {
                                    $excerpt = substr($excerpt, 0, 100) . '...';
                                }
                                echo htmlspecialchars($excerpt);
                            ?>
                        </p>
                        <div class="mb-4">
                            <span class="text-sm text-gray-500 font-roboto">
                                Published on <?php echo date("F j, Y", strtotime($row['created_at'])); ?>
                            </span>
                        </div>
                        <a href="blog_details.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="mt-auto inline-block text-white bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 font-semibold py-2 px-4 rounded-full transition-all duration-300 transform hover:-translate-y-1">
                            Read More
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-gray-600 text-center col-span-full">No blog posts available.</p>
        <?php endif; ?>

        <?php
        $stmt->close();
        $conn->close();
        ?>
    </div>

    <?php if ($total_pages > 1): ?>
        <div class="flex justify-center mt-12">
            <nav class="inline-flex items-center space-x-1">
                <?php if ($current_page > 1): ?>
                    <a href="?page=<?php echo $current_page - 1; ?>" class="px-4 py-2 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-colors duration-300">
                        Previous
                    </a>
                <?php else: ?>
                    <span class="px-4 py-2 rounded-full bg-blue-200 text-blue-500 cursor-not-allowed">
                        Previous
                    </span>
                <?php endif; ?>

                <?php
                $visible_pages = 5;
                $start_page = max(1, $current_page - floor($visible_pages / 2));
                $end_page = min($total_pages, $start_page + $visible_pages - 1);

                if ($start_page > 1) {
                    echo '<span class="px-3 py-2 text-gray-500">...</span>';
                }

                for ($i = $start_page; $i <= $end_page; $i++):
                    if ($i == $current_page):
                        ?>
                        <span class="px-4 py-2 rounded-full bg-blue-700 text-white font-semibold">
                            <?php echo $i; ?>
                        </span>
                    <?php else: ?>
                        <a href="?page=<?php echo $i; ?>" class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 hover:bg-blue-200 transition-colors duration-300">
                            <?php echo $i; ?>
                        </a>
                    <?php
                    endif;
                endfor;

                if ($end_page < $total_pages) {
                    echo '<span class="px-3 py-2 text-gray-500">...</span>';
                }
                ?>

                <?php if ($current_page < $total_pages): ?>
                    <a href="?page=<?php echo $current_page + 1; ?>" class="px-4 py-2 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-colors duration-300">
                        Next
                    </a>
                <?php else: ?>
                    <span class="px-4 py-2 rounded-full bg-blue-200 text-blue-500 cursor-not-allowed">
                        Next
                    </span>
                <?php endif; ?>
            </nav>
        </div>
    <?php endif; ?>
</section>



<footer class="py-20 bg-white relative">
  <div class="container mx-auto">
    <div class="absolute right-0 z-10
                top-0
                sm:top-0
                md:-top-24
                lg:-top-52">
      <img src="../images/sofa.png" alt="Sofa Image" class="max-w-[380px]">
    </div>

    <!-- Newsletter Subscription -->
    <div class="flex flex-wrap">
      <div class="w-full lg:w-2/3">
        <div class="relative z-20 mt-24 mb-10 lg:mt-0 lg:mb-20">
          <h3 class="flex items-center text-lg font-medium text-[rgb(59,93,80)]">
            <span class="mr-2">
              <img src="../images/envelope-outline.svg" alt="Envelope Icon" class="w-6 h-6">
            </span>
            <span>Subscribe to Newsletter</span>
          </h3>

          <form action="#" class="flex flex-wrap gap-3 mt-4">
            <div class="flex-shrink-0">
              <input type="text" class="h-12 rounded-[10px] border border-gray-300 px-4 focus:border-[rgb(59,93,80)] focus:ring-[rgb(59,93,80)] focus:outline-none" placeholder="Enter your name">
            </div>
            <div class="flex-shrink-0">
              <input type="email" class="h-12 rounded-[10px] border border-gray-300 px-4 focus:border-[rgb(59,93,80)] focus:ring-[rgb(59,93,80)] focus:outline-none" placeholder="Enter your email">
            </div>
            <div class="flex-shrink-0">
              <button type="submit" class="h-12 w-12 flex items-center justify-center rounded-[10px] bg-[rgb(59,93,80)] text-white hover:bg-[rgb(49,83,70)] transition-colors duration-200">
                <span class="fas fa-paper-plane"></span>
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <!-- Social Media and Navigation Links -->
    <div class="flex flex-wrap gap-5 mb-5">
      <!-- Social Media Links -->
      <div class="w-full lg:w-1/4">
      <div class="mb-4 md:mb-0">
                <a href="index.php" aria-label="Furni Home">
                    <img src="../images/dreamlogo.png" alt="Furni Logo" class="h-10 sm:h-12 md:h-14 w-auto">
                </a>
            </div>
        <p class="mb-4 text-gray-600">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>

        <ul class="flex space-x-2">
          <li>
            <a href="#" class="w-10 h-10 flex items-center justify-center bg-[#dce5e4] text-[rgb(59,93,80)] rounded-full hover:bg-[rgb(59,93,80)] hover:text-white transition-colors duration-200">
              <span class="fab fa-facebook-f"></span>
            </a>
          </li>
          <li>
            <a href="#" class="w-10 h-10 flex items-center justify-center bg-[#dce5e4] text-[rgb(59,93,80)] rounded-full hover:bg-[rgb(59,93,80)] hover:text-white transition-colors duration-200">
              <span class="fab fa-twitter"></span>
            </a>
          </li>
          <li>
            <a href="#" class="w-10 h-10 flex items-center justify-center bg-[#dce5e4] text-[rgb(59,93,80)] rounded-full hover:bg-[rgb(59,93,80)] hover:text-white transition-colors duration-200">
              <span class="fab fa-instagram"></span>
            </a>
          </li>
          <li>
            <a href="#" class="w-10 h-10 flex items-center justify-center bg-[#dce5e4] text-[rgb(59,93,80)] rounded-full hover:bg-[rgb(59,93,80)] hover:text-white transition-colors duration-200">
              <span class="fab fa-linkedin-in"></span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Navigation Links -->
      <div class="w-full lg:w-2/3 mt-8 lg:mt-14">
        <div class="flex flex-wrap">
          <div class="w-1/2 sm:w-1/2 md:w-1/4">
            <ul class="list-none">
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">About us</a></li>
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Services</a></li>
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Contact us</a></li>
            </ul>
          </div>
          <div class="w-1/2 sm:w-1/2 md:w-1/4">
            <ul class="list-none">
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Support</a></li>
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Knowledge base</a></li>
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Live chat</a></li>
            </ul>
          </div>
          <div class="w-1/2 sm:w-1/2 md:w-1/4">
            <ul class="list-none">
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Jobs</a></li>
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Our team</a></li>
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Leadership</a></li>
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="w-1/2 sm:w-1/2 md:w-1/4">
            <ul class="list-none">
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Nordic Chair</a></li>
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Kruzo Aero</a></li>
              <li class="mb-2.5"><a href="#" class="text-gray-700 hover:text-gray-900">Ergonomic Chair</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="border-t border-t-[#dce5e4] text-sm">
      <div class="flex flex-col lg:flex-row items-center justify-between pt-4">
        <div class="text-center lg:text-left text-gray-600">
          &copy; <script>document.write(new Date().getFullYear());</script> Furni. All Rights Reserved. &mdash; Designed with love by
          <a href="https://untree.co" class="text-[rgb(59,93,80)] hover:text-[rgb(49,83,70)]">Untree.co</a> Distributed By
          <a href="https://themewagon.com" class="text-[rgb(59,93,80)] hover:text-[rgb(49,83,70)]">ThemeWagon</a>
        </div>
        <div class="mt-4 lg:mt-0">
          <ul class="flex flex-wrap justify-center lg:justify-end space-x-4">
            <li><a href="#" class="text-gray-700 hover:text-gray-900">Terms &amp; Conditions</a></li>
            <li><a href="#" class="text-gray-700 hover:text-gray-900">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<div id="cookie-consent" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden transition-opacity duration-300" role="dialog" aria-modal="true" aria-labelledby="cookie-message">
  <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
    <div id="cookie-message" class="mb-4 text-center">
      
    </div>
    <div class="flex justify-center space-x-4">
      <button id="accept-cookies" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none">
        
      </button>
      <button id="read-cookies" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 focus:outline-none">
    
      </button>
    </div>
    <div id="language-selector" class="mt-4 flex justify-center space-x-2">
      <button class="lang-button text-sm text-blue-500 hover:underline" data-lang="en">English</button>
      <button class="lang-button text-sm text-blue-500 hover:underline" data-lang="de">Deutsch</button>
      <button class="lang-button text-sm text-blue-500 hover:underline" data-lang="sq">Shqip</button>
    </div>
  </div>
</div>

<script>
  const cookieData = {
    en: {
      message: "We use cookies to improve your experience on our website. By accepting, you agree to our use of cookies.",
      accept: "Accept",
      read: "Read Cookies Policy"
    },
    de: {
      message: "Wir verwenden Cookies, um Ihre Erfahrung auf unserer Website zu verbessern. Durch die Zustimmung stimmen Sie der Verwendung von Cookies zu.",
      accept: "Akzeptieren",
      read: "Cookie-Richtlinie lesen"
    },
    sq: {
      message: "Ne përdorim cookie për të përmirësuar përvojën tuaj në faqen tonë të internetit. Duke pranuar, ju pajtoheni me përdorimin tonë të cookie-ve.",
      accept: "Prano",
      read: "Lexo Politikën e Cookie-ve"
    }
  };

  function getUserLanguage() {
    const lang = navigator.language.slice(0, 2);
    return ['en', 'de', 'sq'].includes(lang) ? lang : 'en';
  }

  function setLanguage(lang) {
    const messageEl = document.getElementById('cookie-message');
    const acceptBtn = document.getElementById('accept-cookies');
    const readBtn = document.getElementById('read-cookies');

    messageEl.textContent = cookieData[lang].message;
    acceptBtn.textContent = cookieData[lang].accept;
    readBtn.textContent = cookieData[lang].read;
  }

  function showCookieConsent() {
    const consentBanner = document.getElementById('cookie-consent');
    consentBanner.classList.remove('hidden');
    consentBanner.classList.add('opacity-100');
  }

  function hideCookieConsent() {
    const consentBanner = document.getElementById('cookie-consent');
    consentBanner.classList.remove('opacity-100');
    consentBanner.classList.add('hidden');
  }

  function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 24 * 60 * 60 * 1000).toUTCString();
    document.cookie = `${name}=${value}; expires=${expires}; path=/; Secure; SameSite=Strict`;
  }

  function getCookie(name) {
    const cookies = document.cookie.split(';').map(cookie => cookie.trim());
    for (let c of cookies) {
      if (c.startsWith(name + '=')) {
        return c.substring(name.length + 1);
      }
    }
    return null;
  }

  document.addEventListener('DOMContentLoaded', () => {
    const consent = getCookie('cookie_consent');
    if (!consent) {
      showCookieConsent();
      const userLang = getUserLanguage();
      setLanguage(userLang);
    }

    document.getElementById('accept-cookies').addEventListener('click', () => {
      setCookie('cookie_consent', 'accepted', 365);
      hideCookieConsent();
    });

    document.getElementById('read-cookies').addEventListener('click', () => {
      window.location.href = '/cookies-policy.html';
    });

    document.querySelectorAll('.lang-button').forEach(button => {
      button.addEventListener('click', () => {
        const selectedLang = button.getAttribute('data-lang');
        setLanguage(selectedLang);
      });
    });
  });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            console.log("Page is loaded and ready to go!");
        });
    </script>
</body>
</html>
