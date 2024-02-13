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
  //=========================================================
  //pass data-id of for Application for Philhealth into modal
  //=========================================================
  $(".AppPhilhealths").click(function() {

    var userId = $(this).data("user-id");

    $("#userId").val(userId);
    $("#userModal").modal('show');
  });

  //==============================
  //submit requirement in database
  //==============================
  var radioForm = "#radioForm";

  $(radioForm).submit(function (events) {
    events.preventDefault();

        var radioFormData = $(this).serialize();

        $.ajax({
            url: '../controller/reqConfirm.php',
            type: "POST",
            data: radioFormData,
            dataType: 'json',
            beforeSend: function(){
                $('.loader').addClass('show');
            },
            success: function () {

            }
        });
           setTimeout(function () {
                $('.loader').removeClass('show');
                $("#userModal").modal('hide');
                window.location.href = 'list.php';
            }, 1000);                    
    });

});




  </script>
  
  
</body>
  
</html>