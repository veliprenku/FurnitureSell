<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DreamFurnitureKS</title>
  <link rel="shortcut icon" href="images/dreamlogo.png">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/3.3.0/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

  <style>
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
    .spinner {
      animation: spin 1s linear infinite;
    }
  </style>
</head>

<body>
    
<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

include('header.php');
?>

<section class="py-12 bg-white">
    <div class="container mx-auto px-6 md:px-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            
            <div class="flex items-center">
                <i class="fas fa-address-card text-blue-600 fa-2x mr-4"></i>
                <div>
                    <h3 class="text-xl font-semibold">Contact</h3>
                    <p class="text-gray-600">Dream Furniture KS</p>
                </div>
            </div>
            

            <div class="flex items-center">
                <i class="fas fa-phone-alt text-green-600 fa-2x mr-4"></i>
                <div>
                    <h3 class="text-xl font-semibold">Phone</h3>
                    <p class="text-gray-600">+1 (234) 567-890</p>
                </div>
            </div>
            
            <!-- Location -->
            <div class="flex items-center">
                <i class="fas fa-map-marker-alt text-red-600 fa-2x mr-4"></i>
                <div>
                    <h3 class="text-xl font-semibold">Location</h3>
                    <p class="text-gray-600">1234 Furni Street, Suite 100, City, Country</p>
                </div>
            </div>
            
            <!-- Email -->
            <div class="flex items-center">
                <i class="fas fa-envelope text-purple-600 fa-2x mr-4"></i>
                <div>
                    <h3 class="text-xl font-semibold">Email</h3>
                    <p class="text-gray-600">support@furni.com</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Contact Form -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12">
        <h2 class="text-3xl font-semibold text-center mb-12 animate-fade-in">Get in Touch</h2>
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg animate-fade-in delay-200">
            <form id="contactForm">
                <!-- CSRF Token -->
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                <!-- First and Last Name -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-black mb-2" for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Your First Name" required>
                    </div>
                    <div>
                        <label class="block text-black mb-2" for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Your Last Name" required>
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mb-6">
                    <label class="block text-black mb-2" for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Your Email Address" required>
                </div>

                <!-- Message -->
                <div class="mb-6">
                    <label class="block text-black mb-2" for="message">Message</label>
                    <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Your Message" required></textarea>
                </div>

                <!-- Google reCAPTCHA -->
                <div class="mb-6">
                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" id="submitButton" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded transition flex items-center justify-center">
                        <span id="submitButtonText">Send Message</span>
                        <!-- Spinner Icon -->
                        <svg id="submitButtonSpinner" class="hidden ml-2 w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include('footer.php')?>

<!-- Google reCAPTCHA API Script -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Animation Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const elements = document.querySelectorAll('.animate-fade-in, .animate-slide-up');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting){
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        elements.forEach(el => {
            el.classList.add('opacity-0', 'translate-y-10');
            observer.observe(el);
        });
    });
</script>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e){
    e.preventDefault(); // Prevent default form submission

    const form = e.target;
    const formData = new FormData(form);
    const submitButton = document.getElementById('submitButton');
    const submitButtonText = document.getElementById('submitButtonText');
    const submitButtonSpinner = document.getElementById('submitButtonSpinner');

    submitButton.disabled = true;
    submitButton.classList.add('opacity-50', 'cursor-not-allowed');
    submitButtonText.textContent = 'Sending...';
    submitButtonSpinner.classList.remove('hidden');

    fetch('process_contact.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.message,
            });
            form.reset();         
            grecaptcha.reset();  
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message,
            });
            grecaptcha.reset();    
        }
    })
    .catch((error) => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An unexpected error occurred',
        });
        grecaptcha.reset();        
    })
    .finally(() => {
        submitButton.disabled = false;
        submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
        submitButtonText.textContent = 'Send Message';
        submitButtonSpinner.classList.add('hidden');
    });
});
</script>

</body>
</html>
