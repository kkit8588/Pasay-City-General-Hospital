<?php
if (isset($_GET['submitdate'])){
                    $from = $_GET['from'];
                    $to = $_GET['to'];

$sqlTotal = "SELECT COUNT(*) AS total FROM form WHERE (gender = 'female' OR gender = 'male') AND age >= 0 AND created_at BETWEEN '$from' AND '$to' ";
$TotalCompleted = $conn->query($sqlTotal);
$row_Total = $TotalCompleted->fetch_assoc();
}else{
$sqlTotal = "SELECT COUNT(*) AS total FROM form WHERE (gender = 'female' OR gender = 'male') AND age >= 0 ";
$TotalCompleted = $conn->query($sqlTotal);
$row_Total = $TotalCompleted->fetch_assoc();
}
?>
<h5><b>Total:</b><?php echo " " . $row_Total['total']; ?></h5>
<small class="d-flex">
<?php if (isset($_GET['from']) && isset($_GET['to'])) {

$fromDateTime = new DateTime($_GET['from']);
$toDateTime = new DateTime($_GET['to']);

$from = $fromDateTime->format('F j Y');
$to = $toDateTime->format('F j Y');

echo "From: " . $from ." - ";
echo "To: " . $to;
}
?>
</small>
<table id="tableListone" class="table table-bordered" style="width:100%;">
        <caption class="text-center">Sex Disaggregated Report</caption>
        <thead class="table-light">
            <tr>
                <th class="mb-auto">No.</th>
                <th>Age</th>
                <th>Male</th>
                <th>Female</th>
            </tr>
        </thead>
        
        <tbody>

            <?php
            $i=1;
            $ageRanges = array(
                array('label' => 'Infant', 'min' => 0, 'max' => 1),
                array('label' => 'Children', 'min' => 2, 'max' => 12),
                array('label' => 'Teen', 'min' => 13, 'max' => 19),
                array('label' => 'Adult', 'min' => 20, 'max' => 59),
                array('label' => 'Senior', 'min' => 60, 'max' => 74),
                array('label' => 'Elderly', 'min' => 75, 'max' => 120)
            );

            $maleResults = array();
            $femaleResults = array();

            foreach ($ageRanges as $range) {
                $minAge = $range['min'];
                $maxAge = $range['max'];

                // Query and count for males in the current age range
                

                if (isset($_GET['from']) && isset($_GET['to'])){
                    $from = $_GET['from'];
                    $to = $_GET['to'];


                    $ssqlCompletedMale = "SELECT COUNT(*) AS male FROM form WHERE gender = 'male' AND age >= $minAge AND age <= $maxAge AND created_at BETWEEN '$from' AND '$to' ";
                $maleCompleted = $conn->query($ssqlCompletedMale);
                $row_male = $maleCompleted->fetch_assoc();
                $maleResults[] = $row_male['male'];

                // Query and count for females in the current age range
                $ssqlCompletedFemale = "SELECT COUNT(*) AS female FROM form WHERE gender = 'female' AND age >= $minAge AND age <= $maxAge AND created_at BETWEEN '$from' AND '$to' ";
                $femaleCompleted = $conn->query($ssqlCompletedFemale);
                $row_female = $femaleCompleted->fetch_assoc();
                $femaleResults[] = $row_female['female'];
                }else{
                    $ssqlCompletedMale = "SELECT COUNT(*) AS male FROM form WHERE gender = 'male' AND age >= $minAge AND age <= $maxAge";
                $maleCompleted = $conn->query($ssqlCompletedMale);
                $row_male = $maleCompleted->fetch_assoc();
                $maleResults[] = $row_male['male'];

                // Query and count for females in the current age range
                $ssqlCompletedFemale = "SELECT COUNT(*) AS female FROM form WHERE gender = 'female' AND age >= $minAge AND age <= $maxAge";
                $femaleCompleted = $conn->query($ssqlCompletedFemale);
                $row_female = $femaleCompleted->fetch_assoc();
                $femaleResults[] = $row_female['female'];
                }
            }
            

            foreach ($ageRanges as $index => $range) {
            ?>
            <tr id="row_">
                <th><?php echo $i++ ?></th>
                <td><?php echo  $range['label'] . ' ' . $range['min'] . '-'  . $range['max']; ?> years Old</td>
                <td><?php echo $maleResults[$index] ?></td>
                <td><?php echo $femaleResults[$index] ?></td>
            </tr>
            <?php }?>
        
                    
        </tbody>
</table>