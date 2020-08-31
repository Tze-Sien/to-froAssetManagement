<div class="modal fade mt-4" id="create-assets">
		<div class="modal-dialog">
			<div class="modal-content tr tl br bl">
				<div class="modal-header br bl bg-darkgreen">
					<div class="mx-auto ">
						<h1 class="font-weight-bold dark-beige">Create New Asset</h1>
					</div>
				</div>
				<div class="modal-body tr tl bg-lightbeige">
					<form class="px-5 py-3" action="../../controllers/assets/add_assets.php" method="post" enctype="multipart/form-data">
					    <div class="form-group m-0">
					        <label class="px-4 mt-1 mb-0" for="asset_name">Asset Name</label>
					        <input type="text" class="r-50 p-3 form-control" name="assetName" id="assetName" placeholder="Asset Name">
					    </div>
					    <div class="form-group m-0">
					        <label class="px-4 mt-1 mb-0" for="u_photo">Upload Photo</label>
					        <input type="file" class="r-50 p-3 form-control" name="image" id="u_photo" placeholder="Upload Photo">
					    </div>
					    <div class="form-group">
					        <label class="px-4 mt-1 mb-0" for="quantity">Quantity</label>
					        <input type="text" class="r-50 p-3 form-control" name="quantity" id="quantity" placeholder="Quantity">
					    </div>
					    <div class="row mt-4">
					    	<div class="text-center mx-auto">
						    	<button type="submit" name="set" class="btn bg-lightgreen px-5 mt-t btn-sign r-50">Create</button>
						    	<a data-dismiss="modal"  class="btn bg-darkbeige px-5 mt-t btn-sign r-50">Cancel</a>
					    	</div>
					    </div>
					</form>		
				</div>
			</div>
		</div>
	</div>

