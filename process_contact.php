<?php
session_start();
header('Content-Type: application/json');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to log errors securely
function log_error($error_message) {
    // Define the path to your error log file outside the web root
    $log_file = __DIR__ . '/logs/error.log';
    // Ensure the logs directory exists and is writable
    if (!file_exists(__DIR__ . '/logs')) {
        mkdir(__DIR__ . '/logs', 0755, true);
    }
    // Log the error with a timestamp
    error_log("[" . date('Y-m-d H:i:s') . "] " . $error_message . "\n", 3, $log_file);
}

// Initialize response array
$response = ['success' => false, 'message' => ''];

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // CSRF Token Validation
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $response['message'] = 'Invalid CSRF token';
        echo json_encode($response);
        exit();
    }

    // Sanitize Inputs
    $first_name = sanitize_input($_POST["fname"] ?? '');
    $last_name  = sanitize_input($_POST["lname"] ?? '');
    $email      = sanitize_input($_POST["email"] ?? '');
    $message    = sanitize_input($_POST["message"] ?? '');

    // Validate Inputs
    if (empty($first_name) || empty($last_name) || empty($email) || empty($message)) {
        $response['message'] = 'Please fill all fields';
        echo json_encode($response);
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Invalid email address';
        echo json_encode($response);
        exit();
    }

    // reCAPTCHA Validation
    if (empty($_POST['g-recaptcha-response'])) {
        $response['message'] = 'Please complete the reCAPTCHA';
        echo json_encode($response);
        exit();
    }

    $recaptcha_response = $_POST['g-recaptcha-response'];
    $secret_key = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe"; // Test Secret Key

    $verify_url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => $secret_key,
        'response' => $recaptcha_response,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    // Verify reCAPTCHA
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $verify_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_recaptcha = curl_exec($ch);
    curl_close($ch);

    $response_keys = json_decode($response_recaptcha, true);

    if (!$response_keys["success"]) {
        $response['message'] = 'Captcha verification failed';
        echo json_encode($response);
        exit();
    }

    // Send Email Using PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'eli.prenku@gmail.com'; // Your Gmail address
        $mail->Password   = 'vxicjwjqheohkorj';    // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('eli.prenku@gmail.com', 'Dream Furniture KS'); 
        $mail->addAddress('eli.prenku@gmail.com', 'Dream Furniture KS'); 
        $mail->addReplyTo($email, "$first_name $last_name");    

        // Email Content
        $mail->isHTML(true); // Enable HTML formatting
        $mail->Subject = "New Contact Form Submission from $first_name $last_name";

        // Construct the HTML email body
        $mail->Body    = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>New Contact Form Submission</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #ffffff;
                    padding: 20px;
                    border: 1px solid #dddddd;
                }
                .header {
                    text-align: center;
                    padding-bottom: 20px;
                }
                .header img {
                    max-height: 60px;
                }
                .content {
                    line-height: 1.6;
                    color: #333333;
                }
                .footer {
                    text-align: center;
                    padding-top: 20px;
                    font-size: 12px;
                    color: #777777;
                }
                .label {
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <img src='https://yourwebsite.com/images/dreamlogo.png' alt='Dream Furniture KS Logo'>
                </div>
                <div class='content'>
                    <h2>New Contact Form Submission</h2>
                    <p><span class='label'>First Name:</span> {$first_name}</p>
                    <p><span class='label'>Last Name:</span> {$last_name}</p>
                    <p><span class='label'>Email:</span> {$email}</p>
                    <p><span class='label'>Message:</span><br>" . nl2br($message) . "</p>
                </div>
                <div class='footer'>
                    <p>Dream Furniture KS | <a href='https://yourwebsite.com'>www.yourwebsite.com</a></p>
                </div>
            </div>
        </body>
        </html>
        ";

        // Optional: Add an alternative plain-text body for non-HTML email clients
        $mail->AltBody = "You have received a new message from your website contact form.\n\n" .
                         "Here are the details:\n" .
                         "First Name: $first_name\n" .
                         "Last Name: $last_name\n" .
                         "Email: $email\n\n" .
                         "Message:\n$message\n";

        $mail->send();
        $response['success'] = true;
        $response['message'] = 'Thank you for your message';
    } catch (Exception $e) {
        // Log the detailed error message for debugging
        log_error("PHPMailer Error: {$mail->ErrorInfo}");
        $response['message'] = 'There was an error sending your message';
    }

    echo json_encode($response);
    exit();
} else {
    $response['message'] = 'Invalid request';
    echo json_encode($response);
    exit();
}
?>
