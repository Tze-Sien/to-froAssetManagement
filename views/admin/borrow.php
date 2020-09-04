<?php 
	session_start();
	$title = "Transaction";
	function get_content() {
?>
<main>
<div class="row col-md-12 mx-auto">
	<div class="tc1 title-word1 px-5 pt-4 col-lg-6">
		<h1 class="admin-word dark-beige">Transactions</h1>
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
						<option value=<?php echo $i = "0" ?> selected="selected"><a href="">Borrow</a></option>
						<option value=<?php echo $i = "1" ?>><a href="#">Due Transations</a></option>	
						<option value=<?php echo $i = "2" ?>><a href="">Return</a></option>
					</select>		
				</div>
			</div>
		</div>
	</div>		
</div>
	<div id="allAssetsItemTable" class="data-table container-fluid r-25 mt-4 darkgreen text-center font-weight-bold">
	  	<div class="row mx-5">
	    	<div class="col-sm-3 px-5 py-4 bg-grey bl">Item ID</div>
		    <div class="col-sm-3 px-5 py-4 bg-grey">Item Name</div>
		    <div class="col-sm-3 px-5 py-4 bg-grey">Requested By</div>
		    <div class="col-sm-3 px-5 py-4 bg-grey br">Actions</div> 
		</div>
		
	</div>

	<section class="col-md-12 mx-4 mt-3 p-5 padding-0 mx-auto">
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4 col-sm-6 my-3">
				<div class="text-center bg-white br bl tr tl">
					<div class="bg-lightgreen br bl">
						<h5 class="m-0 font-weight-bold p-3 dark-beige">Item ID</h5>		
					</div>
					<div class="">
						<div class="m-0 row">
							<div class="px-3 py-2 col-md-6 bg-grey">
								<h5 class="m-0">Item Name</h5>
							</div>
							<div class="px-3 py-2 col-md-6">
								<h5 class="m-0">Chair</h5>	
							</div>
						</div>
						<div class="m-0 row ">
							<div class="px-3 py-2 col-md-6 bg-grey">
								<h5 class="m-0">Requested By</h5>
							</div>
							<div class="px-3 py-2 col-md-6">
								<h5 class="m-0">Wai Kit</h5>
							</div>
						</div>
						<div class="m-0 row ">
							<div class="px-3 py-2 col-md-6 bg-grey tl">
								<a class="btn font-weight-bold bg-darkbeige form-control py-2 br bl tr tl text-white" href="../../controllers/delete_assets.php?id=<?php echo($key['ItemID'] ) ?>">Approve</a>
							</div>
							<div class="px-3 py-2 col-md-6 tr">
								<a class="btn font-weight-bold br-darkbeige dark-beige form-control py-2 br bl tr tl " href="../../controllers/delete_assets.php?id=<?php echo($key['ItemID'] ) ?>">Decline</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 col-sm-6 my-3">
				<div class="text-center bg-white br bl tr tl">
					<div class="bg-lightgreen br bl">
						<h5 class="m-0 font-weight-bold p-3 dark-beige">Item ID</h5>		
					</div>
					<div class="">
						<div class="m-0 row">
							<div class="px-3 py-2 col-md-6 bg-grey">
								<h5 class="m-0">Item Name</h5>
							</div>
							<div class="px-3 py-2 col-md-6">
								<h5 class="m-0">Chair</h5>	
							</div>
						</div>
						<div class="m-0 row ">
							<div class="px-3 py-2 col-md-6 bg-grey">
								<h5 class="m-0">Requested By</h5>
							</div>
							<div class="px-3 py-2 col-md-6">
								<h5 class="m-0">Wai Kit</h5>
							</div>
						</div>
						<div class="m-0 row ">
							<div class="px-3 py-2 col-md-6 bg-grey tl">
								<a class="btn font-weight-bold bg-darkbeige form-control py-2 br bl tr tl text-white" href="../../controllers/delete_assets.php?id=<?php echo($key['ItemID'] ) ?>">Approve</a>
							</div>
							<div class="px-3 py-2 col-md-6 tr">
								<a class="btn font-weight-bold br-darkbeige dark-beige form-control py-2 br bl tr tl " href="../../controllers/delete_assets.php?id=<?php echo($key['ItemID'] ) ?>">Decline</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 col-sm-6 my-3">
				<div class="text-center bg-white br bl tr tl">
					<div class="bg-lightgreen br bl">
						<h5 class="m-0 font-weight-bold p-3 dark-beige">Item ID</h5>		
					</div>
					<div class="">
						<div class="m-0 row">
							<div class="px-3 py-2 col-md-6 bg-grey">
								<h5 class="m-0">Item Name</h5>
							</div>
							<div class="px-3 py-2 col-md-6">
								<h5 class="m-0">Chair</h5>	
							</div>
						</div>
						<div class="m-0 row ">
							<div class="px-3 py-2 col-md-6 bg-grey">
								<h5 class="m-0">Requested By</h5>
							</div>
							<div class="px-3 py-2 col-md-6">
								<h5 class="m-0">Wai Kit</h5>
							</div>
						</div>
						<div class="m-0 row ">
							<div class="px-3 py-2 col-md-6 bg-grey tl">
								<a class="btn font-weight-bold bg-darkbeige form-control py-2 br bl tr tl text-white" href="../../controllers/delete_assets.php?id=<?php echo($key['ItemID'] ) ?>">Approve</a>
							</div>
							<div class="px-3 py-2 col-md-6 tr">
								<a class="btn font-weight-bold br-darkbeige dark-beige form-control py-2 br bl tr tl " href="../../controllers/delete_assets.php?id=<?php echo($key['ItemID'] ) ?>">Decline</a>
							</div>
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

<script>
    window.addEventListener('DOMContentLoaded', () => {
			// Variables
			let alertBox = document.getElementById('alert');
			
            viewBorrowRequest();
			
			// Clear Alert after 2S
			setTimeout(() => {
				if(alertBox) alertBox.style.display = 'none';
			}, 2000);
	});

    function viewBorrowRequest(){
		const url = `/controllers/transactions/viewBorrow.php`;
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

                array.forEach((element) => {

                    table.innerHTML += `
                    <div class="row mx-5 align-items-center bg-white ">
                        <div class="col-sm-3 px-5 py-2 bg-white ">I00${element[1].data['@itemId']}</div>
                        <div class="col-sm-3 px-5 py-2 bg-white">${element[1].data['assetName']}</div>
                        <div class="col-sm-3 px-5 py-2 bg-white">U00${element[1].data['@userId']}</div>
                        <div class="col-sm-3 px-3 py-2 bg-white text-center">
                            <a id="editBtn"class='btn bg-darkbeige text-white r-25 px-4' href="/controllers/transactions/approveBorrow.php?userId=${element[1].data['@userId']}&itemId=${element[1].data['@itemId']}">Approve</a>
                            <!-- <a class="btn font-weight-bold dark-beige br-darkbeige r-25" href="">Decline</a>	 -->
                        </div>
                    </div>`;
                    
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


		function changePage(e){
			let page = document.getElementById("pageChange").value;

			if(page == 0){
				window.location.replace("/views/admin/borrow.php");
			}else if(page == 1){
				window.location.replace("/views/admin/penalty.php");
			}else{
				window.location.replace("/views/admin/return.php");
			}	
		}
</script>
