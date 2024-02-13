<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>
    <?php include 'header.php' ;?>

    <style type="text/css">
    @media print {
        body{
            -webkit-print-color-adjust: exact;
        }
    }
    </style>
</head>
<body>
    <div class="container d-flex flex-column align-items-center">
        <div id="content" class="w-100 d-flex flex-column ">

            <?php 
            include '../connect.php';
            $sqlCompleted = "SELECT COUNT(*) AS completed FROM form WHERE completed = 'completed'";
            $resultCompleted = $conn->query($sqlCompleted);

            $totalCompleted = 0;

            if ($resultCompleted->num_rows > 0) {
                $row = $resultCompleted->fetch_assoc();
                $totalCompleted = $row['completed'];

            ?>
        
            <img src="../upload/logo.png" width="100" height="100" class="mx-auto">
        
            <div class="border-top border-bottom border-2 pt-2 px-2 mt-4" style="background: rgba(0, 0, 0, 0.1) !important;">
            <h5><b>Report for Submitting Applications</b></h5>

            </div>
            <h5 class="mt-4 ms-auto"><b>Total completed:</b><?php echo " " .$totalCompleted; }?></h5>
             <?php include 'PrintList.php'; ?>
        </div>    
    </div>
<script>
  window.print();  
  window.onafterprint = window.close; 
</script>
  <?php include 'footer.php' ;?>
</body>
</html>
