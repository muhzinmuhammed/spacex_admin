
<?php
require_once './config.php'; // Your Firebase configuration file
require_once './firebaseRDB.php'; // FirebaseRDB class file

// Initialize the FirebaseRDB class
$db = new firebaseRDB($databaseURL);

try {
    // Fetch data from the 'properties' node
    $response = $db->retrieve('properties');

    // Decode the JSON response to an array
    $properties = json_decode($response, true);

    // Capture the keys (IDs) for each property
    $propertyIDs = array_keys($properties);
}
catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>DreamsEstate</title>
		
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
			<header class="header">
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
							
				</nav>
			</header>
			<!-- /Header -->

            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <div class="container">
                    <div class="bread-crumb-head">
                        <div class="breadcrumb-title">
                            <h2>Agent Details</h2>
                        </div>
                        <div class="breadcrumb-list">
                            <!-- <ul>
                                <li><a href="index.html">Home </a></li>
                                <li>Agent Details</li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="breadcrumb-border-img">
                        <img src="assets/img/bg/line-bg.png" alt="Line Image">
                    </div>
                </div>
            </div>
            <!-- Breadcrumb -->

            <!-- Detail View Section -->
            <section class="content inner-content">
                <div class="container">

					<!-- Details -->
                    <div class="details-wrap">
                        <div class="detail-user-wrap">
							
							<div class="user-wrap">
								<div class="user-info-wrap">
									<div class="detail-user-info">
										<div class="rating">
											<span class="rating-count">
												
										
										
									</div>
									
								</div>								
                                
							</div>
						</div>
                    </div>
					<!-- /Details -->

                    <div class="row">
                        <div class="col-lg-8">
							
                            <div class="agent-views">

								

								<!-- My Listings -->
								<h5 class="sub-title">My Listings</h5>
								<div class="list-card">
									<ul class="my-list nav">
										<li>
											<a href="#" class="active" data-bs-toggle="tab" data-bs-target="#property">All Properties ( 25 )</a>
										</li>
										<!-- <li>
											<a href="#" data-bs-toggle="tab" data-bs-target="#apartment">Apartments ( 15 )</a>
										</li>
										<li>
											<a href="#" data-bs-toggle="tab" data-bs-target="#condos">Condos ( 5 )</a>
										</li>
										<li>
											<a href="#" data-bs-toggle="tab" data-bs-target="#home">Home ( 5 )</a>
										</li> -->
									</ul>
								</div>
								<!-- /My Listings -->
								
								<div class="tab-content">
								
									<!-- Property -->
									<div class="tab-pane active" id="property">
    <!-- Rent Listings -->
    <div class="agentpro-list">
        <div class="agentview-slider owl-carousel feature-property-sec for-rent">
            <?php
            require_once './config.php'; // Your Firebase configuration file
            require_once './firebaseRDB.php'; // FirebaseRDB class file

            // Initialize the FirebaseRDB class
            $db = new firebaseRDB($databaseURL);

            try {
                // Fetch data from the 'properties' node
                $response = $db->retrieve('properties');

                // Decode the JSON response to an array
                $properties = json_decode($response, true);

                // Loop through properties and display those with status == false
                foreach ($properties as $key => $property) {
                    if ($property['status'] == false) { ?>
                        <div class="product-custom">
                            <div class="profile-widget">
                                <div class="pro-img">
                                    <a href="rent-details.html?id=<?php echo urlencode($key); ?>" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="./assets/img/product/product-7.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <h5><span>₹<?php echo htmlspecialchars($property['propertyPrice']); ?></span></h5>
                                    </div>
                                </div>
                                <div class="pro-content">
                                    <h3 class="title">
                                        <a href="rent-details.php?id=<?php echo urlencode($key); ?>"><?php echo htmlspecialchars($property['propertyName']); ?></a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> <?php echo htmlspecialchars($property['countyState']); ?></p>
									
                                    <button onclick="window.location.href='update_status.php?id=<?php echo urlencode($key); ?>'" class="btn-primary">Verify Property</button>


                                </div>
                            </div>
                        </div>
                    <?php }
                }
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
            ?>
        </div>
    </div>
    <!-- /Rent Listings -->		
</div>

									<!-- /Property -->
									
									<!-- Apartments -->
									<div class="tab-pane fade" id="apartment">
										<!-- Rent Listings -->
										
										<!-- /Rent Listings -->		
									</div>
									<!-- /Apartments -->
								
									
									<!-- Home -->
									
									<!-- /Home -->
									
								</div>

								

                            </div>
                        </div>

						<!-- Sidebar -->
						<div class="col-lg-4 theiaStickySidebar">
							<div class="right-sidebar">

								<!-- Enquire property -->
							
								<!-- /Enquire property -->

								<!-- Contact -->
								
								<!-- /Contact -->

								<!-- Share Property -->
							
								<!-- /Share Property -->

							</div>
						</div>
						<!-- Sidebar -->

                    </div>
					
                </div>
            </section>
			<!-- /Detail View Section -->

			<!-- Footer -->
		
			<!-- /Footer -->

			<!-- Search -->
			<div class="search-popup js-search-popup ">
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
			</div>	
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

		<!-- Sticky Sidebar JS -->
		<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
		<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
	
	</body>
</html>