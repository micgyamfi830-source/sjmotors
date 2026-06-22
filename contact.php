<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$service = trim($_POST['service'] ?? '');
$vehicle = trim($_POST['vehicle'] ?? '');
$date    = trim($_POST['date'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

$body = "
<html>
<body style='font-family:Arial,sans-serif;background:#f5f5f5;padding:20px;'>
<div style='max-width:600px;margin:0 auto;background:#fff;border-radius:8px;overflow:hidden;border:1px solid #e0e0e0;'>
<div style='background:#01114D;padding:20px;text-align:center;'>
<img src='https://spannerandjerkmotors.com/SPANNER%20AND%20JACK%20MOTORS.jpeg' alt='Spanner and Jerk Motors' style='height:60px;width:60px;border-radius:50%;object-fit:cover;'>
<h2 style='color:#fff;margin:10px 0 0;font-size:1.2rem;'>Spanner and Jerk Motors</h2>
</div>
<div style='padding:24px;'>
<table style='width:100%;border-collapse:collapse;'>
<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Name</td><td style='padding:8px;border-bottom:1px solid #eee;font-weight:600;'>$name</td></tr>
<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Email</td><td style='padding:8px;border-bottom:1px solid #eee;'><a href='mailto:$email' style='color:#D42A1A;'>$email</a></td></tr>
<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Phone</td><td style='padding:8px;border-bottom:1px solid #eee;'>$phone</td></tr>
" . ($service ? "<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Service</td><td style='padding:8px;border-bottom:1px solid #eee;'>$service</td></tr>" : "") . "
" . ($vehicle ? "<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Vehicle</td><td style='padding:8px;border-bottom:1px solid #eee;'>$vehicle</td></tr>" : "") . "
" . ($date ? "<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Preferred Date</td><td style='padding:8px;border-bottom:1px solid #eee;'>$date</td></tr>" : "") . "
</table>
<div style='margin-top:16px;padding:16px;background:#f9f9f9;border-radius:6px;'>
<h4 style='margin:0 0 8px;color:#333;'>Message:</h4>
<p style='color:#555;line-height:1.6;margin:0;'>" . nl2br(htmlspecialchars($message)) . "</p>
</div>
</div>
<div style='background:#01114D;padding:12px;text-align:center;'>
<p style='color:rgba(255,255,255,0.6);font-size:0.75rem;margin:0;'>Spanner and Jerk Motors - OFANKOR SEVEN DAYS | 0243317610 / 054300064</p>
</div>
</div>
</body>
</html>
";

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'abdulissa2@gmail.com';
    $mail->Password   = 'your-16-char-app-password'; // ← use a Gmail App Password (not your regular password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('abdulissa2@gmail.com', 'Spanner and Jerk Motors');
    $mail->addAddress('abdulissa2@gmail.com');
    $mail->addReplyTo($email, $name);

    $isBooking = $service && ($vehicle || $date);
    $prefix = $isBooking ? 'New Service Booking' : 'New Message';
    $mail->Subject = "Spanner and Jerk Motors - $prefix from $name";
    $mail->isHTML(true);
    $mail->Body = $body;

    $mail->send();
    echo json_encode(['success' => true, 'message' => 'Thank you! Your message has been sent. We will get back to you shortly.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Could not send email. Please try again or call us at 0243317610 / 054300064. Error: ' . $mail->ErrorInfo]);
}
