<?php 
	session_start();
	$title = "DashBoard";
	function get_content() {
?>


<main>
<div class="row col-md-12 mx-auto">
	<div class="tc1 title-word1 px-5 pt-4 col-lg-6">
		<h1 class="admin-word dark-beige">Dashboard</h1>
	</div>		
</div>
<div class="data-table p-5 container-fluid col-md-12">
	<div class="row">
		<div class="col-lg-6 my-2">
			<div class="bg-grey r-25 ">
				<div class="row p-3 justify-content-center">
					<div class="col-lg-6 m-0 p-0 text-center">
						<h2 class="darkgreen font-weight-bold m-0">Pending Approval</h2>
					</div>
					<div class="col-lg-6 m-0 px-2 mt-2">
						<!-- <input type="text" name="search" placeholder="Search" class='mx-auto float-unset1 title-btn1 float-right btn font-weight-bol r-50 '> -->
					</div>
				</div>
			 	<div class="row bg-white mx-auto p-3 tr tl">
					<div class="box w-100"class="scrollbar" id="style-13" style="overflow-y:auto;">
						<div id="allAssetsItemTable" class="p-1">
						
						</div>
					</div>
				</div> 
			</div>
		</div>
		<div class="col-lg-6 my-2">
			<div class="bg-grey r-25 ">
				<div class="row p-3 justify-content-center">
					<div class="col-lg-6 m-0 p-0 text-center">
						<h2 class="darkgreen font-weight-bold m-0">Pending Payment</h2>
					</div>
					<div class="col-lg-6 m-0 px-2 mt-2">
						<!-- <input type="text" name="search" placeholder="Search" class='mx-auto float-unset1 title-btn1 float-right btn font-weight-bol r-50 '> -->
					</div>
				</div> 
				<div class="row bg-white mx-auto p-3 tr tl">
					<div class="box w-100" style="overflow-y:auto;" class="scrollbar" id="style-13">
						<div class="p-1">
							<div id="allAssetsItemTablePending" class="p-1">
								
							</div>
						</div>
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

<script>
    window.addEventListener('DOMContentLoaded', () => {
			// Variables
			let alertBox = document.getElementById('alert');
			
            viewPendingApprove();
			viewPendingPayment();
			
			// Clear Alert after 2S
			setTimeout(() => {
				if(alertBox) alertBox.style.display = 'none';
			}, 2000);
	});

    function viewPendingApprove(){
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
                    <div class="row m-0 p-0">
						<div class="col-sm-3 px-3 py-4 bg-white text-center">${element[1].data['assetName']}</div>
						<div class="col-sm-3 px-3 py-4 bg-white text-center">U00${element[1].data['@userId']}</div>
						<div class="col-sm-1 px-3 py-4 bg-white text-center"></div>
						<div class="col-sm-5 px-3 py-4 bg-white text-center">
						<a id="editBtn"class='btn bg-darkbeige text-white r-25 px-4' href="/controllers/transactions/approveBorrow.php?userId=${element[1].data['@userId']}&itemId=${element[1].data['@itemId']}">Approve</a>
						</div>
					</div>`;
                    
                })
			})
			.catch(error => console.log(error));
			}

		function viewPendingPayment(){
			const url = `/controllers/transactions/viewPenalty.php`;
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
				let table = document.getElementById('allAssetsItemTablePending');

                array.forEach((element) => {

                    table.innerHTML += `
                    <div class="row m-0 p-0">
						<div class="col-sm-2 px-5 py-4 bg-white">A0051</div>
                        <div class="col-sm-2 px-5 py-4 bg-white">Chair</div>
                        <div class="col-sm-8 px-5 py-4 bg-white text-center">
							<a id="editBtn"class='btn bg-darkbeige text-white r-25 px-4' href="/controllers/transactions/clearPayment.php?userId=${element[1].data['@userId']}&itemId=${element[1].data['@itemId']}">Clear Payment</a>
						</div>
					</div>`;
                    
                })
			})
			.catch(error => console.log(error));
			}

</script>