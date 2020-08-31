<?php 
	session_start();
	$title = "User_Management";
	function get_content() {
?>

<main>
	<div class="row col-md-12 mx-auto">
		<div class="pl-5 pt-4 col-md-6">
			<h1 class="admin-word dark-beige">Manage Users</h1>
		</div>
		<div class="m-auto pt-4 pl-5 col-md-6 ">
			<div class="row">
					<input onkeyup="search()" id="userSearch" type="text" name="search" placeholder="Search" class='px-4 py-3 btn font-weight-bold mr-3 r-50'>
				<button class='px-4 py-3 btn text-white font-weight-bold bg-darkbeige r-50 ' data-toggle='modal' data-target='#new-users'>New Member</button>
			</div>
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

	<div id="allUserTable" class="data-table container-fluid r-25 mt-4 darkgreen text-center font-weight-bold">
		<div class="row mx-5">
			<div class="col-sm-2 px-5 py-4 bg-grey bl">User ID</div>
			<div class="col-sm-3 px-5 py-4 bg-grey">Username</div>
			<div class="col-sm-4 px-5 py-4 bg-grey">Email</div>
			<div class="col-sm-3 px-5 py-4 bg-grey br">Actions</div> 
		</div>
	</div>

	<?php include("../forms/register.php");?>
	<?php include("../forms/edit_user.php");?>

	<?php 
		}
		require "../layout.php";
		unset($_SESSION['message']);
	?>
</main>

<script>
	

	window.addEventListener('DOMContentLoaded', () => {
		// Variables
		let alertBox = document.getElementById('alert');
		viewAllUsers();
		// Clear Alert after 2S
		setTimeout(() => {
			if(alertBox) alertBox.style.display = 'none';
		}, 2000);
	});

	// fetchData from PHP
	function viewAllUsers(){
		const url = '/controllers/auth/view_user.php';
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
			localStorage.setItem('allUsers', JSON.stringify(array));
			let table = document.getElementById('allUserTable');
		
			array.forEach((item) => {
				let key = item[0];
				let userId = item[1]['@userId'];
				let firstName = item[1]['firstName'];
				let lastName = item[1]['lastName'];
				let email = item[1]['email'];
				let div = document.createElement("div");  
				div.setAttribute('class', 'row mx-5 bg-white tablerow');
				div.setAttribute('id', `${userId}`);

				div.innerHTML = `
					<div class='col-sm-2 px-5 py-3'>U00${userId}</div>
					<div class='col-sm-3 px-5 py-3'>${firstName + lastName}</div>
					<div class='col-sm-4 px-5 py-3'>${email}</div>
					<div class='col-sm-3 px-5 py-3'>
						<button id="editBtn"class='btn bg-darkbeige text-white r-25 px-4' data-toggle='modal' data-id="${userId}" data-target='#edit-users' onclick="editForm(${userId})">Edit</button>
						<a href="/controllers/auth/delete_user.php?userId=${userId}" class="btn font-weight-bold dark-beige br-darkbeige r-25" onclick="return confirm('Are you sure, you want to delete it?')">Delete</a>
					</div>
				`;
				table.appendChild(div);
			})
		})
		.catch(error => console.log(error));
	}

	function editForm(userid){

		let firstName = document.getElementById('oldFirstName');
		let lastName = document.getElementById('oldLastName');
		let userIdElement = document.getElementById('oldDataId');
		let users = JSON.parse(localStorage.getItem('allUsers'));
		let found;
		users.forEach(item => {
			if(item[1]["@userId"] == userid){
				found = item[1];
			}
		})

		if(found){
			firstName.value = found['firstName'];
			lastName.value = found['lastName'];
			userIdElement.value = found['@userId'];
		}
	}

	function search(){
		let input, filter, ul, li, a, i, txtValue;

		input = document.getElementById("userSearch");
		filter = input.value.toUpperCase();

		table = document.getElementById("allUserTable");
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
	
