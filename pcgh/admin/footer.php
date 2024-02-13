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

/* ================================================
 Display the current year and generated random number
   ================================================ */
        $('.generateButton').click(function () {
            var patientno; // Declare patientno variable
            var patientid; // Declare patientid variable

            if ($(this).val() == 'patientnoButton' ) {
                patientno = Math.floor(100000 + Math.random() * 900000);

                // Display the generated random number
                $('#patientno').val(patientno);
            } else if ($(this).val() == 'patientidButton' ) {
                var currentYear = new Date().getFullYear();

                // Generate a random number (6 digits in this example)
                patientid = Math.floor(100000 + Math.random() * 900000);

                var combined = currentYear.toString() + '-' + patientid.toString();

                // Display the current year and generated random number
                $('#patientid').val(combined);
            }

        
/* ================================================
 Send both random numbers to the server for validation
   ================================================ */
            $.ajax({
            type: 'POST',
            url: '../controller/patientidnumController.php', // The PHP script for validation
            data: { patientno: patientno, patientid: patientid },
            success: function (response) {
                var resultHtml = '';

                if (response.patientno === 'valid') {
                    resultHtml += '<p class="text-success">Random number ' + patientno + ' is valid and unique.</p>';
                } else {
                    resultHtml += '<p class="text-danger">Random number ' + patientno + ' already exists in the database.</p>';
                }

                if (response.patientid === 'valid') {
                    resultHtml += '<p class="text-success">Random number is valid and unique.</p>';
                } else {
                    resultHtml += '<p class="text-danger">Random number already exists in the database.</p>';
                }

                $('#result').html(resultHtml);
            }
        });
    });


$(document).on('click', '.AppPhilhealths', function() {
  //=========================================================
  //pass data-id of for Application for Philhealth into modal
  //=========================================================
    var userId = $(this).val();
    $('#userModal').modal('show');
    $('#userId').val(userId);  
}); 

$(document).ready(function() {
  //==============================
  //submit requirement in database
  //==============================
  var formIds = "#formIds";

  $(formIds).submit(function (a) {
    a.preventDefault();
        var formIdsData = $(this).serialize();

        $.ajax({
            url: '../controller/formController.php',
            type: "POST",
            data: formIdsData,
            beforeSend: function(){
                $('.loader').addClass('show');
            },
            success: function () {

            }
        });
           setTimeout(function () {
                $('.loader').removeClass('show');
                location.reload();
            }, 1000);                    
    });


  var fafpID = "#fafpID";

  $(fafpID).submit(function () {

        var fafpIDData = $(this).serialize();

        $.ajax({
            url: '../controller/reqController.php',
            type: "POST",
            data: fafpIDData,
            beforeSend: function(){
                $('.loader').addClass('show');
            },
            success: function () {
                
            }
        });
           setTimeout(function () {
                $('.loader').removeClass('show');
                $("#userModal").modal('hide');
            }, 1000);                    
    });

  // Get the current date
    const currentDate = new Date().toISOString().split('T')[0];
            $("#created_at").val(currentDate);
});




  </script>
  
  
</body>
  
</html>