<?php
	$id = 0;
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}
	$content =  file_get_contents("http://localhost/Personel_manengment/App/controller/Project/findById.php?id=$id");
	$project = json_decode($content); //on a converti le contenu json vers un tableau associaive
?>
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
							<input type="text" id="id" name="id" value="<?php echo $project->id ?>" hidden />
                            <div class="form-group">
								<label for="project_name">Project_name</label>
                                <input type="text" name="project_name" value="<?php echo $project->project_name ?>" parsley-trigger="change" required
                                    placeholder="Enter project name" class="form-control" id="project_name" />
                            </div>
							<div class="form-group">
                                <label for="description">Description</label>
								<textarea name="Description" parsley-trigger="change" required
                                    placeholder="Enter Description" class="form-control" id="description"><?php echo $project->description ?></textarea>
                            </div>
							<div class="form-group">
                                <label for="start_date">Start date</label>
                                <input type="date" value="<?php echo $project->start_date ?>" name="date_deb" parsley-trigger="change" required
                                    placeholder="Enter the start date" class="form-control" id="start_date" />
                            </div>
							<div class="form-group">
                                <label for="end_date">End date</label>
                                <input type="date" name="end_date" value="<?php echo $project->end_date ?>" parsley-trigger="change" required
                                    placeholder="Enter the end date" class="form-control" id="end_date" />
                            </div>
							<div class="form-group">
                                <label for="price"> Price </label>
                                <input data-parsley-equalto="#prix" type="number" required
                                    placeholder="Enter the price" value="<?php echo $project->price ?>" class="form-control" min="100" id="price" name="price" />
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
	function updateProject(id,project_name,description,start_date,end_date,price)
	{
		$.ajax
                (
                    {
                        async: false, //if you want to change a global variable you should add this instruction
                        type: 'POST',
                        url: "../App/controller/Project/update.php",
                        data:
                        {
							'id' : id,
                            'project_name' : project_name,
							'description' : description,
							'start_date' : start_date,
							'end_date' : end_date,
							'price' : price
                        },
                        success: 
                        function(result)
                        {
							json = JSON.parse(result);
							if(json.code == 0)
							{
								alertify.error(json.response);
								e.preventDefault();
							}
							else
							{
								alertify.success(json.response);
								e.preventDefault();
							}
                        }
                    }
                );
	}
	$(document).ready
		(
			function()
			{
				$("#btSubmit").click
				(
					function(e)
					{
						var id = $('#id').val();
						var project_name = $('#project_name').val();
						var description = $('#description').val();
						var start_date = $('#start_date').val();
						var end_date = $('#end_date').val();
						var price = $('#price').val();
						if(project_name === "")
						{
							$("#project_name").focus();
							alertify.error('You should the project name');
							e.preventDefault();
						}
						else
						{
							if(description === "")
							{
								$("#description").focus();
								alertify.error('You should enter the description');
								e.preventDefault();
							}
							else
							{
								if(start_date === "")
								{
									$("#start_date").focus();
									alertify.error('You Should enter the start date');
									e.preventDefault();
								}
								else
								{
									if(end_date === "")
									{
										$("#end_date").focus();
										alertify.error('You should enter the end date ');
										e.preventDefault();	
									}
									else
									{
										if(price === "")
										{
											$("#price").focus();
											alertify.error('You should enter the price of the project');
											e.preventDefault();
										}
										else
										{
											if(end_date < start_date)
											{
												$("#start_date").focus();
												alertify.error("The start date should be before the end date !!");
												e.preventDefault();
											}
											else
											{
												updateProject(id,project_name,description,start_date,end_date,price);
												e.preventDefault();
												location.href = "ListProject.php";
											}
										}
									}
								}
							}
						}
                    }
                );
				e.preventDefault();
			}
		);
</script>