<?php include 'sessionLimit.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List of Application for Philhealth</title>
    <?php include 'header.php' ?>
</head>
<body class="overflow-hidden">
    
    <?php include 'sidebar.php' ?>

    <main class="hmsBody ">

       <?php include 'headermenu.php' ?>

        <section class="hmshero p-4">
            <h3 class="hmstitle mt-3">List of Application for Philhealth</h3>
            <hr>
            <div class="card-body table-responsive pb-5">
                <?php include 'TableList.php'; ?>
            </div>

            <!-- Modal -->
                
                <div class="modal fade" id="userModal"  role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="userModalLabel">User Requirements</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close">
                                </button>
                            </div>
                            <form id="radioForm">
                                <div class="modal-body py-4 px-3" >
                                        <input type="hidden" name="id" id="userId">
                                        <input type="text" name="completed" value="completed" hidden>
                                        <div class="form-check">
                                          <input class="form-check-input" name="req_one" type="checkbox" value="Birth Certificate of patient" id="req_one">
                                          <label class="form-check-label" for="req_one">
                                            <b>1.</b> Birth Certificate of patient
                                          </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" name="req_two" type="checkbox" value="Valid Id if valid id not applicable == Barangay Clearance" id="req_two" >
                                          <label class="form-check-label" for="req_two">
                                            <b>2.</b> Valid Id if valid id not applicable == Barangay Clearance
                                          </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" name="req_three" type="checkbox" value="Marriage Certificate if married" id="req_three" >
                                          <label class="form-check-label" for="req_three">
                                            <b>3.</b> Marriage Certificate if married 
                                          </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" name="req_four" type="checkbox" value="Birth Certificate of Guardian" id="req_four" >
                                          <label class="form-check-label" for="req_four">
                                            <b>4.</b> Birth Certificate of Guardian
                                          </label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                        <input type="submit" name="requirements" value="Submit" class="btn btn-primary">
                                </div>
                            </form>
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
    $('#tableList').DataTable();
  </script>
  <!-- TABLE DESIGN AND SEARCH END-->
    
</html>