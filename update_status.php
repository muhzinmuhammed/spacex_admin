<?php
require_once './config.php'; // Your Firebase configuration file
require_once './firebaseRDB.php'; // FirebaseRDB class file

// Initialize the FirebaseRDB class
$db = new firebaseRDB($databaseURL);

if (isset($_GET['id'])) {
    $propertyId = $_GET['id'];

    try {
        // Fetch current property data
        $response = $db->retrieve("properties/$propertyId");
        $property = json_decode($response, true);

        if ($property) {
            // Update status to true
            $property['status'] = true;

            // Update the property in the database
            $db->update("properties", $propertyId, $property);

            // Redirect back to the property listing page
            header("Location: admin.php"); // Replace with your actual listing page
            exit();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
