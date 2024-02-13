
<?php 
    session_start();
    include '../connect.php';

    if(!isset($_SESSION['admin_id'])){
        header("Location: ../login.php");
    }

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <?php include 'header.php' ?>
</head>
<body>
    <nav id="sidebarID" class="sidebar py-3 px-4">
        <div class="justify-content-center mt-3 d-flex">
            <img src="../upload/logo.png" width="50" height="50">
            <h5 class="logotext fw-bolder text-white ms-2 my-auto">PCGH</h5>

        </div>
        <hr class="sidebar-divider  my-4">
        <ul class="navbar-nav mt-3">
            <li class="nav-item py-1 ">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-gauge py-1"></i>
                    <span class="navtext px-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item py-1">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-gear py-1"></i>
                    <span class="navtext px-1">Settings</span>
                </a>
            </li>
            <li class="nav-item py-1">
                <a id="formBtn" class="nav-link d-flex align-items-center w-100" data-bs-toggle="collapse" href="#collapseForm" role="button" aria-expanded="false" aria-controls="collapseForm">
                    <i class="fa-solid fa-users py-1"></i>
                    <span class="navtext px-1">Form</span>
                    <i class="formIcon fa-solid fa-chevron-left ms-auto"></i>
                </a>
                <div class="collapse ms-2" id="collapseForm">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="form.php">
                            <i class="fa-solid fa-chevron-right"></i>
                            <span class="navtext">Add New</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-chevron-right"></i>
                            <span class="navtext">List</span>
                        </a>
                    </li>
                  </ul>
                </div>
            </li>
        </ul>   
    </nav>

    <main class="hmsBody ">
        <header class="hmsheader container-fluid bg-white py-4">
            <div class="d-flex flex-nowrap">
                <div class="my-auto">
                    <i id="menuIcon" class="fa-solid fa-bars fs-5" role="button" ></i>
                </div>
                <form class="col-6 ms-3" hidden>
                    <div class="d-flex justify-content-center align-items-center">
                    <input type="search" class="search form-control" placeholder="Search">
                    <div class="searchDiv rounded-end d-flex">
                        <i class="fa-solid fa-magnifying-glass fs-5 m-auto"></i>
                    </div>
                    </div>
                </form>
                <div class="profileImg d-flex w-100 ">
                    <button class="profileBtn ms-auto" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../upload/profile.png" width="35" height="35" class="rounded-pill border border-dark">
                    </button>
                     <ul class="dropdown-menu">
                        <li><a  class="dropdown-item">Hello, Admin <b><?php echo $_SESSION['admin_username']; ?></b></a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                     </ul>
                </div>

            </div>
            
        </header>
        <section class="hmshero p-4">
            <h3 class="hmstitle mt-3">Table</h3>
            <hr>
            <div class="card-body table-responsive pb-5">
                <table id="tableList" class="table table-striped pb-5" style="width:100%">
                    <thead>
                        <tr>
                            <th class="mb-auto">ID</th>
                            <th>Type</th>
                            <th>Patient No.</th>
                            <th>Patient ID</th>
                            <th>Room Type</th>
                            <th>Service Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- <tbody id="formList"> -->
                        <tbody>
                        <?php
                            $qry = $conn->query("SELECT * FROM form");
                            while($row= $qry->fetch_assoc()):
                            ?>
                        <tr id="row_<?php echo $row['id']; ?>">
                        <th><?php echo $row['id'] ?></th>
                        <td><?php echo $row['patientid'] ?></td>
                        <td><?php echo $row['patientno'] ?></td>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['middlename'] ?></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                                </a>

                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="form.php">Add</a></li>
                                <li><a class="dropdown-item" href="./form.php?id=<?php echo $row['id'] ?>">Edit</a></li>
                                <li><a class="dropdown-item"  role="button" onclick="prepareDelete(<?php echo $row['id'] ?>)">Delete</a></li>
                        
                                </ul>
                                <!-- <div id="successMessage" class="alert alert-success mt-3" style="display: none;">
                                    Record deleted successfully.
                                </div> -->
                            </div>
                        </td>

                            <?php endwhile; ?>
                    
                                
                    </tbody>
                </table>
            </div>  
            <!-- <div id="loadingIndicator" class="text-center" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div> -->

            <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <b>Are you sure you want to delete this? </b>
                            </div>
                            <div class="modal-footer">
                                <form method="post" action="../controller/deleteController.php">
                                    <input style="display: none;" type="text" name="rowid" id="rowid" >
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-danger"  name="deleted" value="Deleted">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>      

        </section>
        
    </main>

</body>
 <!-- TABLE DESIGN AND SEARCH START-->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript">
    new DataTable('#tableList');
  </script>
  <!-- TABLE DESIGN AND SEARCH END-->
    <?php include 'footer.php' ;?>
</html>
