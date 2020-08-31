<div class="modal fade mt-4" id="new-users">
		<div class="modal-dialog">
			<div class="modal-content tr tl br bl">
				<div class="modal-header br bl bg-darkgreen">
					<div class="mx-auto ">
						<h1 class="font-weight-bold dark-beige">Create User</h1>
					</div>
				</div>
				<div class="modal-body tr tl bg-lightbeige">
					<form class="px-5 py-3" action="../../controllers/auth/add_user.php" method="post">
					    <div class="form-group m-0">
					        <label class="px-4 mt-1 mb-0" for="firstName">Firstname</label>
					        <input type="text" class="r-50 p-3 form-control" name="firstName" id="firstName" placeholder="Firstname">
					    </div>
					    <div class="form-group m-0">
					        <label class="px-4 mt-1 mb-0" for="lastName">Lastname</label>
					        <input type="text" class="r-50 p-3 form-control" name="lastName" id="lastName" placeholder="Lastname">
					    </div>
					    <div class="form-group m-0">
					        <label class="px-4 mt-1 mb-0" for="email">Email</label>
					        <input type="email" class="r-50 p-3 form-control" name="email" aria-describedby="emailHelp" id="email" placeholder="Enter your email">
					    </div>
					    <div class="form-group">
					        <label class="px-4 mt-1 mb-0" for="password">Password</label>
					        <input type="password" class="r-50 p-3 form-control" name="password" id="password" placeholder="Password">
					    </div>
					    <div class="row mt-4">
					    	<div class="text-center mx-auto">
						    	<button type="submit" name="set" class="btn bg-lightgreen px-5 mt-t btn-sign r-50">Register</button>
						    	<button data-dismiss="modal" class="btn bg-darkbeige px-5 mt-t btn-sign r-50">Cancel</button>
					    	</div>
					    </div>
					</form>		
				</div>
			</div>
		</div>
	</div>
