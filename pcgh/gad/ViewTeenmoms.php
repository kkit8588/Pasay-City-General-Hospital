<?php
$sqlTotal = "SELECT COUNT(*) AS teenmoms FROM form WHERE age <= 18 AND servicetype = 'obstetrics' ";
$femaleCompleted = $conn->query($sqlTotal);
$adultFemale = $femaleCompleted->fetch_assoc();
?>
<h5 class="mt-4 mb-3"><b>Total:</b> <?php echo $adultFemale['teenmoms'];?></h5>
<table id="viewTableone" class="table table-bordered" style="width:100%;">
        <caption class="text-center">
            <small>Teen Moms Table</small>
        </caption>
        <thead class="table-light">
            <tr>
                <th>No.</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Patient Id</th>
                <th>Patient No</th>
                <th>Age</th>
                <th>Obstetric</th>
            </tr>
        </thead>
        
        <tbody>

            <?php
            $i=1;

            $sqlCompletedAbove = "SELECT * FROM form WHERE age <= 18 AND servicetype = 'obstetrics' ";
            $aboveCompleted = $conn->query($sqlCompletedAbove);
            while ($row_above = $aboveCompleted->fetch_assoc()) {
            ?>
            <tr id="row_">
                <th><?php echo $i++ ?></th>
                <td><?php echo $row_above['firstname'] ?></td>
                <td><?php echo $row_above['lastname'] ?></td>
                <td><?php echo $row_above['patientid'] ?></td>
                <td><?php echo $row_above['patientno'] ?></td>
                <td><?php echo $row_above['age'] ?></td>
                <td id="tabledata" data-name="<?php echo $row_above['obstetrics'] ?>"><?php echo $row_above['obstetrics'] ?></td>
            </tr>
            <?php } ?>  
        </tbody>
</table>