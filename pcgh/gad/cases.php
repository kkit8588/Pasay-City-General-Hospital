<table class="table table-bordered " style="width:100%;">
        <thead class="table-light">
            
            <tr>
                <th>No.</th>
                <th>Pasig</th>
                <th>Non Pasig</th>
            </tr>
        </thead>
        
        <tbody>

            <?php
            $i=1;
                // Query and count for Prenatal in the current age range
                $sqlCompletedPasig = "SELECT COUNT(*) AS pasig FROM form WHERE age <= 18 AND (obstetrics = 'Pre-natal' OR obstetrics = 'Post-natal') AND city= 'Pasig' ";
                $pasigCompleted = $conn->query($sqlCompletedPasig);
                $row_pasig = $pasigCompleted->fetch_assoc();
                $pasigResults = $row_pasig['pasig'];
               
                $sqlCompletedOthers = "SELECT COUNT(*) AS others FROM form WHERE age <= 18 AND (obstetrics = 'Pre-natal' OR obstetrics = 'Post-natal') AND city= 'others' ";
                $othersCompleted = $conn->query($sqlCompletedOthers);
                $row_others = $othersCompleted->fetch_assoc();
                $othersResults = $row_others['others'];
      
            ?>
            <tr id="row_">
                <th><?php echo $i++ ?></th>
                <td><?php echo $pasigResults ?></td>
                <td><?php echo $othersResults ?></td>
            </tr>
        
                    
        </tbody>
</table>