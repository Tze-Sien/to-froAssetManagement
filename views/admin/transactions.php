<?php 
	session_start();
	$title = "Transaction";
	function get_content() {
?>
<main>
<div class="row col-md-12 mx-auto">
	<div class="pl-5 pt-4 col-md-6">
		<h1 class="admin-word dark-beige">Transations</h1>
	</div>	
	<div class="m-auto pt-4 pl-5 col-md-6">
		<input type="text" name="search" placeholder="Search" class='px-4 py-3 btn font-weight-bold mr-3 r-50 '>
		<select class='px-4 py-3 btn darkgreen font-weight-bold bg-white r-50 '> 
		    <option value=<?php echo $i = "0" ?>><a href="#">Due Transations</a></option>	
		    <option value=<?php echo $i = "1" ?>><a href="">Borrow</a></option>
		    <option value=<?php echo $i = "2" ?>>Return</option>
		</select>
		<?php echo $i ?>
	</div>		
</div>
	<div class="data-table container-fluid r-25 mt-4 darkgreen text-center font-weight-bold">
	  	<div class="row mx-5">
	    	<div class="col-sm-2 px-5 py-4 bg-grey bl">Item Id</div>
		    <div class="col-sm-2 px-5 py-4 bg-grey">Item Name</div>
		    <div class="col-sm-2 px-5 py-4 bg-grey">Borrowed By</div>
		    <div class="col-sm-2 px-5 py-4 bg-grey">Due Days</div>
		    <div class="col-sm-2 px-5 py-4 bg-grey">Prenalty Amount</div>
		    <div class="col-sm-2 px-5 py-4 bg-grey br">Actions</div> 
		</div>
	</div>

	<section class="col-md-12 mx-4 mt-3 p-5 mx-auto">
			<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4 col-sm-6 my-3">
						<div class="text-center bg-white br bl tr tl">
							<div class="bg-grey br bl">
								<h5 class="font-weight-bold p-3 darkgreen"><?php echo "U00".($key['UserID']) ?></h5>		
							</div>
							<div class="bg-white p-3">
								<h2 class="darkgreen font-weight-bold "><?php echo($key['firstname']) . " " . ($key['lastname']); ?></h2>
								<p class="darkgreen"><?php echo($key['Email']); ?></p>
							</div>
							<div class="bg-white pb-3 tr tl">
								<div>
									<button class='btn bg-darkbeige text-white ' data-toggle='modal' data-target='#edit-users'>Edit</button>	
									<a class="	btn btn-danger" href="../../controllers/delete_user.php?id=<?php echo($key['UserID']) ?>">Delete</a>	
								</div>
							</div>
						</div>
					</div>
			</div>
	</section>
<?php include("../forms/add_assets.php");?>
<?php include("../forms/edit_assets.php");?>

<?php 
	}
	require "../layout.php";
 ?>

</main>
