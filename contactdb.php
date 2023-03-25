<?php
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Email = $_POST['Email'];
    $Suggestion = $_POST['Suggestion'];

    $conn = new sqli('localhost','root','','flood blog')
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into blog visitors(Firstname, LastName, Email, Suggestion) values(?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $FirstName, $LastName, $Email, $Suggestion);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>