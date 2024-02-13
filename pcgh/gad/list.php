<?php include 'sessionLimit.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List</title>
    <?php include 'header.php' ?>

</head>
<body>
    
    <?php include 'sidebar.php' ?>

    <main class="hmsBody ">

       <?php include 'headermenu.php' ?>

        <section class="hmshero p-4">
            <h3 class="hmstitle mt-3">List View</h3>
            <hr>
            <div class="card-body table-responsive">

            <div class="d-flex flex-column row-gap-2"> 
                <div class="d-flex column-gap-1">
                    <div>
                        <a href="pdfReport.php" target="_blank" class="btn btn-info fw-bold text-white">Report</a>
                        <button id="tmID" type="button" class="categoryBtn btn btn-outline-primary fw-bold active" >Teen Moms</button>
                        <button id="wcpuID" type="button" class="categoryBtn btn btn-outline-primary fw-bold" >WCPU</button>
                        <button id="sdID" type="button" class="categoryBtn btn btn-outline-primary fw-bold" >Sex Dissagrigated</button>
                    </div>
                    <div id="selectContainer" class="d-flex column-gap-1">
                        <select id="selectTm" class="form-select col-1 col-sm-1">
                            <option data-name="all" selected>Show All</option>
                            <option data-name="Pre-natal" value="PreNatal">1. Pre Natal</option>
                            <option data-name="Post-natal" value="PostNatal">2. Post Natal</option>
                        </select>
                        <select id="selectWcpu" class="form-select col-1 col-sm-1 ">
                            <option value="all" selected>Show All</option>
                            <option value="Children">1. Children</option>
                            <option value="Adult Female">2. Adult Female</option>
                        </select>
                        <select id="selectSd" class="form-select col-1 col-sm-1 ">
                            <option value="all" selected>Show All</option>
                            <option value="Infant">1. Infant</option>
                            <option value="Children">2. Children</option>
                            <option value="Teen">3. Teen</option>
                            <option value="Adult">4. Adult</option>
                            <option value="Senior">5. Senior</option>
                            <option value="Elderly">6. Elderly</option>
                        </select>
                    </div>
                </div>     
                <div id="tableListoneDiv" style="width: 99%;">
                    <?php include 'ViewTeenmoms.php';?>   
                </div>
                <div id="tableListtwoDiv" style="width: 99%;">
                    <?php include 'ViewWcpu.php';?>   
                </div>
                <div id="tableListthreeDiv" style="width: 99%;">
                    <?php include 'ViewSexDissagregated.php';?>
                </div>


            </div>   

        </section>
        
    </main>

</body>

  <!-- TABLE DESIGN AND SEARCH START-->
  <?php include 'footer.php' ;?>
  <script type="text/javascript">
    $('#viewTableone').DataTable();
    $('#viewTabletwo').DataTable();
    $('#viewTablethree').DataTable();


           
        $(document).ready(function () {
            /*=================================
                    add active indicator
            ==================================*/
            $('.categoryBtn').click(function () {
                $('.categoryBtn').removeClass('active');
                $(this).addClass('active');
            });

            /*==================================
            each button click display select tag
            ==================================*/

            $('#tableListtwoDiv').hide();
            $('#tableListthreeDiv').hide()

            $('#selectWcpu').hide();
            $('#selectSd').hide()

            $('#tmID').click(function () {
                $('#selectTm, #tableListoneDiv').show();
                $('#selectSd, #selectWcpu, #tableListtwoDiv, #tableListthreeDiv' ).hide();
            });

            $('#wcpuID').click(function () {
                $('#selectWcpu, #tableListtwoDiv').show();
                $('#selectSd, #selectTm, #tableListoneDiv, #tableListthreeDiv').hide();
            });

            $('#sdID').click(function () {
                $('#selectSd, #tableListthreeDiv').show();
                $('#selectWcpu, #selectTm, #tableListoneDiv, #tableListtwoDiv').hide();
            });

            /*==================================
                filter table for #selectTm
            ==================================*/
            $("#selectTm").on("change", function () {
            var selectedDataName = $(this).find("option:selected").attr("data-name");
            $("#viewTableone tbody tr").each(function () {
                var rowDataName = $(this).find("td[data-name]").attr("data-name");
                if (rowDataName === selectedDataName || selectedDataName === "all") {
                    $(this).show(); // Show the row
                } else {
                    $(this).hide(); // Hide the row
                }
              });
            });

           /*==================================
                filter table for #selectWcpu
            ==================================*/
           $("#selectWcpu").change(function () {
            // Need this toLowerCase() for Convert the lowercase for case-insensitive comparison
                var selectedDataName = $(this).val().toLowerCase();
                $("#viewTabletwo tbody tr").each(function () {
                    var rowDataName = $(this).find("td").text().toLowerCase(); 
                    if (rowDataName.indexOf(selectedDataName) !== -1 || selectedDataName === "all") {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

           /*==================================
                filter table for #selectSd
            ==================================*/
           $("#selectSd").change(function () {
            // Need this toLowerCase() for Convert the lowercase for case-insensitive comparison
                var selectedDataName = $(this).val().toLowerCase();
                $("#viewTablethree tbody tr").each(function () {
                    var rowDataName = $(this).find("td").text().toLowerCase(); 
                    if (rowDataName.indexOf(selectedDataName) !== -1 || selectedDataName === "all") {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });


       
    });

   
  </script>
  <!-- TABLE DESIGN AND SEARCH END-->
    
</html>