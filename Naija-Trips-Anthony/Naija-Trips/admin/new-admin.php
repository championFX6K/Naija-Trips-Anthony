<?php
session_start();
include "header.php";
?>
            
            <div class="db-info-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dashboard-box">
                            <h4>Add New Admin</h4>
                            <p></p>
                            <?php
                
                if (isset($_SESSION["success"])) {
                    echo '<div style="background-color: #c3e6cb; padding: 10px; border: 1px solid #28a745; color: #155724; margin-bottom: 10px;">' . $_SESSION["success"] . '</div>';
                    unset($_SESSION["success"]);
                }

                if (isset($_SESSION["error"])) {
                    echo '<div style="background-color: #f8d7da; padding: 10px; border: 1px solid #dc3545; color: #721c24; margin-bottom: 10px;">' . $_SESSION["error"] . '</div>';
                    unset($_SESSION["error"]);
                }
            ?>
            <br>
                            <form class="form-horizontal" action="admin_register.php" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Full name</label>
                                            <input name="name" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Email</label>
                                            <input name="email" class="form-control" type="email" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>password</label>
                                            <input name="password" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input name="conpassword" class="form-control" type="passowrd">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <input type="submit" name="Submit" value="Add Admin">
                            </form>
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
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../../../cdn.jsdelivr.net/npm/popper.js%401.16.0/dist/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/canvasjs.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/dashboard-custom.js"></script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'89bdb525e9fcb8fc',t:'MTcxOTc0NTgwMy4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../../cdn-cgi/challenge-platform/h/g/scripts/jsd/d2a97f6b6ec9/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"89bdb525e9fcb8fc","version":"2024.4.1","r":1,"token":"2aaac9563824454ba89abdea91540009","b":1}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from demo.bosathemes.com/html/travele/admin/new-user.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 Jun 2024 11:13:47 GMT -->
</html>