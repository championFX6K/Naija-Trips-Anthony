<?php
session_start();
include "../connection.php";
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $status = $_POST["status"];
    
    // Fetch user details
    $sql = "SELECT user_email, user_name FROM bookings WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_email = $row["user_email"];
    $user_name = $row["user_name"];

    // Update booking status
    $sql = "UPDATE bookings SET status='$status' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        // Send email based on the status
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'easytechwork01@gmail.com'; // SMTP username
            $mail->Password = 'upjxzubhcgkvauci'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            //Recipients
            $mail->setFrom('easytechwork01@gmail.com', 'Naija Trips');
            $mail->addAddress($user_email, $user_name);

            // Content
            $mail->isHTML(true);
            
            if ($status == 'accepted') {
                $mail->Subject = 'Booking Confirmation';
                $mail->Body    = "
                    <h2 style='color: green;'>Congratulations!</h2>
                    <p>Dear $user_name,<br><br>Your travel and tour booking has been confirmed. We are excited to inform you that there is an available slot in your destination.<br><br>
                    <strong>Price:</strong> ₦ 5,000,000<br><br>
                    // Payment details //<br><br>
                    Please make your payment to the following account:<br>
                    Account Name: Naija Trips<br>
                    Account Number: 8124314421<br>
                    Bank: Opay Bank<br><br>
                    
                    Please note that the payment should be made within 7 days from the date of booking. If the payment is not made, the booking will be cancelled.<br><br>
                    If you have any questions, please do not hesitate to contact us at <a href='mailto:coderjoshua5@gmail.com'>coderjoshua5@gmail.com</a>.<br><br>
                    
                    Thank you for booking with us!<br>
                    Travel & Tour Team</p>";
            } else if ($status == 'rejected') {
                $mail->Subject = 'Booking Rejection';
                $mail->Body    = "
                    <h2 style='color: red;'>Booking Rejected</h2>
                    <p>Dear $user_name,<br><br>After processing your travel and tour booking, we regret to inform you that your booking could not be processed. Please try again later.<br><br>
                    For more information, please contact us at <a href='mailto:coderjoshua5@gmail.com'>coderjoshua5@gmail.com</a>.<br><br>
                    Thank you for your understanding.<br>
                    Naija Trips Team</p>";
            }

            $mail->send();
            $_SESSION['success'] = "Booking status updated and email sent.";
        } catch (Exception $e) {
            $_SESSION['error'] = "Booking status updated, but the email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['error'] = "Error updating booking: " . mysqli_error($conn);
    }

    header("Location: dashboard.php");
    exit();
}
?>
