
<?php

include "header.php";

// Assuming you have a database connection file
include "../connection.php";

// Get the agent details based on the agent ID passed in the URL
if (isset($_GET['id'])) {
    $agent_id = $_GET['id'];
    $query = "SELECT * FROM agents WHERE id = $agent_id";
    $result = mysqli_query($conn, $query);
    $agent = mysqli_fetch_assoc($result);
}

?>
<div class="db-info-wrap db-add-tour-wrap">
    <div class="row">
        <!-- Listings -->
        <div class="col-lg-8 col-xl-9">
            <div class="dashboard-box">
                <div class="custom-field-wrap">
                    <form action="updateTourGuideScript.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="agent_id" value="<?php echo $agent['id']; ?>">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo $agent['name']; ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" name="phone" value="<?php echo $agent['phone']; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Agent state</label>
                                    <select id="agstate" name="agentstate" class="form-control" required>
                                        <option value="">...Select state...</option>
                                        <?php
                                        $states = ["Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara", "FCT"];
                                        foreach ($states as $state) {
                                            $selected = ($agent['agentstate'] == $state) ? 'selected' : '';
                                            echo "<option value='$state' $selected>$state</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="agent_role">Agent Role</label>
                                    <select id="agent_role" name="agent_role" class="form-control" required>
                                        <option value="">Select the agent role</option>
                                        <option value="Tour Guide" <?php echo ($agent['agent_role'] == 'Tour Guide') ? 'selected' : ''; ?>>Tour Guide</option>
                                        <option value="Travel Agent" <?php echo ($agent['agent_role'] == 'Travel Agent') ? 'selected' : ''; ?>>Travel Agent</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="agent_characteristics">Agent Characteristics</label>
                            <div id="agent_characteristics">
                                <?php
                                $characteristics = ["Historical", "Adventurous", "Cultural", "Storytelling", "Educational", "Experiential"];
                                $agent_characteristics = explode(",", $agent['characteristics']);
                                foreach ($characteristics as $characteristic) {
                                    $checked = in_array($characteristic, $agent_characteristics) ? 'checked' : '';
                                    echo "<label class='custom-input'>
                                            <input type='checkbox' name='characteristics[]' value='$characteristic' $checked>
                                            <span class='custom-input-field'></span>
                                            $characteristic
                                          </label>";
                                }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Short Agent Description</label>
                            <textarea id="description" name="description" class="form-control" rows="4" required><?php echo $agent['description']; ?></textarea>
                        </div>

                        <div class="dashboard-box">
                            <h4>Agent Image</h4>
                            <div class="custom-field-wrap">
                                <div class="dragable-field">
                                    <div class="dragable-field-inner">
                                        <p class="drag-drop-info">Drop Files To Upload</p>
                                        <p>or</p>
                                        <div class="upload-input">
                                            <div class="form-group">
                                                <span class="upload-btn">Upload an image</span>
                                                <input type="file" name="tourimg" class="form-control" accept="image/*">
                                            </div>
                                            <?php if (!empty($agent['image'])): ?>
                                                <img src="uploads/<?php echo $agent['image']; ?>" alt="Agent Image" width="100">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Tour Guide</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->
    <!-- Copyrights -->
    <div class="copyrights">
       Copyright © 2021 Travele. All rights reserved.
    </div>
</div>
<!-- end Container Wrapper -->
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="../../../../cdn.jsdelivr.net/npm/popper.js%401.16.0/dist/umd/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/canvasjs.min.js"></script>
<script src="assets/js/counterup.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/dashboard-custom.js"></script>
<script>
    (function(){
        function c(){
            var b=a.contentDocument||a.contentWindow.document;
            if(b){
                var d=b.createElement('script');
                d.innerHTML="window.__CF$cv$params={r:'89bdba600a89971b',t:'MTcxOTc0NjAxNy4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../../cdn-cgi/challenge-platform/h/g/scripts/jsd/d2a97f6b6ec9/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                b.getElementsByTagName('head')[0].appendChild(d);
            }
        }
        if(document.body){
            var a=document.createElement('iframe');
            a.height=1;
            a.width=1;
            a.style.position='absolute';
            a.style.top=0;
            a.style.left=0;
            a.style.border='none';
            a.style.visibility='hidden';
            document.body.appendChild(a);
            if('loading'!==document.readyState)c();
            else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);
            else{
                var e=document.onreadystatechange||function(){};
                document.onreadystatechange=function(b){
                    e(b);
                    'loading'!==document.readyState&&(document.onreadystatechange=e,c());
                };
            }
        }
    })();
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"89bdba600a89971b","version":"2024.4.1","r":1,"token":"2aaac9563824454ba89abdea91540009","b":1}' crossorigin="anonymous"></script>
</body>
</html>
