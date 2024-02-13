<header class="hmsheader container-fluid bg-white py-4 position-sticky" style="top: 0; z-index: 1000;">
	<div class="d-flex flex-nowrap">
		<div class="my-auto">
			<i id="menuIcon" class="fa-solid fa-bars fs-5" role="button" ></i>
		</div>
		<div class="col-auto mx-auto">
			<h4 class="fw-bold "><?php
				if ($_SESSION['user_type'] == "Er") {
				    echo "Emergency Room";
				} else {
				    echo $_SESSION['user_type'];
				}
				?> Account
			</h4>
		</div>
		<div class="profileImg d-flex">
			<button class="profileBtn ms-auto" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="../upload/profile.png" width="35" height="35" class="rounded-pill border border-dark">
			</button>
			 <ul class="dropdown-menu">
			 	<li><a  class="dropdown-item">Hello, Admin <b><?php echo $_SESSION['user_username']; ?></b></a></li>
			    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
			 </ul>
		</div>

	</div>
	
</header>