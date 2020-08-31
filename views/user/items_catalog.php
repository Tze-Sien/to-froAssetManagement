<?php 
	session_start();
	$title = "Assets";
	function get_content() {

?>

<main>
	<div class="row col-md-12 mx-auto">
		<div class="tc title-word px-5 pt-4 col-md-6">
			<h1 class="admin-word dark-beige">Assets</h1>
		</div>
		<div class="tc m-auto pt-4 pl-5 col-md-6">
			<div class="float-right float-unset">
				<input onkeyup="search()" id="assetSearch" type="text" name="search" placeholder="Search" class='title-btn px-4 py-3 btn font-weight-bold mx-auto r-50 '>	
			</div>
		</div>		
	</div>
		<div class="mx-5 mt-3 p-5">
			<div id="allAssetsTable" class="row "></div>
		</div>
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

	function viewAllAssets(){
		const url = '/controllers/assets/view_assets.php';
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
			let table = document.getElementById('allAssetsTable');
			array.forEach((item) => {
				let div = document.createElement("div");  
				div.setAttribute('class', 'col-md-6 col-lg-4 px-4 my-3 tablerow');

				div.innerHTML = `
					<a href="/views/user/single_asset.php?assetName=${item[1]['assetName']}&assetNameId=${item[1]['@assetNameId']}" id="${"card" + item[1]['@assetNameId']}"  class="row">
						<div class="text-center bg-darkbeige r-25">
							<div class="bg-white p-3 br bl">
								<img class="img-fluid w-100" src="../../resources/img/${item[1]['assetPhoto']}">			
							</div>
							<div class="p-4">
								<h2 class="darkgreen font-weight-bold ">${item[1]['assetName']}</h2>
								<p id=${"ava" + item[1]['@assetNameId']} class="darkgreen">Available:Loading...</p>
							</div>
						</div>
					</a>
				`;
				table.appendChild(div);
				checkAvailabe(item[1]['@assetNameId']);
			})
		})
		.catch(error => console.log(error));
	}

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
			if(array[0][1] == 0 ) {
				document.getElementById(`card${assetNameId}`).disabled = true;
			} 
			document.getElementById(`ava${assetNameId}`).innerText = `Available:${array[0][1]}`;
		})
		.catch(error => console.log(error));
	}

	function search(){
		let input, filter, ul, li, a, i, txtValue;

		input = document.getElementById("assetSearch");
		filter = input.value.toUpperCase();

		table = document.getElementById("allAssetsTable");
		row = table.querySelectorAll('.tablerow');
		
		for (i = 0; i < row.length; i++) {
			let elements = row[i].children;
			txtValue = ("U00" + elements.item(0).innerText);
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				row[i].style.display = "";
			} else {
				row[i].style.display = "none";
			}
		}
	}

</script>
