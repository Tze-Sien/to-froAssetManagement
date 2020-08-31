<?php 
	session_start();
	$title = "Item_management";
	function get_content() {
?>
<main>
	<div class="row col-md-12 mx-auto">
		<div class="pl-5 pt-4 col-md-6">
			<h1 class="admin-word dark-beige">Manage Assets</h1>
		</div>	
		<div class="m-auto pt-4 pl-5 col-md-6">
			<input onkeyup="search()" id="assetSearch" type="text" name="search" placeholder="Search" class='px-4 py-3 btn font-weight-bold mr-3 r-50 '>
			<button class='px-4 py-3 btn text-white font-weight-bold bg-darkbeige r-50' data-toggle='modal' data-target='#create-assets'>Create Assets</button>
		</div>		
	</div>
	<div class="container-fluid px-5">
		<div class="mx-3">
			<?php
				if($_SESSION['message'] ){
					echo "<div id='alert' class='alert alert-danger mt-3 text-center r-25 ' role='alert'>";
				?>
				<?php 
					foreach($_SESSION['message'] as $element) {
						echo $element. "<br>";
					}
				?>
				<?php 
					echo "</div>";
					}
			?>
		</div>
	</div>
	<div id="allAssetsTable" class="data-table container-fluid r-25 mt-4 darkgreen text-center font-weight-bold">
	  	<div class="row mx-5">
	    	<div class="col-sm-2 px-5 py-4 bg-grey bl">Asset Title</div>
		    <div class="col-sm-3 px-5 py-4 bg-grey">Available Amount</div>
		    <div class="col-sm-2 px-5 py-4 bg-grey">Total Amount</div>
		    <div class="col-sm-5 px-5 py-4 bg-grey br">Actions</div> 
		</div>
	</div>

<?php include("../forms/add_assets.php");?>
<?php include("../forms/edit_assets.php");?>

<?php 
	}
	require "../layout.php";
 ?>
</main>


<script>
	

	window.addEventListener('DOMContentLoaded', () => {
		// Variables
		let alertBox = document.getElementById('alert');
		viewAllAssets();
		// Clear Alert after 2S
		setTimeout(() => {
			if(alertBox) alertBox.style.display = 'none';
		}, 2000);
	});

	// Fetch Assets from PHP
	function viewAllAssets(){
		const url = 'http://127.0.0.1:3000/controllers/assets/view_assets.php';
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
				let arrayOfId = [];
				localStorage.setItem('allAssetsTable', JSON.stringify(array));
				let table = document.getElementById('allAssetsTable');
				
				array.forEach((item) => {
					let key = item[0];
					let assetNameId = item[1]['@assetNameId'];
					let assetName = item[1]['assetName'];
					
					let div = document.createElement("div");  
					div.setAttribute('class', 'row mx-5 bg-white tablerow');
					div.setAttribute('id', `${assetNameId}`);

					div.innerHTML = `
					<div class='col-sm-2 px-5 py-3'>${assetName}</div>
					<div class='col-sm-3 px-5 py-3' id="Ava${assetNameId}">Loading...</div>
					<div class='col-sm-2 px-5 py-3' id="Ttl${assetNameId}">Loading...</div>
					<div class='col-sm-5 px-5 py-3'>
						<button class='btn bg-darkbeige r-25 text-white px-4' data-toggle='modal' data-target='#edit-assets' onclick="editForm(${assetNameId})">Edit</button>
						<a class="btn bg-darkbeige r-25 text-white px-4" href="/views/admin/item_view.php?assetNameId=${assetNameId}&assetName=${assetName}">View</a>
						<a class="btn r-25 font-weight-bold dark-beige br-darkbeige" href="../../controllers/assets/delete_assets.php?assetId=${assetNameId}" onclick="return confirm('Are you sure, you want to delete it?')">Delete</a>
					</div>
					`;
					table.appendChild(div);

					let newData = {
						"@assetNameId": item[1]['@assetNameId'],
						"quantity": 0,
						"available":0,
					}
					arrayOfId.push(newData);
				})
				calculateAssets(arrayOfId);
				
			})
			.catch(error => console.log(error));
	}

	// Calculate Available Amount Behind
	function calculateAssets(arrayOfId){
		const url = 'http://127.0.0.1:3000/controllers/assets/all_items.php';
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
		
				array.forEach((item) => {
					arrayOfId.forEach(element=> {
						if(element["@assetNameId"] == item[1]["@assetNameId"]){
							element["quantity"]++;
							if(item[1]["availability"] == true){
								element["available"]++;
							}
						}
					})
				})

				// Put Calculated Amount into Interface
				arrayOfId.forEach(element =>{
					let available = document.getElementById(`Ava${element['@assetNameId']}`).innerHTML = `${element['available']}`
					let total = document.getElementById(`Ttl${element['@assetNameId']}`).innerHTML = `${element['quantity']}`;
				})
				
			})
			.catch(error => console.log(error));
	}

	function editForm(assetId){
		console.log(assetId);
		let assetName = document.getElementById('oldAssetName');
		let assetNameId = document.getElementById('assetNameId');
		let assets = JSON.parse(localStorage.getItem('allAssetsTable'));
		let found;
		assets.forEach(item => {
			if(item[1]["@assetNameId"] == assetId){
				found = item[1];
			}
		})
		
		if(found){
			assetName.value = found['assetName'];
			assetNameId.value = found['@assetNameId'];
		}
	}

	function search(){
		let input, filter, ul, li, a, i, txtValue;
		
		input = document.getElementById("assetSearch");
		filter = input.value.toUpperCase();
		
		table = document.getElementById("allAssetsTable");
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