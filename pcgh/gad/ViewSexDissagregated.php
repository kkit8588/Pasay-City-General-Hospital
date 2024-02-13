<?php
$sqlTotal = "SELECT COUNT(*) AS sd FROM form WHERE age >= 0 AND age <= 75";
$sdCompleted = $conn->query($sqlTotal);
$Completedsd = $sdCompleted->fetch_assoc();
?>
<h5 class="mt-4 mb-3"><b>Total:</b> <?php echo $Completedsd['sd'];?></h5>
<table id="viewTablethree" class="table table-bordered" style="width:100%;">
        <caption class="text-center">
            <small>Sex Dissagregated Table</small>
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

            $sqlCompleted = "SELECT * FROM form WHERE (age >= 0 AND age <= 1) OR (age >= 2 AND age <= 12) OR (age >= 13 AND age <= 19) OR (age >= 20 AND age <= 59) OR (age >= 60 AND age <= 74) OR (age <= 75)";
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
                <?php if ($row_completed['age'] <= 1) {
                    echo "Infant";
                }else if($row_completed['age'] >= 2 && $row_completed['age'] <= 12){
                    echo "Children";
                }else if($row_completed['age'] >= 13 && $row_completed['age'] <= 19){
                    echo "Teen";
                }
                else if($row_completed['age'] >= 20 && $row_completed['age'] <= 59){
                    echo "Adult";
                }
                else if($row_completed['age'] >= 60 && $row_completed['age'] <= 74){
                    echo "Senior";
                }else if($row_completed['age'] <= 75){
                    echo "Elderly";
                }
                ?> 
                </td>
               
            </tr>
            <?php } ?>
        
                    
        </tbody>
</table>