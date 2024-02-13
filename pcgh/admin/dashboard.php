<?php include 'sessionLimit.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <?php include 'header.php' ?>
</head>
<body>
    
    <?php include 'sidebar.php' ?>

    <main class="hmsBody ">

       <?php include 'headermenu.php' ?>

        <section class="hmshero p-4">
            <h3 class="hmstitle mt-3">Dashboard</h3>
            <hr>
            <!-- CARDS FOR TOP ON DASHBOARD -->
            <div class="row">

                <!-- card1 -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-primary border-5 border-end-0 border-top-0 border-bottom-0 shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col me-2">
                                    <small class="text-xs fw-bold text-primary text-uppercase mb-1">
                                        Total Patients</small>
                                    <?php 
                                    $sqlTotal = "SELECT COUNT(*) AS total FROM form" ;
                                    $query = $conn->query($sqlTotal);
                                    $display = $query->fetch_assoc();
                                    ?>
                                    <div class="fs-1 fw-bold text-secondary"><?php echo $display['total']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-bed fs-1 text-secondary" style=" opacity: 0.3;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card2 -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-success border-5 border-end-0 border-top-0 border-bottom-0 shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col me-2">
                                    <small class="text-xs fw-bold text-success text-uppercase mb-1">
                                        Total Teen Moms Patient</small>
                                        <?php
                                        $sqlTotal = "SELECT COUNT(*) AS teenmoms FROM form WHERE age <= 18 AND servicetype = 'obstetrics' ";
                                        $femaleCompleted = $conn->query($sqlTotal);
                                        $teenmoms = $femaleCompleted->fetch_assoc();
                                        ?>
                                    <div class="fs-1 fw-bold text-secondary"><?php echo $teenmoms['teenmoms']?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-person-breastfeeding fs-1 text-secondary" style="opacity: 0.3;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card3 -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-info border-5 border-end-0 border-top-0 border-bottom-0 shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col me-2">
                                    <small class="text-xs fw-bold text-info text-uppercase mb-1">Total WCPU Patients
                                    </small>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <?php
                                                $sqlTotal = "SELECT COUNT(*) AS adultFemale FROM form WHERE age >= 0 AND wcpu = 'Yes' ";
                                                $femaleCompleted = $conn->query($sqlTotal);
                                                $adultFemale = $femaleCompleted->fetch_assoc();
                                                ?>
                                            <div class="fs-1 fw-bold text-secondary"><?php echo $adultFemale['adultFemale']?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-users fs-1 text-secondary" style="opacity: 0.3;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            


            <!-- CHART -->
            <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 fw-bold text-primary">Graph for Total Patients Each Month</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" >
                                    <div class="chart-area d-flex justify-content-center align-items-center" style="height: 21.3rem !important;">
                                        <canvas id="myAreaChart" class=""  ></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Doughnut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 fw-bold text-primary">Graph For Different Total</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie d-flex">
                                        <canvas id="myDoughnutChart" class=" m-sm-auto "></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        </section>
       
   </main>
   


</body>

    <?php include 'footer.php' ;?>
    <?php include '../plugins/chart/chart.php'; ?>

</html>