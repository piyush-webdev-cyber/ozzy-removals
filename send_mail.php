<?php
// CORS: allow the frontend to call this endpoint via fetch().
// If you only serve from ozzyremovals.au, you can replace '*' with that origin.
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Access-Control-Max-Age: 86400');

// Handle CORS preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (if you were using Composer)
// require 'vendor/autoload.php'; 

// --- THIS IS THE CRITICAL PART ---
// Since you uploaded the folder, we point to the files directly.
// Make sure the path 'PHPMailer.php/' matches what you uploaded.
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- DATA COLLECTION & SANITIZATION ---
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : 'Not provided';
    $phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : 'Not provided';
    $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : 'Not provided';
    $date = isset($_POST['date']) ? strip_tags(trim($_POST['date'])) : 'Not provided';
    $pickup = isset($_POST['pickup']) ? strip_tags(trim($_POST['pickup'])) : 'Not provided';
    $drop = isset($_POST['drop']) ? strip_tags(trim($_POST['drop'])) : 'Not provided';
    $message = isset($_POST['message']) && !empty($_POST['message']) ? strip_tags(trim($_POST['message'])) : 'No message provided.';
    
    // --- VALIDATION ---
    if (empty($name) || empty($phone) || empty($email) || empty($date) || empty($pickup) || empty($drop)) {
        header("Location: index.html?error=missingfields");
        exit;
    }

    // --- UNIQUE ID & EMAIL ---
    $recipient_email = "info@ozzyremovals.au"; 
    $quote_id = strtoupper(uniqid('QR-'));
    $subject = "New Moving Quote Request [$quote_id] - Ozzy Removals";

    // --- EMAIL BODY CONSTRUCTION (Same as before) ---
    $email_body = "<html>
    <head>
        <style>
            body { margin: 0; padding: 0; font-family: Arial, sans-serif; line-height: 1.6; }
            .container { width: 90%; max-width: 600px; margin: 20px auto; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; }
            .header { background-color: #FF6A00; color: #ffffff; padding: 20px; text-align: center; }
            .header h2 { margin: 0; font-size: 24px; }
            .content { padding: 30px; }
            .content table { width: 100%; border-collapse: collapse; }
            .content th, .content td { padding: 10px 15px; border-bottom: 1px solid #eee; text-align: left; }
            .content th { color: #888; width: 30%; }
            .content td { color: #333; }
            .message-box { background-color: #f9f9f9; padding: 20px; border-radius: 5px; margin-top: 20px; }
            .message-box h3 { margin-top: 0; color: #FF6A00; }
            .footer { background-color: #1a2430; color: #aaa; padding: 20px; text-align: center; font-size: 12px; }
            .footer p { margin: 0; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Moving Quote Request</h2>
            </div>
            <div class='content'>
                <p>You have received a new quote request from the Ozzy Removals website. (ID: $quote_id)</p>
                
                <h3>Contact Details:</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <td>" . $name . "</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>" . $phone . "</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>" . $email . "</td>
                    </tr>
                </table>

                <h3 style='margin-top: 20px;'>Move Details:</h3>
                <table>
                    <tr>
                        <th>Moving Date</th>
                        <td>" . $date . "</td>
                    </tr>
                    <tr>
                        <th>Pickup Location</th>
                        <td>" . $pickup . "</td>
                    </tr>
                    <tr>
                        <th>Drop Location</th>
                        <td>" . $drop . "</td>
                    </tr>
                </table>";

    if ($message != 'No message provided.') {
        $email_body .= "
                <div class='message-box'>
                    <h3>Message from Customer:</h3>
                    <p>" . nl2br($message) . "</p>
                </div>";
    }

    $email_body .= "
            </div>
            <div class='footer'>
                <p>&copy; " . date('Y') . " Ozzy Removals. This is an automated email from the website.</p>
            </div>
        </div>
    </body>
    </html>";
    // --- End Email Body ---


    // --- PHPMailer SMTP Configuration ---
    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // --- SERVER SETTINGS ---
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Debug output is OFF
        $mail->isSMTP();                                        // Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';               // Hostinger's SMTP server
        $mail->SMTPAuth   = true;                               // Enable SMTP authentication
        $mail->Username   = 'info@ozzyremovals.au';             // SMTP username
        $mail->Password   = 'Villagecafe786@';         // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable implicit TLS/SSL encryption
        $mail->Port       = 465;                                // TCP port to connect to

        // --- RECIPIENTS ---
        // THIS IS THE FIX: The "From" email MUST match the Username
        $mail->setFrom('info@ozzyremovals.au', 'Ozzy Removals Quote'); 
        $mail->addAddress($recipient_email, 'Ozzy Removals Admin');      // Add a recipient (Your email)
        $mail->addReplyTo($email, $name);                                // Set the 'Reply-To' to the customer's email

        // --- CONTENT ---
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $email_body;
        $mail->AltBody = strip_tags($email_body);               // Fallback for non-HTML mail clients

        $mail->send();
        
        // --- REDIRECT on success ---
        // Debug is off, so we re-enable the redirect
        header("Location: thankyou.php");
        exit;

    } catch (Exception $e) {
        // If it fails, redirect back with an error. 
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // For debugging
        header("Location: index.html?error=mailfail");
        exit;
    }

} else {
    // If the script is accessed directly (not via POST), redirect to the homepage
    header("Location: index.html");
    exit;
}
?>

