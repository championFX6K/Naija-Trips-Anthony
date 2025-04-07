<?php
   
   include 'header.php';
       
   ?>
         <main id="content" class="site-main">
            <!-- Inner Banner html start-->
            <section class="inner-banner-wrap">
               <div class="inner-baner-container" style="background-image: url(assets/images/tarkwa.jpg);">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title">Destination</h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"></div>
            </section>
            <!-- Inner Banner html end-->
            <!-- destination field html end -->
            <section class="destination-section destination-page">
               <div class="container">
                  <div class="destination-inner destination-three-column">
                     <div class="row">
                        <div class="col-lg-7">
                           <div class="row">
                           <?php
    include 'connection.php';

    // Query to fetch destinations
    $query = "SELECT * FROM destinations";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
                               <div class="col-sm-6">
                <div class="desti-item overlay-desti-item">
                    <figure class="desti-image">
                    <img src="admin/assets/uploads/destinations/<?php echo htmlspecialchars($row['destinationImg']); ?>" alt="<?php echo htmlspecialchars($row['destination']); ?>">
                    </figure>
                    <div class="meta-cat bg-meta-cat">
                        <a href="#"><?php echo htmlspecialchars($row['state']); ?></a>
                    </div>
                    <div class="desti-content">
                        <h3><?php echo htmlspecialchars($row['destination']); ?></h3>
                        <a href="booking.php"><button>Visit</button></a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>No destinations found.</p>";
    }

    $conn->close();
    ?>
</div>
                              
                           </div>
                        </div>
                        <div class="col-lg-5">
                           
                        </div>
                     </div>
                     <!-- <div class="row">
                        <div class="col-lg-5">
                           <div class="row">
                              <div class="col-md-6 col-xl-12">
                                 <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                       <img src="assets/images/cross.jpg" alt="">
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                       <a href="#">CROSS RIVERS STATE</a>
                                    </div>
                                    <div class="desti-content">
                                       <h3>
                                          <a href="#">Obudu Mountain Resort</a>
                                       </h3>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 col-xl-12">
                                 <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                       <img src="assets/images/oyo.jpg" alt="">
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                       <a href="#">OYO STATE</a>
                                    </div>
                                    <div class="desti-content">
                                       <h3>
                                          <a href="#">Agodi Gardens</a>
                                       </h3>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-7">
                           <div class="row">
                              <div class="col-sm-6">
                                 <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                       <img src="assets/images/kano.jpg" alt="">
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                       <a href="#">KANO STATE</a>
                                    </div>
                                    <div class="desti-content">
                                       <h3>
                                          <a href="#"> Kano City Walls</a>
                                       </h3>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                       <img src="assets/images/bauchi.jpg" alt="">
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                       <a href="#">BAUCHI STATE</a>
                                    </div>
                                    <div class="desti-content">
                                       <h3>
                                          <a href="#">Yankari Game Reserve</a>
                                       </h3>
                                       <div class="rating-start" title="Rated 5 out of 5">
                                          <span style="width: 100%"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> -->
                  </div>
               </div>
            </section>
            <!-- destination section html start -->
         </main>
         <?php
            include 'footer.php';
            ?>