<?php 
	session_start();
	$title = "DashBoard";
	function get_content() {
?>


<main>
<div class="row col-md-12 mx-auto">
	<div class="pl-5 pt-4 col-md-6">
		<h1 class="admin-word dark-beige">Dashboard</h1>
	</div>	
</div>
<div class="p-5 container-fluid col-md-12">
	<div class="row">
		<div class="px-5 col-md-6">
			<div class="bg-grey r-25 ">
				<div class="row mx-auto p-3">
					<h2 class="darkgreen font-weight-bold ml-3 mt-2">Pending Approval</h2>
					<input type="text" name="search" placeholder="Search" class='px-3 py-2 btn font-weight-bold ml-auto mr-3 r-50 '>
				</div> 
				<div class="row bg-white mx-auto p-3 tr tl">
					<div class="p-5">
						
					</div>
				</div> 
			</div>
		</div>
		<div class="px-5 col-md-6">
			<div class="bg-grey r-25">
				<div class="row mx-auto p-3">
					<h2 class="darkgreen font-weight-bold ml-3 mt-2">Pending Payment</h2>
					<input type="text" name="search" placeholder="Search" class='px-3 py-2 btn font-weight-bold ml-auto mr-3 r-50 '>
				</div> 
				<div class="row bg-white mx-auto p-3 tr tl">
					<div class="p-5">
						
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>

<?php 
	}
	require "../layout.php";
 ?>

</main>
<!-- <div class="row mx-auto p-3">
					<h2 class="darkgreen font-weight-bold ml-3 mt-2">Pending Approval</h2>
					<input type="text" name="search" placeholder="Search" class='px-3 py-2 btn font-weight-bold ml-auto mr-3 r-50 '>
				</div> -->