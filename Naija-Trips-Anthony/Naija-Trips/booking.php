
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "You must log in first to view this page.";
    header("Location: login.php");
    exit();
}
?>

<?php
include 'header.php';
?>

<!-- Inner Banner html start-->
<section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url(assets/images/inner-banner.jpg);">
        <div class="container">
            <div class="inner-banner-content">
                <h1 class="inner-title">Booking</h1>
            </div>
        </div>
    </div>
    <div class="inner-shape"></div>
</section>

            
   <div class="row">
    <div class="col-lg-8 right-sidebar">
        <!-- Booking form HTML start -->
        <div class="booking-form-wrap">
            <div class="booking-content">
                <!-- <div class="form-title">
                    <h3>Your Details</h3>
                </div> -->
                <!-- <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First name*</label>
                            <input type="text" class="form-control" name="firstname_booking">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last name*</label>
                            <input type="text" class="form-control" name="lastname_booking">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" class="form-control" name="email_booking">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Confirm Email*</label>
                            <input type="email" class="form-control" name="confirm_email_booking">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone*</label>
                            <input type="text" class="form-control" name="phone_booking">
                        </div>
                    </div>
                </div> -->
                <div class="form-title">
                    <h3>Travel Details</h3>
                </div>
                <form action="bookingScript.php" method="post">

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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="currentlocation">From*</label>
                            <select id="from" name="from" class="form-control">
                                <option value="">...From...</option>
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="destination">Destination*</label>
                            <select id="destination" name="destination" class="form-control">
                                <option value="">...Select Destination...</option>
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hotels*</label>
                            <select id="hotels" name="hotels" class="form-control">
                                <!-- Hotels will be populated here based on the selected destination -->
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tourist Centers</label>
                            <input type="text" class="form-control" name="tourist_centers" placeholder="Input tourist sites you want to visit separated by a comma">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tour Guide Based Off Preference*</label>
                            <div>
                                <label class="checkbox-list"><input class='custom-checkbox' type="checkbox" name="tourGuide[]" value="Historical"> Historical<span class="custom-checkbox"></span></label>
                                <label class="checkbox-list"><input type="checkbox" name="tourGuide[]" value="Cultural"> Cultural<span class="custom-checkbox"></span></label>
                                <label class="checkbox-list"><input type="checkbox" name="tourGuide[]" value="Adventure"> Adventure <span class="custom-checkbox"></span></label>
                                <label class="checkbox-list"><input type="checkbox" name="tourGuide[]" value="Adventure"> Educaional <span class="custom-checkbox"></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                            <div class="form-group">
                                <label>Suggested Tour Guide</label>
                                <select id="suggestedTourGuide" name="suggested_tour_guide" class="form-control">
                                    <!-- Suggested tour guides will be populated here -->
                                </select>
                            </div>
                        </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Means of Transportation*</label>
                            <select class="form-control" name="transportation">
                                <option value="Plane">Plane</option>
                                <option value="Car">Car</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Number of People*</label>
                            <input type="number" class="form-control" name="num_people">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="checkbox-list">
                                <input type="checkbox" name="children"> Are there any children among?
                                <span class="custom-checkbox"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Checkin Date*</label>
                            <input class="form-control input-date-picker" type="text" name="checkin" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Checkout Date*</label>
                            <input class="form-control input-date-picker" type="text" name="checkout" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="screen-reader-text">Search</label>
                            <input type="submit" class="btn btn-primary" name="travel-search" value="INQUIRE NOW">
                        </div>
                    </div>
                </div>
            </div>
        </form>
            
            
        </div>
        <!-- Booking form HTML end -->
    </div>
</div>


