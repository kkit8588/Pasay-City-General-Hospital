<?php

include '../connect.php';
include '../admin/sessionLimit.php';


    $user_username = $_SESSION['user_username'];
    $user_type = $_SESSION['user_type'];

    $id = $_POST['id'];
    $patientno = $_POST['patientno'];
    $patientid = $_POST['patientid'];
    $roomtype = $_POST['roomtype'];
    $servicetype = $_POST['servicetype'];
    $obstetrics = $_POST['obstetrics'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $suffix = $_POST['suffix'];
    $civilstatus = $_POST['civilstatus'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $religion = $_POST['religion'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $houseaddress = $_POST['houseaddress'];
    $barangay = $_POST['barangay'];
    $otherbarangay = $_POST['otherbarangay'];
    $city = $_POST['city'];
    $occupation = $_POST['occupation'];
    $email = $_POST['email'];
    $validid = $_POST['validid'];
    $valididno = $_POST['valididno'];
    $philhealthno = $_POST['philhealthno'];
    $originofreferral = $_POST['originofreferral'];
    $reasonofvisitremarks = $_POST['reasonofvisitremarks'];
    $wcpu = $_POST['wcpu'];
    $typeofcaseabuse = $_POST['typeofcaseabuse'];
    $relationonperpetrator = $_POST['relationonperpetrator'];
    $dateofadmission = $_POST['dateofadmission'];
    $dateofdischarge = $_POST['dateofdischarge'];
    $guardianname = $_POST['guardianname'];
    $address = $_POST['address'];
    $gcontactno = $_POST['gcontactno'];
    $contactno = $_POST['contactno'];
    $relationshiponthepatient = $_POST['relationshiponthepatient'];
    $created_at = $_POST['created_at'];


    $userType = $_SESSION['user_type'];
        
    if ($id == "") {

        mysqli_query($conn, "INSERT INTO form (patientno, patientid, roomtype, servicetype, obstetrics, lastname, firstname, middlename, suffix, civilstatus, gender, nationality, religion, birthday, age, houseaddress, city, barangay, otherbarangay, occupation, email, validid, valididno, philhealthno, originofreferral, reasonofvisitremarks, wcpu, typeofcaseabuse, relationonperpetrator, dateofadmission, dateofdischarge, guardianname, address, gcontactno, contactno, relationshiponthepatient, type, user_username, created_at) VALUES ('$patientno', '$patientid', '$roomtype', '$servicetype', '$obstetrics', '$lastname', '$firstname', '$middlename', '$suffix', '$civilstatus', '$gender', '$nationality', '$religion', '$birthday', '$age', '$houseaddress',  '$city', '$barangay', '$otherbarangay', '$occupation', '$email', '$validid', '$valididno', '$philhealthno', '$originofreferral', '$reasonofvisitremarks', '$wcpu', '$typeofcaseabuse', '$relationonperpetrator', '$dateofadmission', '$dateofdischarge', '$guardianname', '$address', '$gcontactno', '$contactno', '$relationshiponthepatient', '$user_type', '$user_username', '$created_at' )" );

          header("Location: ../admin/list.php");
       

    }else if ($userType == 'Admission') {
       
          mysqli_query($conn, "UPDATE form SET patientno ='$patientno', patientid ='$patientid', roomtype ='$roomtype', servicetype ='$servicetype', lastname ='$lastname', firstname ='$firstname', middlename ='$middlename', suffix ='$suffix', civilstatus ='$civilstatus', gender ='$gender', nationality ='$nationality', religion ='$religion', birthday ='$birthday', age ='$age', houseaddress ='$houseaddress', barangay ='$barangay',  otherbarangay ='$otherbarangay', city ='$city', occupation ='$occupation',  email ='$email', validid ='$validid', valididno ='$valididno', philhealthno ='$philhealthno', originofreferral ='$originofreferral', reasonofvisitremarks ='$reasonofvisitremarks', wcpu = '$wcpu', typeofcaseabuse ='$typeofcaseabuse', relationonperpetrator ='$relationonperpetrator', dateofadmission ='$dateofadmission', dateofdischarge ='$dateofdischarge', guardianname ='$guardianname', address ='$address', gcontactno ='$gcontactno', contactno ='$contactno', relationshiponthepatient ='$relationshiponthepatient', type ='$user_type', user_username ='$user_username', obstetrics ='$obstetrics', created_at ='$created_at' WHERE id='$id' ");
           header("Location: ../admin/list.php");

    }






?>
