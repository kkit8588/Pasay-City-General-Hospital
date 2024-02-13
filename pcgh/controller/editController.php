<?php
$id = "";
if (isset($_GET['id'])) {
	    $id = $_GET['id'];
	    $sql = "SELECT * FROM form WHERE id = $id";
	    $result = $conn->query($sql);

	    if ($result->num_rows > 0) {
	        // Step 4: Fetch the data and store it in variables
	        $row = $result->fetch_assoc();
	        $id = $row['id'];
	        $patientno = $row['patientno'];
		    $patientid = $row['patientid'];
		    $roomtype = $row['roomtype'];
		    $servicetype = $row['servicetype'];
		    $obstetrics = $row['obstetrics'];
		    $lastname = $row['lastname'];
		    $firstname = $row['firstname'];
		    $middlename = $row['middlename'];
		    $suffix = $row['suffix'];
		    $civilstatus = $row['civilstatus'];
		    $gender = $row['gender'];
		    $nationality = $row['nationality'];
		    $religion = $row['religion'];
		    $birthday = $row['birthday'];
		    $age = $row['age'];
		    $houseaddress = $row['houseaddress'];
		    $barangay = $row['barangay'];
		    $otherbarangay = $row['otherbarangay'];
		    $city = $row['city'];
		    $occupation = $row['occupation'];
		    $email = $row['email'];
		    $validid = $row['validid'];
		    $valididno = $row['valididno'];
		    $philhealthno = $row['philhealthno'];
		    $originofreferral = $row['originofreferral'];
		    $reasonofvisitremarks = $row['reasonofvisitremarks'];
		    $wcpu = $row['wcpu'];
		    $typeofcaseabuse = $row['typeofcaseabuse'];
		    $relationonperpetrator = $row['relationonperpetrator'];
		    $dateofadmission = $row['dateofadmission'];
		    $dateofdischarge = $row['dateofdischarge'];
		    $guardianname = $row['guardianname'];
		    $address = $row['address'];
		    $gcontactno = $row['gcontactno'];
		    $contactno = $row['contactno'];
		    $relationshiponthepatient = $row['relationshiponthepatient'];
	    } 

	}
?>
