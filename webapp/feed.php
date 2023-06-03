<?php
	$firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
	$email = $_POST['email'];
    $Gender = $_POST['Gender'];
    $useful = $_POST['useful'];
    $application = $_POST['application'];
    $issues = $_POST['issues'];
    $present = $_POST['present'];
    $comments = $_POST['comments'];

	// Database connection
	$conn = new mysqli('localhost','root','','loginpage');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into feedback(firstname,middlename,lastname,age,phone,email,Gender,useful,application,issues,present,comments) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssisssssss", $firstname, $middlename, $lastname, $age, $phone, $email, $Gender, $useful, $application, $issues, $present, $comments);
		$execval = $stmt->execute();
		echo $execval;
		$url = "./login.html";
        header("Location: $url");;
		$stmt->close();
		$conn->close();
	}
?>