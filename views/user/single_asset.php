<?php 
	session_start();
	$title = "Assets";
	
	function get_content(){​
		
		
?>
​	<main>
		<!-- Head Section to Display Title of This page -->
		<div class="row col-md-12 mx-auto">
			<div class="tc title-word px-5 pt-4 col-md-6">
				<h1 class="admin-word dark-beige">Assets</h1>
			</div>	
		</div>
		
		<!-- Desktop Version Display Unit -->
		<div class="data-table container-fluid">
			<div class="row ">
				<div class="col-md-4 ml-5 p-5">
					<img class="img-fluid r-25" id="imgSrc">
				</div>
				<div class="col-lg-5 py-5">
					<div>
						<h1 class="word1 text-white p-0 pt-4 m-0 display-1 font-weight-bold"><?php echo $_GET['assetName'] ?></h1>
					</div>
					<h1 id= "ava" class="word2 text-white p-0 ml-1 font-weight-bold">Quantity Available: Loading...</h1>
					<div class="row">
						<div class="qty mt-3 ml-3">
							<button onclick="minus()" id="minus" class="minus bg-darkbeige btn" disabled>-</button>
								<input type="number" class="input1 text-center p-0 r-25 text-white font-weight-bold bg-darkbeige" id="qty" value="1" disabled>
							<button onclick="add()" id="add" class="plus bg-darkbeige btn" disabled>+</button>
						</div>
					</div>
					<button onclick="addToCart()" class="title-btn mt-4 px-5 py-3 btn font-weight-bold mx-auto r-50">Add to Cart</button>
				</div>
			</div>
		</div>

		<!-- Movile Version Display Unit -->
		<section class="col-md-12 mx-4 mt-3 p-5 padding-0 mx-auto">
			<div class="row justify-content-center bg-darkbeige my-3 bl tr tl">
				<div class="col-md-6 p-0">
					<img class="img-fluid bl" id="mobiImgSrc">
				</div>
				<div class="col-md-6 p-4 ">
					<div class="my-5 box3">
						<div class="col-12 display-3 font-weight-bold title-assets"><?php echo $_GET['assetName'] ?></div>
						<div class="col-12 title-quantity font-weight-bold">
							<h3 id= "mobiAva" class="font-weight-bold">
								Quantity Available: Loading...
							</h3>
						</div>
						<div class="row">
							<div class="qty mt-3 ml-3 px-3">
								<button onclick="minus()" id="mobiMinus" class="minus bg-lightbeige btn" disabled>-</button>
									<input id="mobiQty" type="text" class="input1 text-center p-0 r-25 text-white font-weight-bold bg-lightbeige" value="1">
								<button onclick="add()" id="mobiAdd" class="plus bg-lightbeige btn" disabled>+</button>
							</div>
						</div>
						<div class="col-12 title-quantity font-weight-bold">
							<button onclick="addToCart()" class="title-btn mt-4 px-5 py-3 btn font-weight-bold mx-auto r-50 ">Add to Cart</button>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
<?php 
	}
	require "../layout.php";
 ?>
​
<script>
	
	window.addEventListener('DOMContentLoaded', () => {
		// Variables
		let alertBox = document.getElementById('alert');
		let availableQty;
	
		checkAvailabe(<?php echo $_GET['assetNameId']?>);
		// Clear Alert after 2S
		setTimeout(() => {
			if(alertBox) alertBox.style.display = 'none';
		}, 2000);
	});

	function checkAvailabe(assetNameId){
		const url = `/controllers/assets/single_assets.php?assetNameId=${assetNameId}`;
		const request = {
			headers:{
				"content-type":"application/json; charset=UTF-8" 
			},
			method:"GET"
		}

		fetch(url, request)
		.then(data => {return data.json()})
		.then(res => {
			let array = Object.entries(res);
			let table = document.getElementById('allAssetsTable');
			availableQty = array[0][1];
			document.getElementById(`ava`).innerText = `Available: ${array[0][1]}`;
			document.getElementById(`imgSrc`).src = `/resources/img/${array[2][1].data.assetPhoto}`;
			document.getElementById(`add`).disabled = false;
			document.getElementById(`minus`).disabled = false;
			document.getElementById(`mobiAva`).innerText = `Available: ${array[0][1]}`;
			document.getElementById(`mobiImgSrc`).src = `/resources/img/${array[2][1].data.assetPhoto}`;
			document.getElementById(`mobiAdd`).disabled = false;
			document.getElementById(`mobiMinus`).disabled = false;

		})
		.catch(error => console.log(error));
	}

	// Counter
		// Desktop UI
		let quantity = document.getElementById('qty');
		let mobiQuantity = document.getElementById('mobiQty');

		let addBtn = document.getElementById('add');
		let mobiAddBtn = document.getElementById('mobiAdd');

		let minusBtn = document.getElementById('minus');
		let mobiMinusBtn = document.getElementById('mobiMinus');

		function add(){
			quantity.value++;
			if( quantity.value <= availableQty){
				
				// Update Desktop Version
				quantity.value = quantity.value;
				quantity.innerHTML = quantity.value;

				// Update Mobile Version
				mobiQuantity.value = quantity.value;
				mobiQuantity.innerHTML = quantity.value;

				// All Add Button Can be pressed
				addBtn.disabled = false;
				mobiAddBtn.disabled = false;

				// All Minus Button Can be pressed
				minusBtn.disabled = false;
				mobiMinusBtn.disabled = false;

				if( quantity.value == availableQty){
					// All Add Button Cannot be pressed
					addBtn.disabled = true;
					mobiAddBtn.disabled = true;
				}
			}else{
				minusBtn.disabled = false;
				mobiMinusBtn.disabled = false;

				addBtn.disabled = true;
				mobiAddBtn.disabled = true;
				quantity.value--;
			}
		}

		function minus(){
			if(quantity.value <= 1) {
				// All minus Button Cannot be pressed
				minusBtn.disabled = true;
				mobiMinusBtn.disabled = true;
			}else{
				quantity.value--;
				if( quantity.value > 0){
					// Update Desktop Version
					quantity.value = quantity.value;
					quantity.innerHTML = quantity.value;
	
					// Update Mobile Version
					mobiQuantity.value = quantity.value;
					mobiQuantity.innerHTML = quantity.value;

					// All Add Button Can be pressed
					addBtn.disabled = false;
					mobiAddBtn.disabled = false;

					// All Minus Button Can be pressed
					minusBtn.disabled = false;
					mobiMinusBtn.disabled = false;
				}else{
					minusBtn.disabled = true;
					mobiMinusBtn.disabled = true;
				}
			}
			
			
		}

	// Add to Cart Request
	function addToCart(){
		const url = '/controllers/transactions/addToCart.php';
		
		const data = {
			userId : "<?php echo $_SESSION['user']['@userId']; ?>",
			assetNameId: "<?php echo $_GET['assetNameId']; ?>",
			assetName: "<?php echo $_GET['assetName']; ?>",
			quantity: quantity.value
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