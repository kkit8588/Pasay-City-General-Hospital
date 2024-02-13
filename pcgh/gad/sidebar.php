<nav id="sidebarID" class="sidebar py-3 px-4">
	<div class="justify-content-center mt-3 d-flex">
		<img src="../upload/logo.png" width="50" height="50">
		<h5 class="logotext fw-bolder text-white ms-2 my-auto">PCGH</h5>

	</div>
	<hr class="sidebar-divider  my-4">
	<ul class="navbar-nav mt-3">
		<li class="nav-item py-1 ">
			<a href="dashboard.php" class="nav-link">
				<i class="fa-solid fa-gauge py-1"></i>
				<span class="navtext px-1">Dashboard</span>
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
			    	<a class="nav-link" href="list.php">
			    		<i class="fa-solid fa-chevron-right"></i>
			    		<span class="navtext">List</span>
			    	</a>
			    </li>
			    <li class="nav-item">
			    	<a class="nav-link" href="pdfReport.php">
			    		<i class="fa-solid fa-chevron-right"></i>
			    		<span class="navtext">Report</span>
			    	</a>
			    </li>
			  </ul>
			</div>
		</li>
	</ul>	
</nav>