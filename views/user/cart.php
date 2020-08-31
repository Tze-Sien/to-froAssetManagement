<?php 
	session_start();
	$title = "Cart";
	function get_content() {
?>
<main>

	<!-- Head Section -->
	<div class="row col-md-12 mx-auto">
		<div class="tc1 title-word1 px-5 pt-4 col-lg-6">
			<h1 class="admin-word1 dark-beige">Cart</h1>
		</div>	
		<div class="tc1 m-auto pt-4 px-2 col-lg-6">
			<div class="float-right float-unset1">
				<div class="row m-0 p-0">
					<div class="col-lg-6 pl-5 padding-btn1">
						<form method="post" action="">
							<input type="text" name="search" placeholder="Search" class='title-btn1 px-4 py-3 btn font-weight-bold mx-auto r-50 '>
						</form>	
					</div>
					<div class="col-lg-6 pl-5 pr-5 padding-btn2"> 
						<button onclick="borrow()" id="borrowBtn" class='title-btn1 bg-darkbeige text-white px-5 py-3 btn font-weight-bold mx-auto r-50'>Borrow</button>		
					</div>
				</div>
			</div>
		</div>		
	</div>
	
	<!-- Desktop Version Table -->
	<div class="data-table container-fluid r-25 mt-4 darkgreen text-center font-weight-bold">
	  	<div class="row mx-5">
	    	<div class="col-sm-3 px-5 py-4 bg-grey bl">Item Name</div>
		    <div class="col-sm-3 px-5 py-4 bg-grey">Quantity</div>
		    <div class="col-sm-6 px-5 py-4 bg-grey br">Action</div> 
		</div>
		<div id="cartTable" class="row mx-5 align-items-center tl tr bg-white">
	    	
		</div>
	</div>

	<!-- Mobile Version Table -->
	<section class="col-md-12 mx-4 mt-3 p-5 padding-0 mx-auto">
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4 col-sm-6 my-3">
				<div class="text-center bg-white br bl tr tl">
					<div class="bg-lightgreen br bl">
						<h5 class="m-0 font-weight-bold p-3 dark-beige">Item Name</h5>		
					</div>
					<div class="bg-white">
						<div class="m-0 row">
							<div class="px-3 py-2 col-md-6 bg-grey">
								<h5 class="m-0">Quantity</h5>
							</div>
							<div class="px-3 py-2 col-md-6">
								<h5 class="m-0">Quantity</h5>	
							</div>
						</div>
					</div>
					<a class="btn font-weight-bold bg-darkbeige form-control py-2 tr tl text-white" href="../../controllers/delete_assets.php?=<?php echo($key['ItemID'] ) ?>">Delete</a>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 col-sm-6 my-3">
				<div class="text-center bg-white br bl tr tl">
					<div class="bg-lightgreen br bl">
						<h5 class="m-0 font-weight-bold p-3 dark-beige">Item Name</h5>		
					</div>
					<div class="bg-white">
						<div class="m-0 row">
							<div class="px-3 py-2 col-md-6 bg-grey">
								<h5 class="m-0">Quantity</h5>
							</div>
							<div class="px-3 py-2 col-md-6">
								<h5 class="m-0">Quantity</h5>	
							</div>
						</div>
					</div>
					<a class="btn font-weight-bold bg-darkbeige form-control py-2 tr tl text-white" href="../../controllers/delete_assets.php?id=">Delete</a>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 col-sm-6 my-3">
				<div class="text-center bg-white br bl tr tl">
					<div class="bg-lightgreen br bl">
						<h5 class="m-0 font-weight-bold p-3 dark-beige">Item Name</h5>		
					</div>
					<div class="bg-white">
						<div class="m-0 row">
							<div class="px-3 py-2 col-md-6 bg-grey">
								<h5 class="m-0">Quantity</h5>
							</div>
							<div class="px-3 py-2 col-md-6">
								<h5 class="m-0">Quantity</h5>	
							</div>
						</div>
					</div>
					<a class="btn font-weight-bold bg-darkbeige form-control py-2 tr tl text-white" href="../../controllers/delete_assets.php?id=<?php echo($key['ItemID'] ) ?>">Delete</a>
				</div>
			</div>
		</div>
	</section>
	
</main>
<?php 
	}
	require "../layout.php";
 ?>




<script>
	var loadedCart;
	window.addEventListener('DOMContentLoaded', () => {
		// Clear Alert after 5 Seconds
		let alertBox = document.getElementById('alert');
		setTimeout(() => {
			if(alertBox) alertBox.style.display = 'none';
		}, 2000);

		// Load Cart to User Interface
		loadCart();
			
	});


	// Cart Loading for that particular user
	function loadCart(){
		const url = '/controllers/transactions/viewCart.php';
		
		const data = {
			userId : "<?php echo $_SESSION['user']['@userId']; ?>"
		};
		
		const request = {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json;charset=utf-8'
			},
			body: JSON.stringify(data)
		};

		fetch(url, request)
			.then(data => {return data.json()})
			.then(res => {
				loadedCart = res;
				if(loadedCart != []){
					document.getElementById('borrowBtn').disabled = false;
				}else{
					document.getElementById('borrowBtn').disabled = true;
				}

				let table = document.getElementById('cartTable');
				
				res.forEach((item) => {
					let assetName = item.assetName;
					let quantity = item.quantity;
					let assetNameId = item.assetNameId;
					let userId = item.userId;

				table.innerHTML += `
					<div class="col-sm-3 px-5 py-2 tl">${assetName}</div>
					<div class="col-sm-3 px-5 py-2 ">${quantity}</div>
					<div class="col-sm-6 px-5 py-2 tr">
						<a href="/controllers/transactions/deleteCartItem.php?assetNameId=${assetNameId}&userId=${userId}&quantity=${quantity}" 
						class='btn bg-darkbeige text-white r-25 px-4'>Delete</a>
					</div> 
				`;
				})
			})
			.catch(error => console.log(error));
	}

	function borrow(){
		const url = '/controllers/transactions/checkOutCart.php';
		let assetNameIdArray=[];

		loadedCart.forEach(element => {
			assetNameIdArray.push(element.assetNameId)
		})

		const data = {
			userId : "<?php echo $_SESSION['user']['@userId']; ?>",
			assetNameId : assetNameIdArray
		};
		
		const request = {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json;charset=utf-8'
			},
			body: JSON.stringify(data)
		};

		fetch(url, request)
			.then(data => {return data.json()})
			.then(res => {
				window.location.replace("/views/user/cart.php")				
			})
			.catch(error => console.log(error));
	}

</script>