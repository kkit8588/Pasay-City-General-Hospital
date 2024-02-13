<?php
if (isset($_GET['submitdate'])){
                    $from = $_GET['from'];
                    $to = $_GET['to'];

$sqlTotal = "SELECT COUNT(*) AS total FROM form WHERE (obstetrics = 'Pre-natal' OR obstetrics = 'Post-natal') AND age <= 18 AND created_at BETWEEN '$from' AND '$to' ";
$TotalCompleted = $conn->query($sqlTotal);
$row_Total = $TotalCompleted->fetch_assoc();
}else{
$sqlTotal = "SELECT COUNT(*) AS total FROM form WHERE (obstetrics = 'Pre-natal' OR obstetrics = 'Post-natal') AND age <= 18";
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
<table id="tableListtwo" class="table table-bordered" style="width:100%;">
        <caption class="text-center">
            <small>Teen Moms Report</small>
            <br>
            <small role="button" class="view link-primary ">can View the Report for reference </small>
        </caption>
        <thead class="table-light">
            <tr>
                <th>No.</th>
                <th>14 yr old/ Below</th>
                <th>15-18 yr old</th>
                <th>Pre natal</th>
                <th>Post natal</th>
                <th>total</th>
            </tr>
        </thead>
        
        <tbody>

            <?php
            $i=1;
            if (isset($_GET['submitdate'])){
                    $from = $_GET['from'];
                    $to = $_GET['to'];

                // Query and count for Prenatal in the current age range
                $sqlCompletedPrenatal = "SELECT COUNT(*) AS Prenatal FROM form WHERE obstetrics = 'Pre-natal' AND age <= 18 AND created_at BETWEEN '$from' AND '$to'  ";
                $PrenatalCompleted = $conn->query($sqlCompletedPrenatal);
                $row_Prenatal = $PrenatalCompleted->fetch_assoc();
                $PrenatalResults = $row_Prenatal['Prenatal'];

                // Query and count for Postnatal in the current age range
                $sqlCompletedPostnatal = "SELECT COUNT(*) AS Postnatal FROM form WHERE obstetrics = 'Post-natal' AND age <= 18 AND created_at BETWEEN '$from' AND '$to'  ";
                $PostnatalCompleted = $conn->query($sqlCompletedPostnatal);
                $row_Postnatal = $PostnatalCompleted->fetch_assoc();
                $PostnatalResults = $row_Postnatal['Postnatal'];

                $sqlCompletedBelow = "SELECT COUNT(*) AS below FROM form WHERE age <= 14 AND (obstetrics = 'Pre-natal' OR obstetrics = 'Post-natal') AND created_at BETWEEN '$from' AND '$to'  ";
                $belowCompleted = $conn->query($sqlCompletedBelow);
                $row_below = $belowCompleted->fetch_assoc();
                $belowResults = $row_below['below'];
               
                $sqlCompletedAbove = "SELECT COUNT(*) AS above FROM form WHERE age >= 15 AND age <= 18 AND (obstetrics = 'Pre-natal' OR obstetrics = 'Post-natal') AND created_at BETWEEN '$from' AND '$to'  ";
                $aboveCompleted = $conn->query($sqlCompletedAbove);
                $row_above = $aboveCompleted->fetch_assoc();
                $aboveResults = $row_above['above'];
        
                $total=$aboveResults+$belowResults;
            }else{
                $sqlCompletedPrenatal = "SELECT COUNT(*) AS Prenatal FROM form WHERE obstetrics = 'Pre-natal' AND age <= 18 ";
                $PrenatalCompleted = $conn->query($sqlCompletedPrenatal);
                $row_Prenatal = $PrenatalCompleted->fetch_assoc();
                $PrenatalResults = $row_Prenatal['Prenatal'];

                // Query and count for Postnatal in the current age range
                $sqlCompletedPostnatal = "SELECT COUNT(*) AS Postnatal FROM form WHERE obstetrics = 'Post-natal' AND age <= 18 ";
                $PostnatalCompleted = $conn->query($sqlCompletedPostnatal);
                $row_Postnatal = $PostnatalCompleted->fetch_assoc();
                $PostnatalResults = $row_Postnatal['Postnatal'];

                $sqlCompletedBelow = "SELECT COUNT(*) AS below FROM form WHERE age <= 14 AND (obstetrics = 'Pre-natal' OR obstetrics = 'Post-natal') ";
                $belowCompleted = $conn->query($sqlCompletedBelow);
                $row_below = $belowCompleted->fetch_assoc();
                $belowResults = $row_below['below'];
               
                $sqlCompletedAbove = "SELECT COUNT(*) AS above FROM form WHERE age >= 15 AND age <= 18 AND (obstetrics = 'Pre-natal' OR obstetrics = 'Post-natal')";
                $aboveCompleted = $conn->query($sqlCompletedAbove);
                $row_above = $aboveCompleted->fetch_assoc();
                $aboveResults = $row_above['above'];
        
                $total=$aboveResults+$belowResults;
            }

            ?>
            <tr id="row_">
                <th><?php echo $i++ ?></th>
                <td><?php echo $belowResults ?></td>
                <td><?php echo $aboveResults ?></td>
                <td><?php echo $PrenatalResults ?></td>
                <td><?php echo $PostnatalResults ?></td>
                <td><?php echo $total ?></td>
            </tr>
        
                    
        </tbody>
</table>