<script>
    // Script to populate hotels based on selected destination
    document.getElementById('destination').addEventListener('change', function() {
        var destination = this.value;
        var hotelsDropdown = document.getElementById('hotels');
        hotelsDropdown.innerHTML = '';

        // Assuming you have an array of hotels for each state
        var hotels = {
    'Abia': [
        'Vatican City Hotel & Suites', 
        'Enitona Hotel', 
        'Hotel Terminus', 
        'Hotel Du Golf', 
        'Evergreen Hotel'
    ],
    'Adamawa': [
        'Lelewa Hotel', 
        'Muna Hotel', 
        'Duragi Hotel', 
        'Lakeview Resort Centre', 
        'Sunshine Hotel'
    ],
    'Akwa Ibom': [
        'Ibom Hotel & Golf Resort', 
        'Monty Suites', 
        'Hotel Vendome', 
        'Eemjm Hotel', 
        'Rosmohr Hotels'
    ],
    'Anambra': [
        'Soprom Hotel & Suites', 
        'Stanzel Grand Resort Hotel', 
        'Nondon International Hotel', 
        'Rosan Hotels', 
        'California Garden Hotel'
    ],
    'Bauchi': [
        'Yankari Game Reserve and Resort', 
        'Zaranda Hotel', 
        'Sultil Suites', 
        'Awalah Hotel', 
        'Pathfinder Hotel and Holiday Inn'
    ],
    'Bayelsa': [
        'Aridolf Resort Wellness and Spa', 
        'De Edge Hotel', 
        'Krisdera Hotels', 
        'Ayalla Hotel', 
        'Golden Tulip'
    ],
    'Benue': [
        'Dooshima Suite', 
        'Makurdi Luxury Hotel', 
        'Happy Home Resort', 
        'Smile View Hotel', 
        'Double K Resort'
    ],
    'Borno': [
        'Bagauda Lake Hotel', 
        'Sanda Kyarimi Hotel', 
        'Lake Chad Hotel', 
        'Barwee Luxury Suites', 
        'Royal Palace Hotel'
    ],
    'Cross River': [
        'Transcorp Hotels Calabar', 
        'Tinapa Lakeside Hotel', 
        'Jacaranda Suites', 
        'Marian Hotels', 
        'Channel View Hotel'
    ],
    'Delta': [
        'Bon Hotel Delta', 
        'Golden Tulip Warri Airport Hotel', 
        'Kayriott Hotel & Suites', 
        'Topview Hotel', 
        'BB Hotels'
    ],
    'Ebonyi': [
        'Salt Spring Resort', 
        'Osborn La Palm Royal Resort', 
        'San Diego Hotels', 
        'Abakaliki Royal Palace Hotel', 
        'Princess Luxury Hotel'
    ],
    'Edo': [
        'Protea Hotel by Marriott Benin City', 
        'Constantial Hotel', 
        'Royal Marble Hotel', 
        'Best Western Homeville', 
        'Randekhi Royal Hotel'
    ],
    'Ekiti': [
        'Ikogosi Warm Springs Resort', 
        'Pathfinder Hotel & Holiday Inn', 
        'Valley Guest House', 
        'Midas Hotel', 
        'Kayegbo Hotels'
    ],
    'Enugu': [
        'Nike Lake Resort', 
        'Hotel Sunshine', 
        'Bridgewaters Hotel', 
        'The Gate Luxury Apartment', 
        'Universal Hotel'
    ],
    'Gombe': [
        'Gombe Jewel Hotel', 
        'Mai Kaltungo Guest Palace', 
        'Grand Pinnacle Luxury', 
        'Halibiz Hotel', 
        'Cilia Crest Hotel'
    ],
    'Imo': [
        'Rockview Hotels', 
        'All Seasons Hotel', 
        'Citi Hotel Owerri', 
        'Imo Concorde Hotel', 
        'Owerri Hotel Plaza'
    ],
    'Jigawa': [
        'Three Star Hotel Dutse', 
        'Aminu Kano Guest Inn', 
        'Zodiac Hotels', 
        'Musty Hotels', 
        'Samiya Hotels'
    ],
    'Kaduna': [
        'Asaa Pyramid Hotel', 
        'Trophy Hotel', 
        'Lords and Ladies Resort', 
        'Green Suites Villa', 
        'Hotel Seventeen'
    ],
    'Kano': [
        'Bristol Palace Hotel', 
        'Prince Hotel', 
        'Tahir Guest Palace', 
        'Royal Tropicana Hotel', 
        'R&K Guest Palace'
    ],
    'Katsina': [
        'Fadama View Hotel', 
        'Liyafa Palace Hotel', 
        'State Hotel', 
        'Silk Suites', 
        'Durbar Hotel'
    ],
    'Kebbi': [
        'Gesse Hotel', 
        'Halal Fountain Hotel', 
        'Grand Pinnacle Luxury Suite', 
        'Hafsat Emblem Hotel', 
        'Safaz Suites'
    ],
    'Kogi': [
        'Confluence Beach Hotel', 
        'Sachi Suites', 
        'Halims Hotel', 
        'Lord Lugard House', 
        'Rehoboth Hotel'
    ],
    'Kwara': [
        'Kwara Hotel', 
        'Princess Luxury Hotel', 
        'Crystal House International Hotel', 
        'Nimota Suites', 
        'Suitoria Hotels'
    ],
    'Lagos': [
        'Eko Hotel and Suites', 
        'Radisson Blu Anchorage Hotel', 
        'Lagos Continental Hotel', 
        'Southern Sun Ikoyi', 
        'The Wheatbaker'
    ],
    'Nasarawa': [
        'Ta’al Conference Hotel', 
        'Pinnacle Hotels', 
        'Keana Resort', 
        'Andi Maddox Hotel', 
        'Gidado Hotel'
    ],
    'Niger': [
        'Niger State Hotel', 
        'Central Hotel Minna', 
        'Safara Motel', 
        'Grand Pinnacle Luxury Suites', 
        'Al Amin Hotels'
    ],
    'Ogun': [
        'Park Inn by Radisson Abeokuta', 
        'Conference Hotel & Suites Sagamu', 
        'Green Legacy Resort', 
        'Abeokuta Hilltop Hotel', 
        'Richton Hotel and Suites'
    ],
    'Ondo': [
        'Sunview Hotel', 
        'Grand Capital Hotel', 
        'Hillview Hotel Akure', 
        'Royal Birds Hotel', 
        'Bliss World Hotel'
    ],
    'Osun': [
        'Ideal Nest Hotel', 
        'Western Sun International Hotel', 
        'Atlantis Grand Suites', 
        'Spring Hill Hotel', 
        'Adolak Hotel & Suites'
    ],
    'Oyo': [
        'Golden Tulip Ibadan', 
        'Premier Hotel', 
        'Kakanfo Inn and Conference Centre', 
        'Capital Inn Plus', 
        'Bayse One Premium'
    ],
    'Plateau': [
        'Stefano Hotels', 
        'Hill Station Hotel', 
        'Elim Top Suites', 
        'Valada Hotel and Resorts', 
        'Silversand Hotel'
    ],
    'Rivers': [
        'Le Meridien Ogeyi Place', 
        'Hotel Presidential', 
        'Golden Tulip Port Harcourt', 
        'Novotel Port Harcourt', 
        'Swiss Spirit Hotel & Suites Danag'
    ],
    'Sokoto': [
        'Dankani Guest Palace', 
        'Giginya Hotel', 
        'Shukura Coral Hotel', 
        'Grand Ibro Hotel', 
        'Afdin Hotel'
    ],
    'Taraba': [
        'Savannah Suites', 
        'Jalingo Motel', 
        'Jolly Nyame Stadium Hotel', 
        'Mai Dabino Hotel', 
        'Coronation Lodge'
    ],
    'Yobe': [
        'New State Hotels', 
        'Aminu Kano Guest House', 
        'Fawaq Hotel', 
        'Buni Yadi Hotel', 
        'Sunshine Hotel'
    ],
    'Zamfara': [
        'Newman Hotel', 
        'Al Hakiem Hotel', 
        'Kanawa Guest Inn', 
        'Sunflower Hotel', 
        'Grand Pinnacle Luxury Suites'
    ]
};


        if (hotels[destination]) {
            hotels[destination].forEach(function(hotel) {
                var option = document.createElement('option');
                option.value = hotel;
                option.text = hotel;
                hotelsDropdown.add(option);
            });
        }
    });

  
    document.querySelectorAll('input[name="tourGuide[]"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var selectedPreferences = Array.from(document.querySelectorAll('input[name="tourGuide[]"]:checked')).map(function(cb) {
                return cb.value;
            });

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'fetchTourGuides.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var suggestedTourGuideDropdown = document.getElementById('suggestedTourGuide');
                    suggestedTourGuideDropdown.innerHTML = xhr.responseText;
                }
            };
            xhr.send('preferences=' + JSON.stringify(selectedPreferences));
        });
    });


</script>
<?php
       include 'footer.php';
   ?>