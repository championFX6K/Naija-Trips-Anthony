<?php
   include "header.php";
   
?>
         <main id="content" class="site-main">
            <!-- Home slider html start -->
            <section class="home-slider-section">
               <div class="home-slider">
                  <div class="home-banner-items">
                     <div class="banner-inner-wrap" style="background-image: url(assets/images/home.jpg);"></div>
                        <div class="banner-content-wrap">
                           <div class="container">
                              <div class="banner-content text-center">
                                 <h2 class="banner-title">Discover the Beauty of Nigeria with Us!</h2>
                                 <p>Welcome to Naija Trips, your ultimate gateway to the most captivating travel experiences within Nigeria. Whether you're seeking adventure, cultural immersion, or serene relaxation, Nigeria offers a diverse range of attractions that promise unforgettable memories.</p>
                                 <!-- <a href="#" class="button-primary">CONTINUE READING</a> -->
                              </div>
                           </div>
                        </div>
                     <div class="overlay"></div>
                  </div>
                  <div class="home-banner-items">
                     <div class="banner-inner-wrap" style="background-image: url(assets/images/home-2.jpg);"></div>
                        <div class="banner-content-wrap">
                           <div class="container">
                              <div class="banner-content text-center">
                                 <h2 class="banner-title">Experience the Nature's Beauty!</h2>
                                 <p>Welcome to Naija Trips, your ultimate gateway to the most captivating travel experiences within Nigeria. Whether you're seeking adventure, cultural immersion, or serene relaxation, Nigeria offers a diverse range of attractions that promise unforgettable memories.</p>
                                 <a href="#" class="button-primary">CONTINUE READING</a>
                              </div>
                           </div>
                        </div>
                     <div class="overlay"></div>
                  </div>
               </div>
            </section>
            <!-- search search field html end -->
            <section class="destination-section">
               <div class="container">
                  <div class="section-heading">
                     <div class="row align-items-end">
                        <div class="col-lg-7">
                           <br><br><h5 class="dash-style">POPULAR DESTINATION</h5></br></br>
                           <h2>TOP NOTCH DESTINATION</h2>
                        </div>
                        <div class="col-lg-5">
                           <div class="section-disc">
                              At Explore Nigeria Tours, we are passionate about showcasing the rich heritage, vibrant cultures, and stunning landscapes of Nigeria. Our expertly curated tours ensure that you experience the best our beautiful country has to offer.
                           </div>
                        </div>
                     </div>
                  </div>
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
                     <div class="btn-wrap text-center">
                        <!-- <a href="#" class="button-primary">MORE DESTINATION</a> -->
                     </div>
                  </div>
               </div>
            </section>
            <!-- Home callback section html start -->
            <section class="callback-section">
               <div class="container">
                  <div class="row no-gutters align-items-center">
                     <div class="col-lg-5">
                        <div class="callback-img" style="background-image: url(assets/images/people.jpg);">
                        </div>
                     </div>
                     <div class="col-lg-7">
                        <div class="callback-inner">
                           <div class="section-heading section-heading-white">
                              <h5 class="dash-style">CALLBACK FOR MORE</h5>
                              <h2>GO TRAVEL. DISCOVER. REMEMBER US!!</h2>
                              <p>We pride ourselves on providing personalized service to meet your travel needs. Our experienced guides, comfortable transportation, and thoughtfully designed itineraries ensure a seamless and enjoyable journey.</p>
                           </div>
                           <div class="callback-counter-wrap">
                              <div class="counter-item">
                                 <div class="counter-icon">
                                   <img src="assets/images/icon1.png" alt="">
                                 </div>
                                 <div class="counter-content">
                                    <span class="counter-no">
                                       <span class="counter">500</span>K+
                                    </span>
                                    <span class="counter-text">
                                       Satisfied Clients
                                    </span>
                                 </div>
                              </div>
                              <div class="counter-item">
                                 <div class="counter-icon">
                                   <img src="assets/images/icon2.png" alt="">
                                 </div>
                                 <div class="counter-content">
                                    <span class="counter-no">
                                       <span class="counter">250</span>K+
                                    </span>
                                    <span class="counter-text">
                                       Satisfied Clients
                                    </span>
                                 </div>
                              </div>
                              <div class="counter-item">
                                 <div class="counter-icon">
                                   <img src="assets/images/icon3.png" alt="">
                                 </div>
                                 <div class="counter-content">
                                    <span class="counter-no">
                                       <span class="counter">15</span>K+
                                    </span>
                                    <span class="counter-text">
                                       Satisfied Clients
                                    </span>
                                 </div>
                              </div>
                              <div class="counter-item">
                                 <div class="counter-icon">
                                   <img src="assets/images/icon4.png" alt="">
                                 </div>
                                 <div class="counter-content">
                                    <span class="counter-no">
                                       <span class="counter">10</span>K+
                                    </span>
                                    <span class="counter-text">
                                       Satisfied Clients
                                    </span>
                                 </div>
                              </div>
                           </div>
                           <div class="support-area">
                              <div class="support-icon">
                                 <img src="assets/images/icon5.png" alt="">
                              </div>
                              <div class="support-content">
                                 <h4>Our 24/7 Emergency Phone Services</h4>
                                 <h3>
                                    <a href="#">Call: +234 812 431 4421</a>
                                 </h3>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- callback html end -->
            <!-- Home activity section html start -->
            <section class="activity-section">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5 class="dash-style">TRAVEL BY ACTIVITY</h5>
                           <h2>ADVENTURE & ACTIVITY</h2>
                           <p>Dive into thrilling adventures across Nigeria! From hiking the lush trails of Obudu Mountain Resort to exploring the mysterious Ogbunike Caves, Nigeria offers endless activities for adrenaline seekers.</p>
                        </div>
                     </div>
                  </div>
                  <div class="activity-inner row">
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="assets/images/icon6.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="#">Adventure</a>
                              </h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="assets/images/icon10.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="#">Trekking</a>
                              </h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="assets/images/icon9.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="#">Camp Fire</a>
                              </h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="assets/images/icon8.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="#">Off Road</a>
                              </h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="assets/images/icon7.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="#">Camping</a>
                              </h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="assets/images/icon11.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="#">Exploring</a>
                              </h4>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- activity html end -->

            <!-- Home special section html start -->
            <section class="best-section">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-5">
                        <div class="section-heading">
                           <h5 class="dash-style">OUR TOUR GALLERY</h5>
                           <h2>BEST TRAVELER'S SHARED PHOTOS</h2>
                           <p>Experience Nigeria through the eyes of our travelers! Our gallery features stunning photos shared by adventurers who have explored the country's diverse landscapes and vibrant cultures.</p>
                        </div>
                        <figure class="gallery-img">
                           <img src="assets/images/lagos.jpg" alt="">
                        </figure>
                     </div>
                     <div class="col-lg-7">
                        <div class="row">
                           <div class="col-sm-6">
                              <figure class="gallery-img">
                                 <img src="assets/images/kano.jpg" alt="">
                              </figure>
                           </div>
                           <div class="col-sm-6">
                              <figure class="gallery-img">
                                 <img src="assets/images/osun.jpg" alt="">
                              </figure>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <figure class="gallery-img">
                                 <img src="assets/images/bauchi.jpg" alt="">
                              </figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- best html end -->

             <!-- Home testimonial section html start -->
            <br><div class="testimonial-section" style="background-image: url(assets/images/img23.jpg);"></br>
               <div class="container">
                  <div class="row">
                     <div class="col-lg-10 offset-lg-1">
                        <div class="testimonial-inner testimonial-slider">
                           <div class="testimonial-item text-center">
                              <figure class="testimonial-img">
                                 <img src="assets/images/img20.jpg" alt="">
                              </figure>
                              <div class="testimonial-content">
                                 <p>"Exploring Nigeria with Naija Trips was incredible! The highlight was definitely the serene beauty of Obudu Mountain Resort. Our guide was knowledgeable and made the trip unforgettable."</p>
                                 <cite>
                                    Johny English
                                    <span class="company">Travel Agent</span>
                                 </cite>
                              </div>
                           </div>
                           <div class="testimonial-item text-center">
                              <figure class="testimonial-img">
                                 <img src="assets/images/img21.jpg" alt="">
                              </figure>
                              <div class="testimonial-content">
                                 <p>"From the vibrant culture of Lagos to the breathtaking Erin Ijesha Waterfalls, every moment was filled with wonder. The service was top-notch, and I can't wait to book another adventure!"</p>
                                 <cite>
                                    William Housten
                                    <span class="company">Traveller</span>
                                 </cite>
                              </div>
                           </div>
                           <div class="testimonial-item text-center">
                              <figure class="testimonial-img">
                                 <img src="assets/images/img22.jpg" alt="">
                              </figure>
                              <div class="testimonial-content">
                                 <p>"Yankari National Park's safari was a dream come true! We saw elephants and other wildlife up close. The entire trip was well-organized and exceeded all my expectations."</p>
                                 <cite>
                                    Alison Wright
                                    <span class="company">Traveller</span>
                                 </cite>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </main>

         <?php
            include 'footer.php';
            ?>