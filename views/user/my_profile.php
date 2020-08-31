<?php 
	session_start();
	$title = "My Transactions";
	function get_content() {
?>
	<main>
		<!-- Header section -->
		<div class="row col-md-12 mx-auto">
			<div class="tc1 title-word1 px-5 pt-4 col-lg-6">
				<h1 class="admin-word dark-beige">My Transactions</h1>
			</div>	
			<div class="tc1 m-auto pt-4 px-5 col-lg-6">
				<div class="float-right float-unset1">
					<div class="row m-0 p-0">
						<div class="col-lg-6 m-0 p-0">
							<form method="post" action="">
								<input type="text" name="search" placeholder="Search" class='title-btn1 px-4 py-3 btn font-weight-bold mx-auto r-50 '>
							</form>	
						</div>
						<div class="col-lg-6 m-0 px-4 padding-btn"> 
							<select name="taskOption" class='darkgreen title-btn1 px-4 py-3 btn font-weight-bold mx-auto r-50 '>
								<option type="submit" value="1">Borrowed Assets</option>
								<option type="submit" value="2">Penalty</option>
							</select>		
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!--Desktop Version Table Section -->
		<div class="data-table container-fluid r-25 mt-4 darkgreen text-center font-weight-bold">
			<!-- Table Head -->
			<div class="row mx-5">
				<div class="col-sm-3 px-5 py-4 bg-grey bl">Barcode</div>
				<div class="col-sm-3 px-5 py-4 bg-grey">Item Title</div>
				<div class="col-sm-3 px-5 py-4 bg-grey">Due Date</div>
				<div class="col-sm-3 px-5 py-4 bg-grey br">Late Return</div> 
			</div>
			<!-- Table Row -->
			<div class="row mx-5">
				<div class="col-sm-3 px-5 py-4 bg-white tl">A0051</div>
				<div class="col-sm-3 px-5 py-4 bg-white">Chair</div>
				<div class="col-sm-3 px-5 py-4 bg-white">2 June 2020</div>
				<div class="col-sm-3 px-5 py-4 bg-white tr">3 Days</div> 
			</div>
		</div>
		
		<!-- Mobile Version Table Section -->
		<section class="col-md-12 mx-4 mt-3 p-5 padding-0 mx-auto">
			<div class="row justify-content-center">
				<!-- Repeating Cards -->
				<div class="col-md-6 col-lg-4 col-sm-6 my-3">
					<div class="text-center bg-white br bl tr tl">
						<div class="bg-lightgreen br bl">
							<h5 class="m-0 font-weight-bold p-3 dark-beige">Barcode</h5>		
						</div>
						<div class="bg-white">
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0">Item Title</h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0">Chair</h5>	
								</div>
							</div>
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0">Due Date</h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0">2 June 2020</h5>
								</div>
							</div>
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0">Late Return</h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0">3 Days</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-sm-6 my-3">
					<div class="text-center bg-white br bl tr tl">
						<div class="bg-lightgreen br bl">
							<h5 class="m-0 font-weight-bold p-3 dark-beige">Barcode</h5>		
						</div>
						<div class="bg-white">
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0">Item Title</h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0">Chair</h5>	
								</div>
							</div>
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0">Due Date</h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0">2 June 2020</h5>
								</div>
							</div>
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0">Late Return</h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0">3 Days</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-sm-6 my-3">
					<div class="text-center bg-white br bl tr tl">
						<div class="bg-lightgreen br bl">
							<h5 class="m-0 font-weight-bold p-3 dark-beige">Barcode</h5>		
						</div>
						<div class="bg-white">
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0">Item Title</h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0">Chair</h5>	
								</div>
							</div>
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0">Due Date</h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0">2 June 2020</h5>
								</div>
							</div>
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0">Late Return</h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0">3 Days</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Repeating Cards End -->
			</div>
		</section>
	</main>
<?php 
	}
	require "../layout.php";
 ?>


