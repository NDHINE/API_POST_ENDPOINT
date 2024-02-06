<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you want to receive JSON data in the request body
    $json_data = file_get_contents('php://input');
    
    // Decode the JSON data into an associative array
    $data = json_decode($json_data, true);

    // Check if all required fields are present
    if(isset($data['First_Name']) && isset($data['Last_Name']) && isset($data['Age']) && isset($data['DOB']) && isset($data['Gender'])) {
        // Database connection parameters
        $host = "localhost"; // Change this if your database is hosted elsewhere
        $username = "root"; // Change this to your MySQL username
        $password = ""; // Change this to your MySQL password
        $dbname = "airflow"; // Change this to your MySQL database name
        
        // Create a connection to the database
        $conn = new mysqli($host, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepare SQL statement to insert data
        $stmt = $conn->prepare("INSERT INTO bio_data (First_Name, Last_Name, Age, DOB, Gender) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $data['First_Name'], $data['Last_Name'], $data['Age'], $data['DOB'], $data['Gender']);
        
        // Execute the statement
        if ($stmt->execute()) {
            $response = array('success' => true, 'message' => 'User data inserted successfully');
           # header("Location: app.php");
        } else {
            $response = array('success' => false, 'message' => 'Error inserting user data');
        }
        
        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // If required fields are missing in the JSON data
        $response = array('success' => false, 'message' => 'Required fields missing');
    }

    // Set the content type to JSON
    header('Content-Type: application/json');
    
    // Encode the response array to JSON and output it
    echo json_encode($response);
} else {
    // If the request method is not POST, return an error
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>
