<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

  <!-- CHART JS -->
  <script type="text/javascript" src="../plugins/chart/chart.min.js"></script>
  <script type="text/javascript" src="../plugins/chart/chart.js"></script>

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- CUSTOM JAVASCRIPT -->
  <script type="text/javascript" src="../assets/js/script.js"></script>
  <!-- BOOTSTRAP JS OFFLINE -->
  <script type="text/javascript" src="../plugins/bootstrap5/bootstrap.min.js"></script>
  <!-- FONT AWESOME OFFLINE -->
  <script src="https://kit.fontawesome.com/72d342fbd8.js" crossorigin="anonymous"></script>
  
  <!-- TABLE DESIGN AND SEARCH START-->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <!-- TABLE DESIGN AND SEARCH END-->

  <script>
   $(document).ready(function() {

    $("#childContainer").hide();

    $("#tableListoneDiv")
    $("#tableListtwoDiv").hide();
    $("#tableListthreeDiv").hide();
    $("#tableListfourDiv").hide();

    // PDF button
    $("#pdfOne");
    $("#pdfTwo").hide();
    $("#pdfThree").hide();
    $("#pdfFour").hide();

    // Get the values of the options
    WCPUCases = "WCPUCases";
    SexDissagregated = "SexDissagregated";
    TeenMomsCases  = "TeenMomsCases";
    child = "child";
    adult = "adult";

    $("#parentSelect").change(function() {
        var selectedParent = $(this).val();
        // Hide all table divs by default

        // Show the appropriate table based on the selected option
        if (selectedParent === SexDissagregated) {
            $("#tableListoneDiv, #pdfOne").show();
            $("#tableListtwoDiv, #tableListthreeDiv, #tableListfourDiv").hide();
            $("#pdfTwo, #pdfThree, #pdfFour, #childContainer").hide();
        } else if (selectedParent === WCPUCases) {
            $("#tableListthreeDiv, #pdfFour, #pdfThree, #childContainer").show();
            $("#tableListoneDiv, #tableListtwoDiv, #tableListfourDiv").hide();
            $("#pdfOne, #pdfTwo").hide();
            $("#childSelect").change(function() {
                var selectedChild = $(this).val();
                if (selectedChild === adult){
            $("#tableListfourDiv, #childContainer").show();
            $("#tableListoneDiv, #tableListthreeDiv, #tableListtwoDiv").hide();
                }else if (selectedChild === child){
            $("#tableListthreeDiv, #childContainer").show();
            $("#tableListoneDiv, #tableListtwoDiv, #tableListfourDiv").hide();
                }
            });

        } else if (selectedParent === TeenMomsCases){
            $("#tableListtwoDiv, #pdfTwo").show();
            $("#tableListthreeDiv, #tableListoneDiv, #tableListfourDiv").hide();
            $("#pdfFour, #pdfOne, #pdfThree, #childContainer").hide();
        }
    });

});


      $(document).ready(function() {
        
        $('#filterID').submit(function(event) {
            event.preventDefault()
                var from = $('#from').val();
                 var to = $('#to').val();
                $.ajax({
                    url: '../controller/filter.php', // Replace with the path to your PHP script
                    method: 'GET',
                    data: {from: from, to: to},
                    success: function() {
                    }
                });
            });
        });

  </script>
  
  
</body>
  
</html>