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
            <h3 class="hmstitle mt-3">Table</h3>
            <hr>
            <div class="card-body table-responsive pb-5">

                <table id="tableList" class="table table-bordered" style="width:100%">
                    <thead class="table-light">
                        
                        <tr>
                            <th class="mb-auto">ID</th>
                            <th>Patient No.</th>
                            <th>Patient ID</th>
                            <th>Room Type</th>
                            <th>Service Type</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody class="">
                        <?php
                            $i=1;
                            $qry = $conn->query("SELECT * FROM form");
                            while($row= $qry->fetch_assoc()):
                            ?>
                        <tr id="row_">
                        <th><?php echo $i++ ?></th>
                        <td><?php echo $row['patientno'] ?></td>
                        <td><?php echo $row['patientid'] ?></td>
                        <td><?php echo $row['roomtype'] ?></td>
                        <td><?php echo $row['servicetype'] ?></td>
                        <td><?php echo $row['firstname'] ?></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn d-default d-inline-block btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                                </a>

                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="form.php" target="_blank">Add</a></li>

                               <?php
                                $userType = $_SESSION['user_type'];
                                if ($userType == 'Admission') {
                                    echo '<li><a class="dropdown-item" href="form.php?id=' . $row['id'] . '" target="_blank">Edit</a></li>';
                                }
                                ?>
                                
                                <li><a class="dropdown-item" href="pdfsave.php?id=<?php echo $row['id'] ?>" target="_blank">Print</a></li>

                                <li>
                                    <button class="dropdown-item AppPhilhealths"  role="button" id="AppPhilhealth" value="<?php echo $row['id'] ?>" >for Application for Philhealth</button>
                                </li>
                                </ul>
                            </div>
                        </td>

                            <?php endwhile; ?>
                    
                                
                    </tbody>
                </table>
            </div>    
            <div class="modal fade" id="userModal"  role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content shadow">
                            <form id="fafpID">
                                <div class="modal-header d-flex" >
                                        <input type="hidden" name="id" id="userId">
                                        <input type="hidden" name="fafp" value="fafp" text>
                                        <h5 class="modal-title">Are you sure?</h5>
                                        <button type="button" class="btn-close mb-auto" data-bs-dismiss="modal"  aria-label="Close">
                                </button>
                                </div>
                                <div class="modal-body d-flex">
                                        <input type="submit" name="submit" value="Yes" class="btn btn-sm ms-auto btn-primary ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  




        </section>
        
        <?php include '../loader.php';?>
    </main>

</body>
  <!-- TABLE DESIGN AND SEARCH START-->
  <?php include 'footer.php' ;?>
  <script type="text/javascript">
    
    $('#tableList').DataTable();
  </script>
  <!-- TABLE DESIGN AND SEARCH END-->
    
</html>