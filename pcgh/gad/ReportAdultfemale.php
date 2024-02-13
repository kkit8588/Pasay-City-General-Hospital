<?php
if (isset($_GET['submitdate'])){
                    $from = $_GET['from'];
                    $to = $_GET['to'];

$sqlTotal = "SELECT COUNT(*) AS total FROM form WHERE wcpu='Yes' AND gender = 'female' AND age >= 18 AND created_at BETWEEN '$from' AND '$to' ";
$TotalCompleted = $conn->query($sqlTotal);
$row_Total = $TotalCompleted->fetch_assoc();
}else{
$sqlTotal = "SELECT COUNT(*) AS total FROM form WHERE wcpu='Yes' AND gender = 'female' AND age >= 18 ";
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
<table id="tableListfour" class="table table-bordered" style="width:100%;">
        <caption class="text-center">WCPU Yes Adult Female Report</caption>
        <thead class="table-light">
            <tr>
                <th class="mb-auto">No.</th>
                <th>Age</th>
                <th>Female</th>
            </tr>
        </thead>
        
        <tbody>

            <?php
            $i=1;
            $ageRanges = array(
                array('min' => 18, 'max' => 24),
                array('min' => 25, 'max' => 44),
                array('min' => 45, 'max' => 59),
                array('min' => 60, 'max' => 120)
            );

            $maleResults = array();
            $femaleResults = array();

            foreach ($ageRanges as $range) {
                $minAge = $range['min'];
                $maxAge = $range['max'];

                if (isset($_GET['submitdate'])){
                    $from = $_GET['from'];
                    $to = $_GET['to'];

                // Query and count for females in the current age range
                $sqlCompletedFemale = "SELECT COUNT(*) AS female FROM form WHERE wcpu='Yes' AND gender = 'female' AND age >= $minAge AND age <= $maxAge AND created_at BETWEEN '$from' AND '$to' ";
                $femaleCompleted = $conn->query($sqlCompletedFemale);
                $row_female = $femaleCompleted->fetch_assoc();
                $femaleResults[] = $row_female['female'];
                }else{
                    $sqlCompletedFemale = "SELECT COUNT(*) AS female FROM form WHERE wcpu='Yes' AND gender = 'female' AND age >= $minAge AND age <= $maxAge ";
                $femaleCompleted = $conn->query($sqlCompletedFemale);
                $row_female = $femaleCompleted->fetch_assoc();
                $femaleResults[] = $row_female['female'];
                }
            }
            

            foreach ($ageRanges as $index => $range) {
            ?>
            <tr id="row_">
                <th><?php echo $i++ ?></th>
                <td><?php echo $range['min'] . '-'  . $range['max']; ?> years Old</td>
                <td><?php echo $femaleResults[$index] ?></td>
            </tr>
            <?php }?>
        
                    
        </tbody>
</table>