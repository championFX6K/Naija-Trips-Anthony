<?php
session_start();
include "header.php";
?>
<div class="db-info-wrap db-add-tour-wrap">
    <div class="row">
        <!-- Listings -->
        <div class="col-lg-8 col-xl-9">
            <div class="dashboard-box">
                <div class="custom-field-wrap">
                    <form action="addTourGuideScript.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="row">
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="tel" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Agent state</label>
                                            <select id="agstate" name="agentstate" class="form-control">
                                <option value="">...Select state...</option>
                                <option value="Abia">Abia</option>
                                <option value="Adamawa">Adamawa</option>
                                <option value="Akwa Ibom">Akwa Ibom</option>
                                <option value="Anambra">Anambra</option>
                                <option value="Bauchi">Bauchi</option>
                                <option value="Bayelsa">Bayelsa</option>
                                <option value="Benue">Benue</option>
                                <option value="Borno">Borno</option>
                                <option value="Cross River">Cross River</option>
                                <option value="Delta">Delta</option>
                                <option value="Ebonyi">Ebonyi</option>
                                <option value="Edo">Edo</option>
                                <option value="Ekiti">Ekiti</option>
                                <option value="Enugu">Enugu</option>
                                <option value="Gombe">Gombe</option>
                                <option value="Imo">Imo</option>
                                <option value="Jigawa">Jigawa</option>
                                <option value="Kaduna">Kaduna</option>
                                <option value="Kano">Kano</option>
                                <option value="Katsina">Katsina</option>
                                <option value="Kebbi">Kebbi</option>
                                <option value="Kogi">Kogi</option>
                                <option value="Kwara">Kwara</option>
                                <option value="Lagos">Lagos</option>
                                <option value="Nasarawa">Nasarawa</option>
                                <option value="Niger">Niger</option>
                                <option value="Ogun">Ogun</option>
                                <option value="Ondo">Ondo</option>
                                <option value="Osun">Osun</option>
                                <option value="Oyo">Oyo</option>
                                <option value="Plateau">Plateau</option>
                                <option value="Rivers">Rivers</option>
                                <option value="Sokoto">Sokoto</option>
                                <option value="Taraba">Taraba</option>
                                <option value="Yobe">Yobe</option>
                                <option value="Zamfara">Zamfara</option>
                                <option value="FCT">Federal Capital Territory</option>
                            </select>
                                        </div>
                                    </div>
                                </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="agent_role">Agent Role </label>
                                    <select id="agent_role" name="agent_role" class="form-control" required>
                                        <option value="">Select the agent role</option>
                                        <option value="Tour Guide">Tour Guide</option>
                                        <option value="Travel Agent">Travel Agent</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agent_characteristics">Agent Characteristics</label>
                            <div id="agent_characteristics">
                                <label class="custom-input">
                                    <input type="checkbox" name="characteristics[]" value="Historical">
                                    <span class="custom-input-field"></span>
                                    Historical
                                </label>
                                <label class="custom-input">
                                    <input type="checkbox" name="characteristics[]" value="Adventurous">
                                    <span class="custom-input-field"></span>
                                    Adventurous
                                </label>
                                <label class="custom-input">
                                    <input type="checkbox" name="characteristics[]" value="Cultural">
                                    <span class="custom-input-field"></span>
                                    Cultural
                                </label>
                                <label class="custom-input">
                                    <input type="checkbox" name="characteristics[]" value="Storytelling">
                                    <span class="custom-input-field"></span>
                                    Storytelling
                                </label>
                                <label class="custom-input">
                                    <input type="checkbox" name="characteristics[]" value="Educational">
                                    <span class="custom-input-field"></span>
                                    Educational
                                </label>
                                <label class="custom-input">
                                    <input type="checkbox" name="characteristics[]" value="Experiential">
                                    <span class="custom-input-field"></span>
                                    Experiential
                                </label>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="description">Short Agent Description</label>
                            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
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
                                                <input type="file" name="tourimg" class="form-control" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Tour Guide</button>
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
