 <?php
	include('../App/includes/connect_db.php');
	$req = $bdd->query("SELECT * FROM tache");
 ?>
<div class="content-page">
    <div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card-box">
						<h4 class="mt-0 header-title">List of Tasks</h4>
                        <p class="text-muted font-14 mb-3"></p>
						<table id="datatable" class="table table-bordered dt-responsive nowrap">
                            <thead>
								<tr>
									<th>title</th>
                                    <th>Description</th>
                                    <th>personnel</th>
                                    <th>projet</th>
                                    <th>date_fin</th>
                                    <th>pourcentage</th>
                                    <th>etat</th>
                                </tr>
                            </thead>
							<tbody>
							
							</tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<script src="assets/js/vendor.min.js"></script>
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