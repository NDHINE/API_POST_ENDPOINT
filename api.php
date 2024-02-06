<?php
    $host="localhost";
    $user="root";
	$password="";
	$dbname="airflow";

	
// Create connection
$conn = new mysqli($host, $user, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
       
       
		$First_Name=$_POST['First_Name'];
		$Last_Name=$_POST['Last_Name'];
		$Age=$_POST['Age'];
		$DOB=$_POST['DOB'];
		$Gender=$_POST['Gender'];
		
		
               
		$sql="INSERT INTO bio_data( First_Name,Last_Name,Age, DOB, Gender)
	    VALUES( '$First_Name', '$Last_Name','$Age', '$DOB', '$Gender')";

if ($conn->query($sql) === TRUE) {
	 echo "<script>alert('Success: Data inserted successfully'); window.location='home.php';</script>";
	
} else {

	echo "you are not registered";
    echo "Error: " . $sql . "<br>" . $conn->error;

}
$conn->close();
?>