<div class="content-page">
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="card-box">
						<div class="dropdown float-right">
							<a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
								<i class="mdi mdi-dots-vertical"></i>
                            </a>
							<div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
						</div>
						<h4 class="header-title mt-0 mb-3">Add New Project</h4>
                        <form method="post" action="../App/controller/ajoutProjet.php" >
                            <div class="form-group">
								<label for="project_name">Project_name</label>
                                <input type="text" name="project_name" parsley-trigger="change" required
                                    placeholder="Enter project_name" class="form-control" id="project_name" />
                            </div>
							<div class="form-group">
                                <label for="Description">Description</label>
                                <input type="text" name="Description" parsley-trigger="change" required
                                    placeholder="Enter Description" class="form-control" id="Description" />
                            </div>
							<div class="form-group">
                                <label for="start_date">date_debut</label>
                                <input type="date" name="date_deb" parsley-trigger="change" required
                                    placeholder="Enter your date_debut" class="form-control" id="start_date" />
                            </div>
							<div class="form-group">
                                <label for="end_date">date_fin</label>
                                <input type="date" name="date_fin" parsley-trigger="change" required
                                    placeholder="Enter date_fin" class="form-control" id="end_date" />
                            </div>
							<div class="form-group">
                                <label for="prix"> Price </label>
                                <input data-parsley-equalto="#prix" type="number" required
                                    placeholder="prix" class="form-control" id="prix" name="prix" />
                            </div>
							<div class="form-group text-right mb-0">
                                <button class="btn btn-primary waves-effect waves-light mr-1" id="btSubmit" type="submit">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                    Cancel
                                </button>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="assets/libs/morris-js/morris.min.js"></script>
<script src="assets/libs/raphael/raphael.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>
<script src="assets/js/app.min.js"></script>
<script>
	$(document).ready
		(
			function()
			{
				$("#btSubmit").click
				(
					function(e)
					{
						var start_date = $('#start_date').val();
						var end_date = $('#end_date').val();
						if(end_date < start_date)
						{
							alertify.error("The start date should be before the end date !!");
							e.preventDefault();
						}
                    }
                );
				e.preventDefault();
			}
		);
		
</script>