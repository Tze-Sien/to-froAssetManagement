<div class="container-fluid h-100">
	<div class="row h-100">
		<div class="col-lg-6 bg-white m-auto">
			<div class="text-center">
				<img src="/resources/img/logo/tfro-green.svg" class="logo-size">
			</div>
		</div>
		<div class="col-lg-6 bg-darkgreen row justify-content-center m-0">
			<form class="login-form" method="POST" action="/controllers/auth/signin_user.php">
				<div>
					<div class="text-center">
						<h1 class="cambria dark-beige font-weight-bold title m-0">Welcome.</h1>
						<h4 class="cambria font-italic light-beige">assets  managment  has  never  been  easier</h4>
					</div>
					<div class="bg-white mt-3 r-25 p-4">
						<div class="form-group">
							 <label class="mx-4">Email</label>
							 <input type="text" name="email" class="form-control py-3 r-50">
						</div>
						<div class="form-group">
							<label class="mx-4">Password</label>
						 	<input type="password" name="password" class="form-control py-3 r-50">
						</div>
						<div class="text-center">
							 <button class="btn bg-lightgreen px-5 px-5 mt-3 btn-sign r-50">Sign In</button>
						</div>
					</div>
				</div>
				<?php
				if($_SESSION['message'] ){
					echo "<div id='alert' class='alert alert-danger mt-3 text-center r-25' role='alert'>";
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
			</form>
		</div>
	</div>
</div> 

<script>
	let alertBox = document.getElementById('alert');
	setTimeout(() => {
		
		if(alertBox) alertBox.style.display = 'none';
	}, 5000);
</script>

<?php
	unset($_SESSION['message']);
?>