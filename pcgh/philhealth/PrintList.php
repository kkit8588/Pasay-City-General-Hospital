<table id="tableList" class="table table-bordered" style="width:100%">
    
    <thead class="table-light">
        <tr>
            <th class="mb-auto">ID</th>
            <th>Patient No.</th>
            <th>Patient ID</th>
            <th>Room Type</th>
            <th>Service Type</th>
            <th>Name</th>
        </tr>
    </thead>
    
    <tbody>
        <?php
            $i=1;

            $qry = $conn->query("SELECT * FROM form WHERE completed='completed' ");
            while($row= $qry->fetch_assoc()):
            ?>
        <tr id="row_">
            <th><?php echo $i++ ?></th>
            <td><?php echo $row['patientno'] ?></td>
            <td><?php echo $row['patientid'] ?></td>
            <td><?php echo $row['roomtype'] ?></td>
            <td><?php echo $row['servicetype'] ?></td>
            <td><?php echo $row['firstname'] ?></td>
        </tr>

            <?php endwhile; ?>
    
                
    </tbody>
</table>