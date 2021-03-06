<?php 
	session_start();
	$title = "My Transactions";
	function get_content() {
?>
<main>

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
					<select id="pageChange" onchange="changePage()" name="taskOption" class='darkgreen title-btn1 px-4 py-3 btn font-weight-bold mx-auto r-50 '>
						<option type="submit" value="0" selected="selected">Borrowed Assets</option>
						<option type="submit" value="1">Penalty</option>
					</select>		
				</div>
			</div>
		</div>
	</div>		
</div>
<div id="allAssetsItemTable" class="data-table container-fluid r-25 mt-4 darkgreen text-center font-weight-bold">
	<div class="row mx-5">
		<div class="col-sm-3 px-5 py-4 bg-grey bl">Item Id</div>
		<div class="col-sm-3 px-5 py-4 bg-grey">Item Title</div>
		<div class="col-sm-3 px-5 py-4 bg-grey">Due Date</div>
		<div class="col-sm-3 px-5 py-4 bg-grey br">Status</div> 
	</div>
	
</div>


	<section class="col-md-12 mx-4 mt-3 p-5 padding-0 mx-auto">
		<div class="row justify-content-center">
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
		</div>
	</section>
<?php 
	}
	require "../layout.php";
 ?>

</main>

<script>
		window.addEventListener('DOMContentLoaded', () => {
			// Variables
			let alertBox = document.getElementById('alert');
			viewAllItems();
			// Clear Alert after 2S
			setTimeout(() => {
				if(alertBox) alertBox.style.display = 'none';
			}, 2000);
		});

		function viewAllItems(){
		const url = `/controllers/transactions/viewUserBorrow.php?userId=<?php echo $_SESSION['user']['@userId']?>`;
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
			
				array.forEach((item) => {
					console.log(item)
					table.innerHTML += `
						<div class="row mx-5">
							<div class="col-sm-3 px-5 py-4 bg-white">I00${item[1]["data"]["@itemId"]}</div>
							<div class="col-sm-3 px-5 py-4 bg-white">${item[1]["data"]["assetName"]}</div>
							<div class="col-sm-3 px-5 py-4 bg-white">${item[1]["data"]["dueDate"]}</div>
							<div class="col-sm-3 px-5 py-4 bg-white">${item[1]["data"]["status"]}</div> 
						</div>
					`;
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
		
		function changePage(){
			let page = document.getElementById("pageChange").value;
			console.log("hahah")
			if(page == 0){
				window.location.replace("/views/user/my_profile.php");
			}else if(page == 1){
				window.location.replace("/views/user/penalty.php");
			}	
		}
</script>
