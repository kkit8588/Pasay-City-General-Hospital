 <?php
   
$startDate = '2023-01-01';
$endDate = '2024-12-31';
$monthlyCounts = [];
$currentDate = new DateTime($startDate);
$endDateObj = new DateTime($endDate);

while ($currentDate <= $endDateObj) {
    $firstDayOfMonth = $currentDate->format('Y-m-01');
    $lastDayOfMonth = $currentDate->format('Y-m-t');
    $sql = "SELECT COUNT(*) AS total FROM form WHERE created_at BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth'";
    $result = $conn->query($sql);

    if ($result) {
        $monthlyCounts[$currentDate->format('Y-m')] = $result->fetch_assoc()['total'];
    } else {
        echo "Error for {$currentDate->format('Y-m')}: " . $conn->error;
    }

    $currentDate->modify('+1 month');
}

$monthlyCountsJSON = json_encode(array_values($monthlyCounts));

    ?>


<script>
/*==========================================
              myAreaChart
==========================================*/
var monthlyCounts = <?php echo $monthlyCountsJSON; ?>;
var dateLabels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug", "Sep", "Oct", "Nov", "Dec"];
var ctx = document.getElementById('myAreaChart');

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

/*==========================================
              myDoughnutChart
==========================================*/
var ctx2 = document.getElementById('myDoughnutChart').getContext('2d');
var pastelColors = [
    '#FFB6C1',
    '#ADD8E6', 
    '#FFD700', 
];

var total = <?php echo $display['total']; ?>;
var teenmoms = <?php echo $teenmoms['teenmoms']; ?>;
var adultFemale = <?php echo $adultFemale['adultFemale']; ?>;

var data2 = {
    labels: ['Total Patients', 'Teen Moms', 'Adult Females'],
    datasets: [{
        data: [total, teenmoms, adultFemale],
        backgroundColor: pastelColors,
        borderColor: pastelColors,
        borderWidth: 1
    }]
};

var myDoughnutChart = new Chart(ctx2, {
    type: 'doughnut',
    data: data2,
});


</script>