<?php include 'sessionLimit.php' ?>
<?php include 'header.php'; ?>
<style type="text/css">
    b{
        white-space: nowrap;
    }
    td{
        border: 1px solid #dee2e6 !important;
        padding: 2px !important;
    }
    @media print {
        body{
            -webkit-print-color-adjust: exact;
        }
    }
</style>
<div class="container-fluid p-1 border border-1">
    <div class="my-1 py-3 text-center fs-3 fw-bold" style="background: #dee2e6;">Patient Information</div>
    <table class="table m-auto">
         <?php 
            include '../connect.php';
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $sqlCompleted = "SELECT * FROM form WHERE id = '$id'";
            $resultCompleted = $conn->query($sqlCompleted);
            $row = $resultCompleted->fetch_assoc();
            ?>
        <tbody>
            <tr>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Patient No:</b>
                        <span><?php echo $row['patientno'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Patient ID:</b>
                        <span><?php echo $row['patientid'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Room Type:</b>
                        <span><?php echo $row['roomtype'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Service Type:</b>
                        <span><?php echo $row['servicetype'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Obstetrics</b>
                        <span><?php echo $row['obstetrics'] ?></span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="text-secondary">
    <table class="table m-auto">
        <tbody>
            <tr>
                <td colspan="5">
                    <div class=" p-1 d-flex flex-column">
                        <b>Full Name:</b>
                        <span><?php echo $row['firstname'] . " " . $row['middlename'] . ". " . $row['lastname']?></span>
                    </div>
                </td>
                <td colspan="1">
                    <div class=" p-1 d-flex flex-column">
                        <b>Age:</b>
                        <span><?php echo $row['age'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Civil Status:</b>
                        <span><?php echo $row['civilstatus'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Gender:</b>
                        <span><?php echo $row['gender'] ?></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Nationality:</b>
                        <span><?php echo $row['nationality'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Religion:</b>
                        <span><?php echo $row['religion'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Birthday:</b>
                        <span><?php echo $row['birthday'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Occupation:</b>
                        <span><?php echo $row['occupation'] ?></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div class=" p-1 d-flex flex-column">
                        <b>House Address:</b>
                        <span><?php echo $row['houseaddress'] ?></span>
                    </div>
                </td>
                <td colspan="5">
                    <div class=" p-1 d-flex flex-column">
                        <b>City and Baranggay:</b>
                        <span><?php 
                        if ($row['city'] == "Others") {
                            echo $row['otherbarangay'];
                         }else {
                            echo $row['city']  . " " . $row['barangay'];
                         } ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Contact No:</b>
                        <span><?php echo $row['contactno'] ?></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div class=" p-1 d-flex flex-column">
                        <b>E-mail:</b>
                        <span><?php echo $row['email'] ?></span>
                    </div>
                </td>
                <td colspan="4">
                    <div class=" p-1 d-flex flex-column">
                        <b>Valid ID:</b>
                        <span><?php echo $row['validid'] ?></span>
                    </div>
                </td>
                <td colspan="4">
                    <div class=" p-1 d-flex flex-column">
                        <b>Valid ID No:</b>
                        <span><?php echo $row['valididno'] ?></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <div class=" p-1 d-flex flex-column">
                        <b>Philhealth No:</b>
                        <span><?php echo $row['philhealthno'] ?></span>
                    </div>
                </td>
                <td colspan="5">
                    <div class=" p-1 d-flex flex-column">
                        <b>Origin of Referral:</b>
                        <span><?php echo $row['originofreferral'] ?></span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="text-secondary">
    <table class="table m-auto">
        <tbody>
            <tr>
                <td colspan="5">
                    <div class=" p-1 d-flex flex-column">
                        <b>Reason of Visit Remarks:</b>
                        <span><?php echo $row['reasonofvisitremarks'] ?></span>
                    </div>
                </td>
                <td colspan="2">
                    <div class=" p-1 d-flex flex-column">
                        <b>WCPU:</b>
                        <span><?php echo $row['wcpu'] ?></span>
                    </div>
                </td>
                <td colspan="5">
                    <div class=" p-1 d-flex flex-column">
                        <b>Type of Case Abuse:</b>
                        <span><?php echo $row['typeofcaseabuse'] ?></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <div class=" p-1 d-flex flex-column">
                        <b>Relation on Perpetrator:</b>
                        <span><?php echo $row['relationonperpetrator'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Date of Admission:</b>
                        <span><?php echo $row['dateofadmission'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Date of Discharge</b>
                        <span><?php echo $row['dateofdischarge'] ?></span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="text-secondary">
    <table class="table m-auto">
        <tbody>
            <tr>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Guardian Name:</b>
                        <span><?php echo $row['guardianname'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Address:</b>
                        <span><?php echo $row['address'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Contact No:</b>
                        <span><?php echo $row['gcontactno'] ?></span>
                    </div>
                </td>
                <td colspan="3">
                    <div class=" p-1 d-flex flex-column">
                        <b>Relationship on the Patient:</b>
                        <span><?php echo $row['relationshiponthepatient'] ?></span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="mt-5 d-flex flex-column row-gap-3 mx-5">
    <div class="ms-auto d-flex">
        <p>Inputting Personnel:</p>
        <div class="d-flex flex-column justify-content-center">
            <p class="mx-auto mb-0"><?php echo $row['type'] ?></p></span>
            <b class="border-top border-1 border-dark">(Signature Over Printed name)</b>
        </div>
    </div>
    <div class="ms-auto d-flex">
        <p>Printing Personnel:</p>
        <div class="d-flex flex-column justify-content-center">
            <p class="mx-auto mb-0"><?php echo $_SESSION['user_type']; ?></p></span>
            <b class="border-top border-1 border-dark">(Signature Over Printed name)</b>
        </div>
    </div>
</div>
<script>
  window.print();  
  window.onafterprint = window.close; 
</script>

<?php include 'footer.php'; ?>