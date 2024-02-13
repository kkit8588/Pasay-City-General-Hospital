<table id="tableList" class="table table-bordered" style="width:100%">
        <div class="d-flex">
            <a href="pdfsave.php" id="completed" class="btn btn-success btn-sm mb-2 ms-auto" target="_blank">Completed</a>
        </div>
    <thead class="table-light">
        <tr>
            <th class="mb-auto">ID</th>
            <th>Patient No.</th>
            <th>Patient ID</th>
            <th>Room Type</th>
            <th>Service Type</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    
    <tbody>
        <?php
            $i=1;

            $qry = $conn->query("SELECT * FROM form WHERE fafp='fafp' ");
            while($row= $qry->fetch_assoc()):
            ?>
        <tr id="row_">
        <th><?php echo $i++ ?></th>
        <td><?php echo $row['patientno'] ?></td>
        <td><?php echo $row['patientid'] ?></td>
        <td><?php echo $row['roomtype'] ?></td>
        <td><?php echo $row['servicetype'] ?></td>
        <td><?php echo $row['firstname'] ?></td>
        <td><?php if($row['completed'] == "completed"){
                    echo "<center><span class='badge text-bg-success mx-auto'>completed</span></center>";
            }else{  echo "<center><span class='badge text-bg-warning mx-auto'>not completed</span></center>";
        }
            ?></td>
        <td>
            <div class="dropdown">
                <a class="btn d-default d-inline-block btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Action
                </a>

                <ul class="dropdown-menu">
                <li><a class="dropdown-item AppPhilhealths"  role="button" id="AppPhilhealth"
              data-user-id="<?php echo $row['id'] ?>">for Application for Philhealth</a></li>
                </ul>
            </div>
        </td>

            <?php endwhile; ?>
    
                
    </tbody>
</table>