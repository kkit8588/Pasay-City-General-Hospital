<?php
$sqlTotal = "SELECT COUNT(*) AS adultFemale FROM form WHERE age >= 0 AND wcpu = 'Yes' ";
$femaleCompleted = $conn->query($sqlTotal);
$adultFemale = $femaleCompleted->fetch_assoc();
?>
<h5 class="mt-4 mb-3"><b>Total:</b> <?php echo $adultFemale['adultFemale'];?></h5>
<table id="viewTabletwo" class="table table-bordered" style="width:100%;">
        <caption class="text-center">
            <small>WCPU Table</small>
        </caption>
        <thead class="table-light">
            
            <tr>
                <th>No.</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Patient Id</th>
                <th>Patient No</th>
                <th>Age</th>
                <th>Age Group</th>
            </tr>
        </thead>
        
        <tbody>

            <?php
            $i=1;

            $sqlCompleted = "SELECT * FROM form WHERE (age <= 17 AND wcpu = 'Yes') OR (age >=18 AND gender = 'Female' AND wcpu = 'Yes')";
            $completed = $conn->query($sqlCompleted);
            while ($row_completed = $completed->fetch_assoc()) {
            ?>
            <tr id="row_">
                <th><?php echo $i++ ?></th>
                <td><?php echo $row_completed['firstname'] ?></td>
                <td><?php echo $row_completed['lastname'] ?></td>
                <td><?php echo $row_completed['patientid'] ?></td>
                <td><?php echo $row_completed['patientno'] ?></td>
                <td><?php echo $row_completed['age'] ?></td>
                <td id="tabledata">
                <?php if ($row_completed['age'] >= 18) {
                    echo "Adult Female";
                }else if($row_completed['age'] <= 17){
                    echo "Children";
                }
                ?> 
                </td>
               
            </tr>
            <?php } ?>
        
                    
        </tbody>
</table>