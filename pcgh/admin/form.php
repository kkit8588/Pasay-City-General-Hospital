<?php 
include 'sessionLimit.php';
include '../controller/editController.php';?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form</title>
   	<?php include 'header.php' ?>
</head>
<body>
	<?php include 'sidebar.php' ?>

	<main class="hmsBody ">
		
		<?php include 'headermenu.php' ?>

		<section class="hmshero p-4">
			<h3 class="hmstitle mt-3">Form</h3>
			<form id="formIds" action="" method="" class="row d-flex">
				<hr>
				<div class="col-12 form-group">
					<div class="row row-gap-3">
						<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
						<input type="date" name="created_at" id="created_at" hidden>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<label for="patientno">Patient No.</label>
							<div class="d-flex">
								<input value="<?php echo isset($patientno) ? $patientno : '' ; ?>" type="text" name="patientno" id="patientno" placeholder="Patient No." class="patientfields form-control">
								<button type="button"value="patientnoButton" class=" generateButton btn btn-primary btn-sm" id="patientnoButton">Generate</button>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
								<label for="patientid">Patient ID.</label>
							<div class="d-flex">
								<input value="<?php echo isset($patientid) ? $patientid : '' ; ?>" type="text" name="patientid" id="patientid" placeholder="Patient ID" class="patientfields form-control">
								<button type="button" value="patientidButton" class="generateButton btn btn-primary btn-sm" id="patientidButton">Generate</button>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<label>Room Type</label>
							<select name="roomtype" id="roomtype" class="form-select">
								<option value="<?php echo isset($roomtype) ? $roomtype : '' ; ?>" selected>
									<?php 
										if (isset($roomtype)) {
												echo $roomtype;
											}else{
												echo 'Select Type';
											}
									?>
								</option>
								<option value="ER Ward">ER Ward</option>
								<option value="Surgery Ward">Surgery Ward</option>
								<option value="Fmed /MMed">Fmed /MMed</option>
								<option value="Pedia">Pedia</option>
								<option value="OB">OB</option>
								<option value="Nicu">Nicu</option>
								<option value="PiCU">PiCU</option>
								<option value="ICU">ICU</option>
							</select>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<label>Service Type</label>
							<div class="d-flex column-gap-2">
								<select name="servicetype" id="servicetype" class="form-select">
									<option  value="<?php echo isset($servicetype) ? $servicetype : '' ; ?>" selected>
										<?php 
										if (isset($servicetype)) {
												echo $servicetype;
											}else{
												echo 'Select Type';
											}
										?>
									</option>
									<option value="Newborn">Newborn</option>
									<option value="Obstetrics">Obstetrics</option>
									<option value="Pediatric">Pediatric</option>
									<option value="Surgery">Surgery</option>
									<option value="Medicine">Medicine</option>
								</select>
								<div id="obstetricsContainer" class="col-5" style="display: none;">
							        <select name="obstetrics" id="obstetrics" class="form-select">
							        	<option value="<?php echo isset($obstetrics) ? $obstetrics : '' ; ?>" selected>
											<?php 
											if (isset($obstetrics)) {
													echo $obstetrics;
												}else{
													echo 'Select Type';
												}
											?>
										</option>
							            <option value="Pre-natal">Pre-natal</option>
							            <option value="Post-natal">Post-natal</option>
							        </select>
							    </div>
						    </div>
						</div>
						<hr>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<label for="lastname">Last Name</label>
							<input value="<?php echo isset($lastname) ? $lastname : '' ; ?>" type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control">
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<label for="firstname">First Name</label>
							<input value="<?php echo isset($firstname) ? $firstname : '' ; ?>" type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control">
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<label for="middlename">Middle Name</label>
							<input value="<?php echo isset($middlename) ? $middlename : '' ; ?>" type="text" name="middlename" id="middlename" placeholder="Middle Name" class="form-control">
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<label for="suffix">Suffix</label>
							<input value="<?php echo isset($suffix) ? $suffix : '' ; ?>" type="text" name="suffix" id="suffix" placeholder="If applicable" class="form-control">
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<label>Civil Status</label>
							<select name="civilstatus" id="civilstatus" class="form-select">
								<option value="<?php echo isset($civilstatus) ? $civilstatus : '' ; ?>" selected>
									<?php 
									if (isset($civilstatus)) {
											echo $civilstatus;
										}else{
											echo 'Select Type';
										}
									?>
								</option>
								<option value="Single">Single</option>
								<option value="Married">Married</option>
								<option value="Widow">Widow</option>
								<option value="Separated">Separated</option>
							</select>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<label>Gender</label>
							<select name="gender" id="gender" class="form-select">
								<option value="<?php echo isset($gender) ? $gender : '' ; ?>" selected>
									<?php 
									if (isset($gender)) {
											echo $gender;
										}else{
											echo 'Select Type';
										}
									?>
								</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<label for="nationality">Nationality</label>
							<input value="<?php echo isset($nationality) ? $nationality : '' ; ?>" type="text" name="nationality" id="nationality" placeholder="Nationality" class="form-control">
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<label for="religion">Religion</label>
							<input value="<?php echo isset($religion) ? $religion : '' ; ?>" type="text" name="religion" id="religion" placeholder="Religion" class="form-control">
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<label for="birthday">Birthday</label>
							<input value="<?php echo isset($birthday) ? $birthday : '' ; ?>" type="date" name="birthday" id="birthday" placeholder="Birthday" class="form-control">
						</div>
						<div class="col-lg-1 col-md-6 col-sm-6">
							<label for="age">Age</label>
							<input value="<?php echo isset($age) ? $age : '' ; ?>" type="text" name="age" id="age" placeholder="Age" class="form-control">
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<label for="houseaddress">House Address</label>
							<input value="<?php echo isset($houseaddress) ? $houseaddress : '' ; ?>" type="text" name="houseaddress" id="houseaddress" placeholder="House no./ Street  " class="form-control">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<label for="city">City</label>
							<div class="d-flex column-gap-2">
								<select name="city" id="city" class="form-select">
									<option value="<?php echo isset($city) ? $city : '' ; ?>" selected>
										<?php 
										if (isset($city)) {
												echo $city;
											}else{
												echo 'Select Type';
											}
										?>
									</option>
									<option value="Pasig">Pasig</option>
									<option value="Others">Others</option>
								</select>
								<!-- <label for="barangay">Barangay</label> -->
								<div id="bgryContainer" class="col-9 col-8" style="display: none;">
							        <select name="barangay" id="barangay" class="form-select">
							        	<option value="<?php echo isset($barangay) ? $barangay : '' ; ?>" selected>
											<?php 
											if (isset($barangay)) {
													echo $barangay;
												}else{
													echo 'Select Type';
												}
											?>
										</option>
							            <option value="Bagong Ilog">Bagong Ilog</option>
							            <option value="Bagong Katipunan">Bagong Katipunan</option>
							            <option value="Bambang">Bambang</option>
							            <option value="Buting">Buting</option>
							            <option value="Caniogan">Caniogan</option>
							            <option value="Dela Paza">Dela Paza</option>
							            <option value="Kalawaan">Kalawaan</option>
							            <option value="Kapasigan">Kapasigan</option>
							            <option value="Kapitolyo">Kapitolyo</option>
							            <option value="Malinao">Malinao</option>
							            <option value="Manggahan">Manggahan</option>
							            <option value="Maybunga">Maybunga</option>
							            <option value="Oranbo">Oranbo</option>
							            <option value="Palatiw">Palatiw</option>
							            <option value="Pinagbuhatan">Pinagbuhatan</option>
							            <option value="Pineda">Pineda</option>
							            <option value="Rosario">Rosario</option>
							            <option value="Sagad">Sagad</option>
							            <option value="San Antonio">San Antonio</option>
							            <option value="San Joaquin">San Joaquin</option>
							            <option value="San Jose">San Jose</option>
							            <option value="San Miguel">San Miguel</option>
							            <option value="San Nicolas">San Nicolas</option>
							            <option value="Santa Cruz">Santa Cruz</option>
							            <option value="Santa Lucia">Santa Lucia</option>
							            <option value="Santa Rosa">Santa Rosa</option>
							            <option value="Santo Tomas">Santo Tomas</option>
							            <option value="Santolan">Santolan</option>
							            <option value="Sumilang">Sumilang</option>
							            <option value="Ugong">Ugong</option>
							        </select>
							    </div>
							    <div id="othersContainer" class="col-lg-9 col-8" style="display: none;">
									<input value="<?php echo isset($otherbarangay) ? $otherbarangay : '' ; ?>" type="text" name="otherbarangay" id="otherbarangay" placeholder="City and Barangay" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<label for="occupation">Occupation</label>
							<input value="<?php echo isset($occupation) ? $occupation : '' ; ?>" type="text" name="occupation" id="occupation" placeholder="If Applicable" class="form-control">
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<label for="contactno">Contact No.</label>
							<input value="<?php echo isset($contactno) ? $contactno : '' ; ?>" type="text" name="contactno" id="contactno" placeholder="XXXX-XXX-XXXX" class="form-control" maxlength="15">
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<label for="email">E-mail</label>
							<input value="<?php echo isset($email) ? $email : '' ; ?>" type="text" name="email" id="email" placeholder="E-mail" class="form-control" required>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<label for="validid">Valid ID</label>
							<input value="<?php echo isset($validid) ? $validid : '' ; ?>" type="text" name="validid" id="validid" placeholder="Valid ID" class="form-control">
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<label for="valididno">Valid ID no.</label>
							<input value="<?php echo isset($valididno) ? $valididno : '' ; ?>" type="text" name="valididno" id="valididno" placeholder="Valid ID no." class="form-control">
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<label for="philhealthno">Philhealth No.</label>
							<input value="<?php echo isset($philhealthno) ? $philhealthno : '' ; ?>" type="text" name="philhealthno" id="philhealthno" placeholder="If Applicable" class="form-control">
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<label>Origin of Referral</label>
							<select name="originofreferral" id="originofreferral" class="form-select">
								<option value="<?php echo isset($originofreferral) ? $originofreferral : '' ; ?>" selected>
									<?php 
									if (isset($originofreferral)) {
											echo $originofreferral;
										}else{
											echo 'Select Type';
										}
									?>
								</option>
								<option value="DEMAC">DEMAC</option>
								<option value="Inpatient">Inpatient</option>
								<option value="PSWDO">PSWDO</option>
								<option value="other Agencies">other Agencies</option>
							</select>
						</div>
						<hr>
						<div class="col-lg-5 col-md-6 col-sm-6">
							<label for="reasonofvisitremarks">Reason of Visit Remarks</label>
							<input value="<?php echo isset($reasonofvisitremarks) ? $reasonofvisitremarks : '' ; ?>" type="text" name="reasonofvisitremarks" id="reasonofvisitremarks" placeholder="Reason of Visit Remarks" class="form-control">
						</div>
						<div class="col-lg-7 col-md-6 col-sm-6">
							<label for="wcpu">WCPU</label>
							<div class="d-flex column-gap-2">
									<select name="wcpu" id="wcpu" class="form-select">
										<option value="<?php echo isset($wcpu) ? $wcpu : '' ; ?>" selected>
											<?php 
											if (isset($wcpu)) {
													echo $wcpu;
												}else{
													echo 'Select Type';
												}
											?>
										</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								<div id="tocaContainer" class="col-8" style="display: none;">
									<select name="typeofcaseabuse" id="typeofcaseabuse" class="form-select">
										<option value="<?php echo isset($typeofcaseabuse) ? $typeofcaseabuse : '' ; ?>" selected>
											<?php 
											if (isset($typeofcaseabuse)) {
													echo $typeofcaseabuse;
												}else{
													echo 'Select Type';
												}
											?>
										</option>
										<option value="Sexual">Sexual</option>
										<option value="Physical">Physical</option>
										<option value="Physical and Sexual">Physical and Sexual</option>
										<option value="Neglect">Neglect</option>
										<option value="Emotional">Emotional</option>
										<option value="Psychological">Psychological</option>
										<option value="Verbal">Verbal</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<label for="relationonperpetrator">Relation on Perpetrator</label>
							<input value="<?php echo isset($relationonperpetrator) ? $relationonperpetrator : '' ; ?>" type="text" name="relationonperpetrator" id="relationonperpetrator" placeholder="Relation on Perpetrator" class="form-control">
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<label for="dateofadmission">Date of Admission</label>
							<input value="<?php echo isset($dateofadmission) ? $dateofadmission : '' ; ?>" type="date" name="dateofadmission" id="dateofadmission" placeholder="Date of Admission" class="form-control">
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<label for="dateofdischarge">Date of Discharge</label>
							<input value="<?php echo isset($dateofdischarge) ? $dateofdischarge : '' ; ?>" type="date" name="dateofdischarge" id="dateofdischarge" placeholder="Date of Discharge" class="form-control">
						</div>
						<hr>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<label for="guardianname">Guardian Name</label>
							<input value="<?php echo isset($guardianname) ? $guardianname : '' ; ?>" type="text" name="guardianname" id="guardianname" placeholder="Guardian Name" class="form-control">
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<label for="address">Address</label>
							<input value="<?php echo isset($address) ? $address : '' ; ?>" type="text" name="address" id="address" placeholder="Complete Address" class="form-control">
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<label for="gcontactno">Contact No.</label>
							<input value="<?php echo isset($gcontactno) ? $gcontactno : '' ; ?>" type="text" name="gcontactno" id="gcontactno" placeholder="XXXX-XXX-XXXX" class="form-control" maxlength="15">
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<label for="relationshiponthepatient">Relationship on the Patient</label>
							<input value="<?php echo isset($relationshiponthepatient) ? $relationshiponthepatient : '' ; ?>" type="text" name="relationshiponthepatient" id="relationshiponthepatient" placeholder="Relationship on the Patient" class="form-control">
						</div>
						<div class="col-2 mt-4 mb-1">
							<input type="submit" name="submit" class="btn btn-primary" value="submit">
						</div>
					</div>					
				</div>
			</form>

		</section>
		<?php include '../loader.php'; ?>
		
	</main>


</body>
	<?php include 'footer.php' ;?>
	
</html>