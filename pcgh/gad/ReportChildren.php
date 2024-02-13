<?php
if (isset($_GET['submitdate'])){
                    $from = $_GET['from'];
                    $to = $_GET['to'];

$sqlTotal = "SELECT COUNT(*) AS total FROM form WHERE age <= 17 AND wcpu='Yes' AND (gender = 'female' OR gender = 'male') AND created_at BETWEEN '$from' AND '$to' ";
$TotalCompleted = $conn->query($sqlTotal);
$row_Total = $TotalCompleted->fetch_assoc();
}else{
$sqlTotal = "SELECT COUNT(*) AS total FROM form WHERE age <= 17 AND wcpu='Yes' AND (gender = 'female' OR gender = 'male')";
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
<table id="tableListthree" class="table table-bordered" style="width:100%;">
        <caption class="text-center">WCPU Yes Children Report</caption>
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
                array('min' => 0, 'max' => 3),
                array('min' => 4, 'max' => 6),
                array('min' => 7, 'max' => 9),
                array('min' => 10, 'max' => 12),
                array('min' => 13, 'max' => 15),
                array('min' => 16, 'max' => 17)
            );

            $maleResults = array();
            $femaleResults = array();

            foreach ($ageRanges as $range) {
                $minAge = $range['min'];
                $maxAge = $range['max'];

                if (isset($_GET['submitdate'])){
                    $from = $_GET['from'];
                    $to = $_GET['to'];

                // Query and count for males in the current age range
                $ssqlCompletedMale = "SELECT COUNT(*) AS male FROM form WHERE wcpu='Yes' AND gender = 'male' AND age >= $minAge AND age <= $maxAge AND created_at BETWEEN '$from' AND '$to' ";
                $maleCompleted = $conn->query($ssqlCompletedMale);
                $row_male = $maleCompleted->fetch_assoc();
                $maleResults[] = $row_male['male'];

                // Query and count for females in the current age range
                $ssqlCompletedFemale = "SELECT COUNT(*) AS female FROM form WHERE wcpu='Yes' AND gender = 'female' AND age >= $minAge AND age <= $maxAge AND created_at BETWEEN '$from' AND '$to' ";
                $femaleCompleted = $conn->query($ssqlCompletedFemale);
                $row_female = $femaleCompleted->fetch_assoc();
                $femaleResults[] = $row_female['female'];
                }else{
                    $ssqlCompletedMale = "SELECT COUNT(*) AS male FROM form WHERE wcpu='Yes' AND gender = 'male' AND age >= $minAge AND age <= $maxAge ";
                $maleCompleted = $conn->query($ssqlCompletedMale);
                $row_male = $maleCompleted->fetch_assoc();
                $maleResults[] = $row_male['male'];

                // Query and count for females in the current age range
                $ssqlCompletedFemale = "SELECT COUNT(*) AS female FROM form WHERE wcpu='Yes' AND gender = 'female' AND age >= $minAge AND age <= $maxAge";
                $femaleCompleted = $conn->query($ssqlCompletedFemale);
                $row_female = $femaleCompleted->fetch_assoc();
                $femaleResults[] = $row_female['female'];
                }
            }
            

            foreach ($ageRanges as $index => $range) {
            ?>
            <tr id="row_">
                <th><?php echo $i++ ?></th>
                <td><?php echo $range['min'] . '-'  . $range['max']; ?> years Old</td>
                <td><?php echo $maleResults[$index] ?></td>
                <td><?php echo $femaleResults[$index] ?></td>
            </tr>
            <?php }?>
        
                    
        </tbody>
</table>