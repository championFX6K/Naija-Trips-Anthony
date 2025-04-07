<?php

include 'header.php';
include '../connection.php'; // Make sure you have a database connection
?>
<style>
.status.pending {
    color: blue;
}
.status.accepted {
    color: green;
}
.status.rejected {
    color: red;
}
</style>

            
            <div class="db-info-wrap">
                <div class="row">
                    <!-- Item -->
                    <!-- <div class="col-xl-3 col-sm-6">
                        <div class="db-info-list">
                            <div class="dashboard-stat-icon bg-blue">
                                <i class="far fa-chart-bar"></i>
                            </div>
                            <div class="dashboard-stat-content">
                                <h4>Today Views</h4>
                                <h5>22,520</h5> 
                            </div>
                        </div>
                    </div> -->
                    <!-- Item -->
                    <!-- <div class="col-xl-3 col-sm-6">
                        <div class="db-info-list">
                            <div class="dashboard-stat-icon bg-green">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="dashboard-stat-content">
                                <h4>Earnings</h4>
                                <h5>16,520</h5> 
                            </div>
                        </div>
                    </div> -->

                    <?php
                    // Fetch the number of users
                    $userCountResult = mysqli_query($conn, "SELECT COUNT(*) AS user_count FROM users");
                    $userCount = mysqli_fetch_assoc($userCountResult)['user_count'];

                    // Fetch the number of bookings
                    $bookingCountResult = mysqli_query($conn, "SELECT COUNT(*) AS booking_count FROM bookings");
                    $bookingCount = mysqli_fetch_assoc($bookingCountResult)['booking_count'];
                    ?>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="db-info-list">
                            <div class="dashboard-stat-icon bg-purple">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="dashboard-stat-content">
                                <h4>Users</h4>
                                <h5><?php echo $userCount; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="db-info-list">
                            <div class="dashboard-stat-icon bg-red">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <div class="dashboard-stat-content">
                                <h4>Bookings</h4>
                                <h5><?php echo $bookingCount; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-lg-6">
                        <div class="dashboard-box table-opp-color-box">
                            <h4>Recent Booking</h4>
                            <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>User</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>City</th>
                                            <th>Enquiry</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label class="custom-input"><input type="checkbox" checked="checked">
                                                <span class="custom-input-field"></span></label>
                                            </td>
                                            <td><span class="list-img"><img src="assets/images/comment.jpg" alt=""></span>
                                            </td>
                                            <td><span class="list-enq-name">John Doe</span>
                                            </td>
                                            <td>12 may</td>
                                            <td>Japan</td>
                                            <td>
                                                <span class="badge badge-success">15</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-input"><input type="checkbox" checked="checked">
                                                <span class="custom-input-field"></span></label>
                                            </td>
                                            <td><span class="list-img"><img src="assets/images/comment2.jpg" alt=""></span>
                                            </td>
                                            <td><span class="list-enq-name">John Doe</span>
                                            </td>
                                            <td>12 may</td>
                                            <td>Japan</td>
                                            <td>
                                                <span class="badge badge-success">15</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-input"><input type="checkbox" checked="checked">
                                                <span class="custom-input-field"></span></label>
                                            </td>
                                            <td><span class="list-img"><img src="assets/images/comment3.jpg" alt=""></span>
                                            </td>
                                            <td><span class="list-enq-name">John Doe</span>
                                            </td>
                                            <td>12 may</td>
                                            <td>Japan</td>
                                            <td>
                                                <span class="badge badge-success">15</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-input"><input type="checkbox" checked="checked">
                                                <span class="custom-input-field"></span></label>
                                            </td>
                                            <td><span class="list-img"><img src="assets/images/comment4.jpg" alt=""></span>
                                            </td>
                                            <td><span class="list-enq-name">John Doe</span>
                                            </td>
                                            <td>12 may</td>
                                            <td>Japan</td>
                                            <td>
                                                <span class="badge badge-success">15</span>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  -->
                    <div class="col-lg-6">
    
                </div>

                </div>
                
                <div class="row">
    <div class="col-lg-12">
        <div class="dashboard-box">
            <h4>Recent Bookings</h4>
            <p>These are the recent travel and tour bookings</p>
            <?php
            // Fetch bookings from the database
            $sql = "SELECT * FROM bookings ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>UserName</th>
                            <th>UserEmail</th>
                            <th>From</th>
                            <th>Destination</th>
                            <th>Hotel</th>
                            <th>TourGuide</th>
                            <th>Transportation</th>
                            <th>People</th>
                            <th>Children</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $sn = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$sn}</td>";
                                echo "<td>{$row['user_name']}</td>";
                                echo "<td>{$row['user_email']}</td>";
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
                                // echo "<td><span class='status pending'>Pending</span></td>";
                                echo "<td>
                                    <form method='post' action='update_booking_status.php' style='display:inline-block;'>
                                        <input type='hidden' name='id' value='{$row['id']}'>
                                        <input type='hidden' name='status' value='accepted'>
                                        <button type='submit' class='btn btn-success'>Accept</button>
                                    </form>
                                    <form method='post' action='update_booking_status.php' style='display:inline-block;'>
                                        <input type='hidden' name='id' value='{$row['id']}'>
                                        <input type='hidden' name='status' value='rejected'>
                                        <button type='submit' class='btn btn-danger'>Reject</button>
                                    </form>
                                    <button class='btn btn-secondary' onclick='deleteBooking({$row['id']})'>Delete</button>
                                </td>";
                                echo "</tr>";
                                $sn++;
                            }
                        } else {
                            echo "<tr><td colspan='13'>No bookings found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function deleteBooking(id) {
    // AJAX call to delete the booking
    if(confirm("Are you sure you want to delete this booking?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_booking.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                location.reload();
            }
        };
        xhr.send("id=" + id);
    }
}
</script>


                <div class="row">
    <div class="col-lg-12">
        <div class="dashboard-box">
            <h4>Available Destinations</h4>
            <p>List of destinations we can take tourists and travelers to see</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>s/n</th>
                            <th>state</th>
                            <th>destination</th>
                            <th>destination img</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM destinations";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            $sn = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $sn++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['state']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['destination']) . "</td>";
                                echo "<td><img src='assets/uploads/destinations/" . htmlspecialchars($row['destinationImg']) . "' alt='Image' style='width:50px;height:50px;'></td>";
                                echo "<td>
                                        <a href='editDestination.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                        <a href='deleteDestination.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this destination?\")'>Delete</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No destinations found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</div>

                

                <div class="row">
    <div class="col-lg-12">
        <div class="dashboard-box">
            <h4>Available Agents</h4>
            <p>These are the agents that are available for work</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Agent image</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>State</th>
                            <th>Role</th>
                            <th>Characteristics</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM agents";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $sn = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $sn . "</td>";
                                echo "<td><img src='assets/uploads/agentimg/" . $row['agentImg'] . "' alt='' width='50'></td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['agentState'] . "</td>";
                                echo "<td>" . $row['role'] . "</td>";
                                echo "<td>" . $row['characteristics'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>
                                    <a href='editAgent.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='deleteAgent.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this agent?\")'>Delete</a>
                                </td>";
                                echo "</tr>";
                                $sn++;
                            }
                        } else {
                            echo "<tr><td colspan='9'>No agents found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</div>

                
                
            </div>
            <!-- Content / End -->
            <!-- Copyrights -->
            <div class="copyrights">
               Copyright © 2021 Travele. All rights reserveds.
            </div>
        </div>
        <!-- Dashboard / End -->
    </div>
    <!-- end Container Wrapper -->
    <!-- *Scripts* -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../../../cdn.jsdelivr.net/npm/popper.js%401.16.0/dist/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/canvasjs.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/dashboard-custom.js"></script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'89bdb51eef86971b',t:'MTcxOTc0NTgwMi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../../cdn-cgi/challenge-platform/h/g/scripts/jsd/d2a97f6b6ec9/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"89bdb51eef86971b","version":"2024.4.1","r":1,"token":"2aaac9563824454ba89abdea91540009","b":1}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from demo.bosathemes.com/html/travele/admin/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 Jun 2024 11:13:47 GMT -->
</html>