
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "You must log in first to view this page.";
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.ico">
    
    <title>Naija Trips</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: url('path_to_your_background_image.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(34, 49, 63, 0.8); /* Dark blue-gray */
            padding: 10px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar a {
            color: #f5f5f5; /* Light gray */
            text-decoration: none;
            margin: 0 10px;
            font-weight: 700;
        }

        .navbar a:hover {
            color: #00a86b; /* Slight greenish color */
        }

        .welcome-box, .dashboard-box {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .welcome-box h2, .dashboard-box h4 {
            color: #00a86b; /* Slight greenish color */
        }

        .table-responsive {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #fff;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 0.75rem;
            vertical-align: top;
            border: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: rgba(34, 49, 63, 0.7); /* Dark blue-gray */
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(34, 49, 63, 0.5); /* Dark blue-gray */
        }

        .table-hover tbody tr:hover {
            background-color: rgba(34, 49, 63, 0.7); /* Dark blue-gray */
        }

        button {
            background-color: #00a86b; /* Slight greenish color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #007f4f; /* Darker greenish color */
        }
    </style>
</head>
<body>
    

    <div class="container" style="padding-top: 80px;">
        <a href="booking.php"><button>Back To Booking</button></a>
        <br><br><br><br>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="welcome-box">
                    <h2>Welcome Back</h2>
                    <p><?php echo $_SESSION['user_name']; ?></p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="dashboard-box">
                    <h4>Your Recent Bookings</h4>
                    <p>These are your travel and tour recent bookings</p>
                    <?php
                    // Fetch bookings from the database
                    include 'connection.php'; // Ensure you include your database connection file
                    $sql = "SELECT * FROM bookings WHERE user_id = ? ORDER BY id DESC";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $_SESSION['user_id']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>From</th>
                                    <th>Destination</th>
                                    <th>Hotel</th>
                                    <th>Tour Guide</th>
                                    <th>Transportation</th>
                                    <th>People</th>
                                    <th>Children</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    $sn = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>{$sn}</td>";
                                        echo "<td>{$row['from']}</td>";
                                        echo "<td>{$row['destination']}</td>";
                                        echo "<td>{$row['hotels']}</td>";
                                        echo "<td>{$row['tour_guide_preferences']}</td>";
                                        echo "<td>{$row['transportation']}</td>";
                                        echo "<td>{$row['num_people']}</td>";
                                        echo "<td>{$row['children']}</td>";
                                        echo "<td>{$row['checkin']}</td>";
                                        echo "<td>{$row['checkout']}</td>";
                                        echo "<td>{$row['status']}</td>";
                                        echo "</tr>";
                                        $sn++;
                                    }
                                } else {
                                    echo "<tr><td colspan='11'>No bookings found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    $stmt->close();
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="../../../cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendors/countdown-date-loop-counter/loopcounter.js"></script>
    <script src="assets/js/jquery.counterup.js"></script>
    <script src="assets/vendors/modal-video/jquery-modal-video.min.js"></script>
    <script src="assets/vendors/masonry/masonry.pkgd.min.js"></script>
    <script src="assets/vendors/lightbox/dist/js/lightbox.min.js"></script>
    <script src="assets/vendors/slick/slick.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML = "window.__CF$cv$params={r:'89bdb4b47fd9b8fc',t:'MTcxOTc0NTc4NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/d2a97f6b6ec9/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position =

 'absolute';
                a.style.top = '0';
                a.style.left = '0';
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                a.onload = function() {
                    c()
                };
                document.body.appendChild(a)
            } else {
                if (window.attachEvent) {
                    window.attachEvent('onload', c)
                } else {
                    window.addEventListener('load', c, false)
                }
            }
        })();
    </script>
</body>
</html>
