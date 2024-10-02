
<?php
require_once './config.php'; // Your Firebase configuration file
require_once './firebaseRDB.php'; // FirebaseRDB class file

// Initialize the FirebaseRDB class
$db = new firebaseRDB($databaseURL);

// Get the key from the URL parameter
$key = isset($_GET['id']) ? $_GET['id'] : null;

if ($key) {
    try {
        // Fetch data from the 'properties' node using the key
        $response = $db->retrieve('properties/' . $key);

        // Decode the JSON response to an array
        $properties = json_decode($response, true);

        // Handle the case when properties is not found
        if (!$properties) {
            throw new Exception("properties not found");
        }
    }
    catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'No property key specified';
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>View details</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="assets/css/feather.css">

		<!-- Boxicons CSS -->
		<link rel="stylesheet" href="assets/plugins/boxicons/css/boxicons.min.css"> 

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">

	</head>		
	<body>

		<!-- Loader -->
		<div class="page-loader">
			<div class="page-loader-inner">
				<img src="assets/img/icons/loader.svg" alt="Loader">
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
			</div>
		</div>
		<!-- /Loader -->

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
            <header class="header header-trans">
                <nav class="navbar navbar-expand-lg header-nav">
                    <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
                            <span class="bar-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                        <a href="index.html" class="navbar-brand logo">
                            <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                        </a>
                    </div>
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="index.html" class="menu-logo">
                                <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                            </a>
                
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">
                           
                            <li class="has-submenu active">
                               
                                <ul class="submenu">
                                    <li class="has-submenu">
                                      
                                    </li>
                                  
                                </ul>
                            </li>
                           
                        </ul>
                    </div>
                   
                </nav>
            </header>
            <!-- /Header -->

            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <div class="container">
                    <div class="bread-crumb-head">
                        <div class="breadcrumb-title">
                            <h2>property Details</h2>
                        </div>
                        <div class="breadcrumb-list">
                          
                        </div>
                    </div>
                    <div class="breadcrumb-border-img">
                        <img src="assets/img/bg/line-bg.png" alt="Line Image">
                    </div>
                </div>
            </div>
            <!-- Breadcrumb -->

            <!-- Detail View Section -->
            <section class="buy-detailview">
                <div class="container">

					<!-- Details -->
                    <div class="row align-items-center page-head">
                        <div class="col-lg-8">
                            <div class="buy-btn">
                                <!-- <span class="buy">Buy</span> -->
                                <!-- <span class="appartment">Appartment</span> -->
                            </div>
                            <div class="page-title">
                                <!-- <h3>Modern Apartment in the City Center<span><img src="assets/img/icons/location-icon.svg" alt="Image"></span></h3> -->
                                <p><i class="feather-map-pin"></i><?php echo ($properties['city']) ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="latest-update">
                                <h5>Last Updated on : 15 Jan 2023</h5>
                                <p>₹ <?php echo ($properties['propertyPrice']) ?></p>
                              
                            </div>
                        </div>
                    </div>
					<!-- /Details -->

                    <div class="row">
                        <div class="col-lg-8">

							<!-- Slider -->
                            <div class="buy-details-col">
								<div class="rental-card">
								<div class="slider rental-slider">
									<div class="product-img">
										<img src="assets/img/rent/rent-detail-01.jpg" alt="Slider">
									</div>
									<div class="product-img">
										<img src="assets/img/rent/rent-detail-02.jpg" alt="Slider">
									</div>
									<div class="product-img">
										<img src="assets/img/rent/rent-detail-03.jpg" alt="Slider">
									</div>
									<div class="product-img">
										<img src="assets/img/rent/rent-detail-04.jpg" alt="Slider">
									</div>
									<div class="product-img">
										<img src="assets/img/rent/rent-detail-04.jpg" alt="Slider">
									</div>
									</div>
									<div class="slider slider-nav-thumbnails">
										<div><img src="assets/img/rent/rent-detail-01.jpg" alt="product image"></div>
										<div><img src="assets/img/rent/rent-detail-02.jpg" alt="product image"></div>
										<div><img src="assets/img/rent/rent-detail-03.jpg" alt="product image"></div>
										<div><img src="assets/img/rent/rent-detail-04.jpg" alt="product image"></div>
										<div><img src="assets/img/rent/rent-detail-04.jpg" alt="product image"></div>
									</div>
								</div>
							</div>
							<!-- /Slider -->

							<!-- Overview -->
							
							<!-- /Overview -->

							<!-- Overview -->
							<div class="collapse-card">
								<h4 class="card-title">
									<a class="collapsed" data-bs-toggle="collapse" href="#about" aria-expanded="false">Description</a>
								</h4>
								<div id="about" class="card-collapse collapse show">
									<div class="about-agent collapse-view">
										<p><?php echo($properties['description']) ?> <p>										   
									   <p></p>
									</div>
								</div>
							</div>
							
							<div class="collapse-card">
								<h4 class="card-title">
									<a class="collapsed" data-bs-toggle="collapse" href="#details" aria-expanded="false">Property Details</a>
								</h4>
								<div id="details" class="card-collapse collapse show  collapse-view">
									<div class="row">
										<div class="col-md-4">
											<ul class="property-details">
												<li>Property Id : <span> <?php echo ($properties['propertyId']) ?> </span></li>
												<li>Floors No : <span> <?php echo ($properties['noOfFloors']) ?></span></li> 
												<li>Year Built :  <span> 2005</span></li>
												
											</ul>
										</div>
										<div class="col-md-4">
											<ul class="property-details">
												
												<li>Table</table> : <span> <?php echo($properties['noOfTable']) ?></span></li> 
												<li>Chair : <span> <?php echo ($properties['noOfChairs']) ?></span></li>
												
											</ul>
										</div>
										<div class="col-md-4">
											<ul class="property-details">
												
												<li>Wifi: <span> <?php echo($properties['wifi']) ?></span></li> 
												<li>Bathroom : <span> <?php echo($properties['bathroom']) ?></span></li> 
												<li>Parking  : <span>Available</span></li> 
												
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- /Property Details -->
							<div class="collapse-card">
								<h4 class="card-title">
									<a class="collapsed" data-bs-toggle="collapse" href="#address" aria-expanded="false">Property Address</a>
								</h4>
								<div id="address" class="card-collapse collapse show  collapse-view">
									<ul class="property-address">
										<li>City : <span> <?php echo($properties['city']) ?></span></li>
										
										<li>State/County : <span> <?php echo($properties['countyState']) ?></span></li>
									
										<li>Zip : <span> <?php echo($properties['zipCode']) ?></span></li> 
										<li>Area : <span> <?php echo ($properties['landmark']) ?></span></li> 
									</ul>
								</div>
							</div>

							<!-- Amenities -->
							
							<!-- /Amenities -->

							<!-- Video -->
						
							<!-- /Video -->

							<!-- Map -->
							
							<!-- /Map -->

							<!-- Reviews -->
							
							<!-- /Reviews -->

						</div>

						<!-- Sidebar -->
						<div class="col-lg-4 theiaStickySidebar">
							<div class="right-sidebar">
								<a href="rental-order.html" class="btn btn-primary prop-book"><i class="bx bx-calendar"></i>Book Property</a>
								
								<!-- Enquiry -->
								
								<!-- /Enquiry -->

								<!-- Listing Owner Details -->
								<div class="sidebar-card">
									<div class="sidebar-card-title">
										<h5>Listing Owner Details</h5>
									</div>
									<div class="user-active bg-white p-0">
										<div class="user-img">
											<a href="javascript:void(0);"><img class="avatar" src="assets/img/profiles/avatar-03.jpg" alt="Image"></a>
										</div>
										<div class="user-name">
											<h4><a href="javascript:void(0);">John Collins</a></h4>
											
										</div>
									</div>
									<ul class="list-details">
										
										<li>No of Bookings<span>225</span></li>
										<li>Memeber on<span>15 Jan 2023</span></li>
										<li>Verification<span>Verified</span></li>
									</ul>
								</div>
								<!-- /Listing Owner Details -->

								<!-- Share Property -->
								
								<!-- /Share Property -->
								
							</div>
						</div>
						<!-- /Sidebar -->

                    </div>

					<!-- Similar Listings -->
					
					<!-- /Similar Listings -->

                </div>
            </section>
			<!-- /Detail View Section -->

			<!-- Footer -->
			
										</div>
									</div>
								</div>
							</div>
							
								</div>
							</div>
							
								</div>
							</div>
							
								</div>
							</div>
							
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Footer Top -->

				<!-- Footer Bottom -->
				<div class="footer-bottom">
					<div class="container">
						<div class="footer-bottom-content">
							<div class="copyright">
								<p>Copyright  2024 - All right reserved DreamsEstate</p>
							</div>
							<div class="company-logo">
								<p>a product of</p>
								<a href="https://dreamguystech.com/" target="_blank"><img src="assets/img/company-logo.png" alt="Logo"></a>
							</div>
						</div>						
					</div>
				</div>
				<!-- /Footer Bottom -->

			</footer>
			<!-- /Footer -->

			<!-- Search -->
			<!-- <div class="search-popup js-search-popup ">
				<a href="javascript:void(0);" class="close-button" id="search-close" aria-label="Close search">
					<i class="fa fa-close"></i>
				</a>
				<div class="popup-inner">
					<div class="inner-container">
						<form class="search-form" id="search-form" action="rent-property-grid.html">
							<h3>What Are You Looking for?</h3>
							<div class="search-form-box flex">
								<input type="text" class="search-input" placeholder="Type a  Keyword...." id="search-input" aria-label="Type to search" role="searchbox" autocomplete="off">
								<button type="submit" class="search-icon"><i class="bx bx-search"></i></button>
							</div>
							<h5>Popular Properties</h5>
							<ul>
								<li><a href="rent-property-grid.html">Beautiful Condo Room</a></li>
								<li><a href="rent-property-grid.html">Royal Apartment</a></li>
								<li><a href="rent-property-grid.html">Grand Villa House</a></li>
								<li><a href="rent-property-grid.html">Grand Mahaka</a></li>
								<li><a href="rent-property-grid.html">Lunaria Residence</a></li>
								<li><a href="rent-property-grid.html">Stephen Alexander Homes</a></li>
							</ul>
						</form>
					</div>
				</div>
			</div>	 -->
			<!-- /Search -->

		</div>		
		<!-- /Main Wrapper -->

		<!-- ScrollToTop -->
		<div class="progress-wrap active-progress">
			<svg class="progress-circle svg-content" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
			</svg>
		</div>
		<!-- /ScrollToTop -->
	
		<!-- jQuery -->
		<script src="assets/js/jquery-3.7.1.min.js"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="assets/js/feather.min.js"></script>

		<!-- Owl Carousel JS -->
		<script src="assets/js/owl.carousel.min.js"></script>

		<!-- Slick JS -->
		<script src="assets/plugins/slick/slick.js"></script>

		<!-- Sticky Sidebar JS -->
		<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
		<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
	
		<!-- Fancybox JS -->
		<script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
	
	</body>
</html>