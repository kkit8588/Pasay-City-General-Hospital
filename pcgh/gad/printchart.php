<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart Example </title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php include 'header.php';?>
</head>
<body>

<?php
include '../connect.php';
session_start();
$startDate = '2023-01-01';
$endDate = '2023-12-31';
$monthlyCounts = [];
$currentDate = new DateTime($startDate);
$endDateObj = new DateTime($endDate);

while ($currentDate <= $endDateObj) {
    $firstDayOfMonth = $currentDate->format('Y-m-01');
    $lastDayOfMonth = $currentDate->format('Y-m-t');
    $sql = "SELECT COUNT(*) AS total FROM form WHERE created_at BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth'";
    $result = $conn->query($sql);

    if ($result) {
        $monthName = $currentDate->format('F');
        $monthlyCounts[$monthName] = $result->fetch_assoc()['total'];
    } else {
        echo "Error for {$currentDate->format('Y-m')}: " . $conn->error;
    }

    $currentDate->modify('+1 month');
}

$monthlyCountsJSON = json_encode(array_values($monthlyCounts));
?>

<div class="container d-flex flex-column align-items-center" style="width: 800px;">
    <h4 class="text-center my-2">Total Patient Report of <?php
$currentDate = new DateTime(); 
$currentYear = $currentDate->format('Y');
echo $currentYear;
?></h4>
    <!-- Chart Canvas for myAreaChart -->
    <canvas class="mb-3" id="myAreaChart" width="600" height="200"></canvas>

    <!-- Display Table -->
    <table class="ms-auto table table-bordered text-center w-100" border="1">
        <thead>
            <tr>
                <th>Month</th>
                <th>Total Patients</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($monthlyCounts as $month => $count): ?>
                <tr>
                    <td><?php echo $month; ?></td>
                    <td><?php echo $count; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<div class="me-auto mt-5 d-flex position-relative">
        <p class="position-absolute" style="top: -15px; left: 15px;">Printed by:</p>
        <div class="px-5"></div>
        <div class="d-flex flex-column justify-content-center">
            <p class="mx-auto mb-0"></p></span>
            <b class="border-top border-1 border-dark">(Printed Name Over Signature)</b>
            <p class="mx-auto"><?php echo $_SESSION['user_username']; ?></p></span>
        </div>
    </div>

<script>
/*==========================================
              myAreaChart
==========================================*/
var monthlyCounts = <?php echo $monthlyCountsJSON; ?>;
var dateLabels = <?php echo json_encode(array_keys($monthlyCounts)); ?>;
var ctx = document.getElementById('myAreaChart').getContext('2d');

var data = {
    labels: dateLabels,
    datasets: [{
        label: 'Total Patients Each Month',
        data: monthlyCounts, 
        backgroundColor: 'rgba(78, 115, 223, 0.5)',
        borderColor: 'rgba(78, 115, 223, 1)',
        borderWidth: 1,
    }]
};

var config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};

var myBarChart = new Chart(ctx, config);

  window.print();  
  window.onafterprint = window.close; 

</script>
 <?php include 'footer.php';?>
</body>
</html>
