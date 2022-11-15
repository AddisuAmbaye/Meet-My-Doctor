<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


	@$Name = $_POST['name'];
	@$Email = $_POST['email'];
	@$Purpose_Of_appointment = $_POST['subject'];
	@$Mobile_number = $_POST['number'];
	@$Department = $_POST['Department'];
	@$Time = $_POST['Time'];
    @$Date = $_POST['date'];


	// Database connection
	$conn = new mysqli('localhost','root','','book_appointment');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into nappointment(Name, Email,Purpose_Of_appointment ,Mobile_number ,Department , Time , Date ) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $Name, $Email, $Purpose_Of_appointment , $Mobile_number, $Department ,$Time , $Date );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>