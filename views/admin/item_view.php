<?php 
	session_start();
	$title = "Item_management";
	function get_content() {
?>
	
<main>
<div class="row col-md-12 mx-auto">
	<div class="pl-5 pt-4 col-md-6">
		<h1 class="admin-word dark-beige"><?php echo $_GET['assetName'];?></h1>
	</div>	
	<div class=" m-auto pt-4 pl-5 col-md-6">
		<input onkeyup="search()" type="text" id="itemSearch" name="search" placeholder="Search" class='px-4 py-3 btn font-weight-bold mr-3 r-50 '>
		<a class='px-4 py-3 btn text-white font-weight-bold bg-darkbeige r-50' href="/controllers/assets/add_item.php?assetNameId=<?php echo $_GET['assetNameId']?>"><?php echo "Create".$_GET['assetName'];?></a>
	</div>		
</div>
	<div id="allAssetsItemTable" class="data-table container-fluid r-25 mt-4 darkgreen text-center font-weight-bold">
	  	<div class="row mx-5">
	    	<div class="col-sm-3 px-5 py-4 bg-grey bl">Barcode</div>
		    <div class="col-sm-3 px-5 py-4 bg-grey">Availability</div>
		    <div class="col-sm-3 px-5 py-4 bg-grey">Borrowed By</div>
		    <div class="col-sm-3 px-5 py-4 bg-grey br">Actions</div> 
		</div>
	</div>
	<section class="col-md-12 mx-4 mt-3 p-5 mx-auto">
		<div class="row justify-content-center">
			<?php
				foreach ($_SESSION['item'] as $key ){
					if($key['ItemID'] ==$_GET['id']){
						$quantity = $key['quantity'];
					}
				}
				?>
				<?php for($i = 0; $i < $quantity; $i++){
				?>
				<div class="col-md-6 col-lg-4 col-sm-6 my-3">
					<div class="text-center bg-white br bl tr tl">
						<div class="bg-lightgreen br bl">
							<h5 class="m-0 font-weight-bold p-3 dark-beige"><?php echo ($key['AssetName']) ?></h5>		
						</div>
						<div class="bg-white">
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0"><?php echo "Barcode : "?></h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0"><?php echo "A00" . ($i+1) ?></h5>	
								</div>
							</div>
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0"><?php echo "Availability : "?></h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0"><?php echo "Available"?></h5>
								</div>
							</div>
							<div class="m-0 row">
								<div class="px-3 py-2 col-md-6 bg-grey">
									<h5 class="m-0"><?php echo "Borrowed By : "?></h5>
								</div>
								<div class="px-3 py-2 col-md-6">
									<h5 class="m-0"><?php echo "-" ?></h5>
								</div>
							</div>
						</div>
						<a  class="btn font-weight-bold bg-darkbeige form-control py-2 tr tl text-white" href="../../controllers/delete_assets.php?id=<?php echo($key['ItemID'] )  ?>">Delete</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
<?php include("../forms/edit_assets.php");?>
<?php include("../forms/add_assets.php");?>

<?php 
	}
	require "../layout.php";
 ?>

</main>

<script>
		window.addEventListener('DOMContentLoaded', () => {
			// Variables
			let alertBox = document.getElementById('alert');
			const params = new URLSearchParams(window.location.search);
			let assetNID = params.get("assetNameId");
			viewAllItems(assetNID);
			// Clear Alert after 2S
			setTimeout(() => {
				if(alertBox) alertBox.style.display = 'none';
			}, 2000);
		});

		function viewAllItems(assetNID){
		const url = `http://127.0.0.1:3000/controllers/assets/single_assets.php?assetNameId=${assetNID}`;
		const request = {
		headers:{
			"content-type":"application/json; charset=UTF-8" 
		},
		method:"GET"
		};

		fetch(url, request)
			.then(data => {return data.json()})
			.then(res => {
				let array = Object.entries(res);			
				let table = document.getElementById('allAssetsItemTable');

				array[1][1].forEach((item) => {
					let itemId = "A00"+item['@itemId'];
					let availability = (item['availability']) ? "Available" : "Unavailable";

					let div = document.createElement("div");  
					div.setAttribute('class', 'row mx-5 bg-white tablerow');
					div.setAttribute('id', `${item['@itemId']}`);

						div.innerHTML = `
						<div class='col-sm-3 px-5 py-3'>${itemId}</div>
						<div class='col-sm-3 px-5 py-3'>${availability}</div>
						<div class='col-sm-3 px-5 py-3'>-</div>
						<div class='col-sm-3 px-5 py-3'>
							<a onclick="return confirm('Are you sure, you want to delete it?')" class="btn btn-danger" href="../../controllers/assets/delete_item.php?itemId=${item['@itemId']}">Delete</a>
						</div>
					`;
					table.appendChild(div);
				})
			})
			.catch(error => console.log(error));
			}

			function search(){
				let input, filter, ul, li, a, i, txtValue;
				
				input = document.getElementById("itemSearch");
				filter = input.value.toUpperCase();
				
				table = document.getElementById("allAssetsItemTable");
				row = table.querySelectorAll('.tablerow');
				
				for (i = 0; i < row.length; i++) {
					let elements = row[i].children;
					txtValue = (elements.item(0).innerText);
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						row[i].style.display = "";
					} else {
						row[i].style.display = "none";
					}
				}
			}

</script>


