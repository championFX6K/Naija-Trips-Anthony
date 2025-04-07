<?php
session_start();
include 'connection.php'; // Include your database connection
include 'functions.php'; // Include your helper functions
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $from = $_POST['from'];
    $destination = $_POST['destination'];
    $hotels = $_POST['hotels'];
    $tourist_centers = $_POST['tourist_centers'];
    $tourGuide = $_POST['tourGuide'];
    $suggested_tour_guide = $_POST['suggested_tour_guide'];
    $transportation = $_POST['transportation'];
    $num_people = $_POST['num_people'];
    $children = isset($_POST['children']) ? 1 : 0;
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $user_email = $_SESSION['user_email'];
        $user_name = $_SESSION['user_name'];

        $sql = "INSERT INTO bookings (user_id, user_email, user_name, `from`, destination, hotels, tourist_centers, tour_guide_preferences, suggested_tour_guide, transportation, num_people, children, checkin, checkout)
                VALUES ('$user_id', '$user_email', '$user_name', '$from', '$destination', '$hotels', '$tourist_centers', '" . implode(",", $tourGuide) . "', '$suggested_tour_guide', '$transportation', '$num_people', '$children', '$checkin', '$checkout')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = 'Booking successfully made!';

            // Send confirmation email to the user
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'easytechwork01@gmail.com';
                $mail->Password = 'upjxzubhcgkvauci'; // App password if using 2FA
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // or PHPMailer::ENCRYPTION_SMTPS if using SSL
                $mail->Port = 465; // Use 587 for TLS or 465 for SSL

                //Recipients
                $mail->setFrom('easytechwork01@gmail.com', 'Naija Trips');
                $mail->addAddress($user_email, $user_name);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Booking Confirmation';
                $mail->Body    = "Dear $user_name,<br><br>Your booking has been successfully made. Here are the details:<br><br>
                                  <b>From:</b> $from<br>
                                  <b>Destination:</b> $destination<br>
                                  <b>Hotel:</b> $hotels<br>
                                  <b>Tourist Centers:</b> $tourist_centers<br>
                                  <b>Tour Guide Preferences:</b> " . implode(", ", $tourGuide) . "<br>
                                  <b>Suggested Tour Guide:</b> $suggested_tour_guide<br>
                                  <b>Means of Transportation:</b> $transportation<br>
                                  <b>Number of People:</b> $num_people<br>
                                  <b>Children:</b> " . ($children ? 'Yes' : 'No') . "<br>
                                  <b>Checkin Date:</b> $checkin<br>
                                  <b>Checkout Date:</b> $checkout<br><br>
                                  Thank you for booking with us!<br>
                                  <br><br> We Would Confirm your Booking And Get Back to you immidiately
                                  <br><br<br>Naija Trips Team";

                $mail->send();
                $_SESSION['success'] .= ' A confirmation email has been sent to your email address.';
            } catch (Exception $e) {
                $_SESSION['error'] = "Booking was successful, but the confirmation email could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        } else {
            $_SESSION['error'] = 'Error: ' . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = 'You need to log in to make a booking.';
    }
    header('Location: booking.php');
}
?>
