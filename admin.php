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
<?php
$countFalseStatus = count(array_filter($properties, function($property) {
    return $property['status'] == false;
}));
$countTrueStatus=count(array_filter($properties, function($property) {
    return $property['status'] == true;
}));
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
						
                            
				</nav>
			</header>
			<!-- /Header -->

            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <div class="container">
                    <div class="bread-crumb-head">
                        <div class="breadcrumb-title">
                            <h2>Admin dashboard</h2>
                        </div>
                        <div class="breadcrumb-list">
                            
                        </div>
                    </div>
                    <div class="breadcrumb-border-img">
                        <img src="assets/img/bg/line-bg.png" class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
            <!-- Breadcrumb -->

            <!-- Content -->
			<div class="listing-section">
				<div class="container">

					

					<div class="row">

                        

                        <!-- Agent -->
						<div class="col-lg-4 col-md-6 d-flex">                           
                            <div class="agent-card card flex-fill">
                                <div class="agent-img">
                                    <a href="agent-details.php" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/agents/agent-02.jpg">
                                    </a>
                                    <div class="list-feature">
									<span><?php echo $countFalseStatus; ?> Requests</span>
                                    </div>
                                </div>
                                <div class="agent-content">
                                   
                                    <!-- <h6>
                                        <a href="property-list.html">Verification</a> 
									</h6> -->
                                    <!-- <p><i class="bx bx-user-voice"></i>Buying Agent</p> -->
                                </div>	
                            </div>
						</div>
                        <!-- /Agent -->

                        <!-- Agent -->
						<div class="col-lg-4 col-md-6 d-flex">                           
                            <div class="agent-card card flex-fill">
                                <div class="agent-img">
                                    <a href="property-details.php" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/agents/agent-03.jpg">
                                    </a>
                                    <div class="list-feature">
                                        <span><?php echo ($countTrueStatus); ?> Properties</span>
                                    </div>
                                </div>
                                <div class="agent-content">
                                   
                                    <h6>
                                        <a href="admin_aprroved_propety.html">Properties</a> 
									</h6>
                                    <!-- <p><i class="bx bx-user-voice"></i>Selling Agent</p> -->
                                </div>	
                            </div>
						</div>
                        <!-- /Agent -->
	<div class="col-lg-4 col-md-6 d-flex">                           
                            <div class="agent-card card flex-fill">
                                <div class="agent-img">
                                    <a href="agent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/agents/agent-03.jpg">
                                    </a>
                                   
                                </div>
                                <div class="agent-content">
                                   
                                    <h6>
                                        <a href="admin_aprroved_propety.html">commission</a> 
									</h6>
                                    <!-- <p><i class="bx bx-user-voice"></i>Selling Agent</p> -->
                                </div>	
                            </div>
						</div>
                        <!-- Agent -->
						
                        <!-- /Agent -->

                        <!-- Agent -->
						
                        <!-- /Agent -->
                        
                        <!-- Agent -->
						
                        <!-- /Agent -->
					</div>
				</div>
			</div>
			<!-- /Content -->


			<!-- Footer -->
			<footer class="footer">
				<!-- Footer Top -->
				
				<!-- /Footer Top -->
				<!-- Footer Bottom -->
				
				<!-- /Footer Bottom -->
			</footer>
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

		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
	
	</body>
</html>