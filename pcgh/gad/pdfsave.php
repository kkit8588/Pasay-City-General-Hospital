<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>
    <?php include 'header.php' ;
    session_start();?>
    <?php include '../connect.php' ;?>

    <style type="text/css">
    @media print {
        body{
            -webkit-print-color-adjust: exact;
        }
    }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid d-flex flex-column align-items-center">
        <div id="content" class="w-100 p-5 d-flex flex-column ">
        
            <img src="../upload/logo.png" width="100" height="100" class="mx-auto">
        
            <div class="border-top border-bottom border-2 pt-2 px-2 mt-4" style="background: rgba(0, 0, 0, 0.1) !important;">
            <h5><b> 
            <?php
            // Get the current URL
            $currentURL = $_SERVER['REQUEST_URI'];

            // Get the last two characters of the URL
            $lastTwoCharacters = substr($currentURL, -2);

            // Echo the last two characters
            if ($lastTwoCharacters == "sd") {
            echo "Report for Sex Dissagregated";
            }else if ($lastTwoCharacters == "tm") {
            echo "Report for Teen Moms";
            }
            else if ($lastTwoCharacters == "ad") {
            echo "Report for Adult Female";
            }else if ($lastTwoCharacters == "ch") {
            echo "Report for Children";
            }else{
            echo "No file Selected to Convert in PDF";
            }
            ?>
                
            </b></h5>

            </div>
            <?php

            // Echo the last two characters
            if ($lastTwoCharacters == "sd") {
            echo "<div class='mt-3 px-2'>";
            include 'ReportSexDissagregated.php';
            echo "</div>";
            }else if ($lastTwoCharacters == "tm") {
            echo "<div class='mt-3 px-2'>";
            include 'ReportTeenmoms.php';
            echo "</div>";
            }
            else if ($lastTwoCharacters == "ad") {
            echo "<div class='mt-3 px-2'>";
            include 'ReportAdultfemale.php';
            echo "</div>";
            }else if ($lastTwoCharacters == "ch") {
            echo "<div class='mt-3 px-2'>";
            include 'ReportChildren.php';
            echo "</div>";
            }else{
            echo "<div class='mt-3 mx-auto px-2'>";
            echo "<h1>No file Selected to Convert in PDF</h1>";
            echo "</div>";
            }
            ?>
            
            
        </div> 
    </div>
<div class="me-auto d-flex position-relative">
        <p class="position-absolute" style="top: -15px; left: 15px;">Printed by:</p>
        <div class="px-5"></div>
        <div class="d-flex flex-column justify-content-center">
            <p class="mx-auto mb-0"></p></span>
            <b class="border-top border-1 border-dark">(Printed Name Over Signature)</b>
            <p class="mx-auto"><?php echo $_SESSION['user_username']; ?></p></span>
        </div>
    </div>

<script>
  window.print();  
  window.onafterprint = window.close; 
</script>

  <?php include 'footer.php' ;?>
</body>
</html>
