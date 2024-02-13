<?php include 'sessionLimit.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF Report</title>
    <?php include 'header.php' ?>
    <style type="text/css">
        @media print {
        body{
            -webkit-print-color-adjust: exact;
        }
    }
    </style>

</head>
<body>
    
    <?php include 'sidebar.php' ?>

    <main class="hmsBody ">

       <?php include 'headermenu.php' ?>

        <section class="hmshero p-4">
            <h3 class="hmstitle mt-3">PDF Report</h3>
            <hr>
            <div class="card-body table-responsive">

            <div class="d-flex column-gap-5 mb-3">                           
                
               <?php   
    
                if (isset($_GET['from']) && isset($_GET['to'])) {
                    $from = $_GET['from'];
                    $to = $_GET['to'];

                    mysqli_query($conn, "SELECT * FROM form WHERE created_at BETWEEN '$from' AND '$to'");
                    
                } 


                ?>
                <form method="GET" action="" class="col-lg-7 col-md-8 d-flex flex-column row-gap-2">
                    <div class="d-lg-flex column-gap-1 col-lg-9 ">
                        <div class="col-lg-8 col-md-7 d-flex align-items-center">
                            <label for="from">START:</label>
                            <div class="input-group">
                                <input type="date" name="from" class="ms-1 form-control" id="from" value="<?php if(isset($from)){echo $from; } ?>">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 mt-1 mt-lg-0 d-flex align-items-center">
                            <label for="to">END: </label>
                            <div class="input-group">
                                <input type="date" name="to" class="ms-1 form-control" id="to" value="<?php if(isset($to)){echo $to; } ?>">
                            </div>
                        </div>
                    </div>
                    <div class="my-auto offset-md-1 offset-sm-2 offset-2 ps-1">
                        <input type="submit" name="submitdate" value="Filter" class="btn btn-outline-primary">
                        <a href="pdfReport.php" class="btn btn-outline-danger">Reset</a>
                    </div>
                </form>
                <div class="col-lg-4 ">
                    <div class="d-lg-flex column-gap-1">
                        <div class="col-lg-6">
                            <select name="parentSelect" id="parentSelect" class=" form-select">
                                <option  disabled selected>Select Type</option>
                                <option value="WCPUCases">WCPU Cases</option>
                                <option value="TeenMomsCases">Teen Moms Cases</option>
                                <option value="SexDissagregated">Sex Dissagregated</option>
                            </select>
                        </div>
                        <div id="childContainer" class="col-lg-5">
                            <select name="childSelect" id="childSelect" class="form-select">
                                <option value="child">Children</option>
                                <option value="adult">Adult Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 mt-2 d-flex column-gap-2">
                <!-- CHILDREN WCPU PDF -->
                    <a target="_blank"  href="<?php 
                if (isset($_GET['from']) && isset($_GET['to'])) {
                    $from = $_GET['from'];
                    $to = $_GET['to'];
                    $ch = "ch";
                    $link = "pdfsave.php?from=$from&to=$to&$ch";
                    echo $link;
                }else{
                    $ch = "ch";
                    $link = "pdfsave.php?$ch";
                    echo $link;
                }?>" id="pdfThree" class="btn btn-outline-success fw-bolder px-3">CHILDREN</a>
                <!-- ======================================================== -->
                <!-- ADULT FEMALE WCPU PDF -->
                    <a target="_blank" href="<?php 
                if (isset($_GET['from']) && isset($_GET['to'])) {
                    $from = $_GET['from'];
                    $to = $_GET['to'];
                    $ad = "ad";
                    $link = "pdfsave.php?from=$from&to=$to&$ad";
                    echo $link;
                }else{
                    $ad = "ad";
                    $link = "pdfsave.php?$ad";
                    echo $link;
                }?>" id="pdfFour" class="btn btn-outline-success fw-bolder px-3">ADULT</a>
                <!-- ======================================================== -->
                <!-- Teen MOMS PDF -->
                    <a target="_blank" href="<?php 
                if (isset($_GET['from']) && isset($_GET['to'])) {
                    $from = $_GET['from'];
                    $to = $_GET['to'];
                    $tm = "tm";
                    $link = "pdfsave.php?from=$from&to=$to&$tm";
                    echo $link;
                }else{
                    $tm = "tm";
                    $link = "pdfsave.php?$tm";
                    echo $link;
                }?>" id="pdfTwo" class="btn btn-outline-success fw-bolder px-3">PDF</a>
                <!-- ======================================================== -->
                <!-- Sex Dissagregated PDF -->
                    <a target="_blank" href="<?php 
                if (isset($_GET['from']) && isset($_GET['to'])) {
                    $from = $_GET['from'];
                    $to = $_GET['to'];
                    $sd = "sd";
                    $link = "pdfsave.php?from=$from&to=$to&$sd";
                    echo $link;
                }else{
                    $sd = "sd";
                    $link = "pdfsave.php?$sd";
                    echo $link;
                }?>" id="pdfOne" class="btn btn-outline-success fw-bolder px-3">PDF</a>
            </div>
            
                </div>
             
            </div>

            <div id="tableListoneDiv" style="width: 99%;">
                <?php include 'ReportSexDissagregated.php';?>
            </div>
            <div id="tableListtwoDiv" style="width: 99%;">
                <?php include 'ReportTeenmoms.php';?>   
            </div>
            <div id="tableListthreeDiv" style="width: 99%;">
                <?php include 'ReportChildren.php';?>   
            </div>
            <div id="tableListfourDiv" style="width: 99%;">
                <?php include 'ReportAdultfemale.php';?>   
            </div>


            </div>

            <!-- Modal -->
                
                <div class="modal fade" id="userModal"  role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-rounded-circle" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title fw-bold" id="userModalLabel">Report for reference</p>
                                <p type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close">
                                </p>
                            </div>
                            <div class="modal-body">
                                <div id="tableListffiveDiv" style="width: 100%; ">
                                    <?php include 'cases.php';?>   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>  
                <?php include '../loader.php';?>   

        </section>
        
    </main>

</body>

  <!-- TABLE DESIGN AND SEARCH START-->
  <?php include 'footer.php' ;?>
  <script type="text/javascript">
    $('#tableListone').DataTable();
    $('#tableListtwo').DataTable();
    $('#tableListthree').DataTable();
    $('#tableListfour').DataTable();

       

  </script>
  <!-- TABLE DESIGN AND SEARCH END-->
    
</html>