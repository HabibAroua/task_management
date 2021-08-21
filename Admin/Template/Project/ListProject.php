<?php
	$content =  file_get_contents("http://localhost/Personel_manengment/App/controller/Project/getAll.php");
	$users = json_decode($content); //on a converti le contenu json vers un tableau associaive
 ?>
<div class="content-page">
    <div class="content">
		<div class="container-fluid">
			<div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">List of Personel</h4>
                        <p class="text-muted font-14 mb-3"></p>
						<table id="datatable" class="table table-bordered dt-responsive nowrap">
							<thead>
								<tr>
									<th>Project name</th>
                                    <th>Description</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Price</th>
                                    <th> Action </th>
								</tr>
                            </thead>
                            <tbody>
								<?php
									foreach($users as $v)
									{
										echo "<tr>";
											echo "<td>".$v->project_name."</td>";
											echo "<td>".$v->description."</td>";
											echo "<td>".$v->start_date."</td>";
											echo "<td>".$v->end_date."</td>";
											echo "<td>".$v->price."</td>";
											echo "<td>";
												echo "<center>";
												$id = $v->id;
													echo "<a onclick='destroy($id)' href='#'class='ti-trash'> </a>";
												echo "</center>";
												echo "<center>";
													$id= $v->id;
													echo "<a  href='updateProject.php?id=$id' class='ti-pencil-alt'> </a>";
												echo "</center>";
											echo "</td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables/dataTables.bootstrap4.js"></script>
<script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
<script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/datatables/buttons.html5.min.js"></script>
<script src="assets/libs/datatables/buttons.flash.min.js"></script>
<script src="assets/libs/datatables/buttons.print.min.js"></script>
<script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
<script src="assets/libs/datatables/dataTables.select.min.js"></script>
<script src="assets/libs/pdfmake/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/vfs_fonts.js"></script>
<script src="assets/js/pages/datatables.init.js"></script>
<script src="assets/js/app.min.js"></script>
<script>
    function destroy(id)
    {
        alertify.confirm
        (
            "Do you want to delete this project ?.",
            function()
            {
                $.ajax
                (
                    {
                        async: false, //if you want to change a global variable you should add this instruction
                        type: 'POST',
                        url: "../App/controller/Project/delete.php",
                        data:
                        {
                            'id' : id
                        },
                        success: 
                        function(result)
                        {
																										alert(result);
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
            },
            function()
            {
                alertify.error('You cancelled the deleting');
            }
        );
								//location.href = "ListProject.php";
    }
</script>