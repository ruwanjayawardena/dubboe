<?php include './access_control/pages_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>
		<style>
			iframe{
                height: 400px;
				border: none;
            }
		</style>

    </head>
    <body>
        <!--navbar-->
		<?php include 'includes/backend-navbar.php'; ?>       

        <!--body content-->
        <section class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-file"></i> <span class="usr_name"></span> Executives Credit  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard();"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
				<div class="row">                    
                    <div class="col">
                        <div class="table-responsive">
                            <table id="tblPointEarnedUser" class="table table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                 
                                        <th>Executive</th>                                        
                                        <th>Received Credits</th>                                        
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
    </section>
	<?php
	include './includes/end-block.php';
	include './includes/comboboxJS.php';
	include './includes/commonJS.php';
	?>  
    <script>

		function tblPointEarnedUser(callback) {
			var tbldata = "";
			$.post('controllers/userController.php', {action: 'tblAllPointsEarnedExecutives'}, function (euser) {
				$.post('controllers/userController.php', {action: 'tblAllUseresEarnedPoints'}, function (epoints) {
					if (euser === undefined || euser.length === 0 || euser === null) {
						tbldata += '<tr>';
						tbldata += '<td colspan="3" class="bg-danger text-center"> -- Users Not Available -- </td>';
						tbldata += '</tr>';
						$('#tblPointEarnedUser tbody').html('').append(tbldata);
					} else {
						$.each(euser, function (index_euser, qdt_euser) {
							var total_user_earned_points = 0;
							var user_point_available = false;
							index_euser++;
							tbldata += '<tr>';
							tbldata += '<td></td>';
							tbldata += '<td><strong><a target="_blank" href="../public-profile.php?usr_id=' + qdt_euser.usr_id + '">' + qdt_euser.usr_first_name + ' ' + qdt_euser.usr_last_name + '</strong></a><br><span> ' + qdt_euser.usr_email + '</span><br><span>' + qdt_euser.usr_phone + '</span></td>';
							tbldata += '<td>';
							tbldata += '<table class="table" style="width:100%">';
							tbldata += '<thead class="thead-light">';
							tbldata += '<tr>';
							tbldata += '<th>Received From</th>';
//							tbldata += '<th>Description</th>';
							tbldata += '<th>Credit Received</th>';
							tbldata += '</tr>';
							tbldata += '</thead>';
							tbldata += '<tbody>';
							$.each(epoints, function (index_epoints, qdt_epoints) {
								console.log(qdt_euser.usr_id);
								if ((parseInt(qdt_euser.usr_id) == parseInt(qdt_epoints.rec_user)) && (parseInt(qdt_epoints.point_received_from_usr_acc_active) == 1)) {
									user_point_available = true;
									tbldata += '<tr>';
									tbldata += '<td><a target="_blank" href="../public-profile.php?usr_id=' + qdt_epoints.rec_relate_ref_user + '">' + qdt_epoints.point_received_from + '</a></td>';
//									tbldata += '<td>' + qdt_epoints.rec_description + '</td>';
									tbldata += '<td>$' + parseFloat(qdt_epoints.rec_points).toFixed(2) + ' USD</td>';
									tbldata += '</tr>';
									total_user_earned_points += parseFloat(qdt_epoints.rec_points);
								}
							});
							if (!user_point_available) {
								tbldata += '<tr>';
								tbldata += '<td colspan="3" class="bg-danger text-center"> -- Credits Not Earned -- </td>';
								tbldata += '</tr>';
							}
							tbldata += '</tbody>';
							tbldata += '<tfoot class="bg-secondary text-white">';
							tbldata += '<tr>';
							tbldata += '<td class="text-right"> Total Credits </td>';
							tbldata += '<td>$' + total_user_earned_points.toFixed(2) + ' USD</td>';
							tbldata += '</tr>';
							tbldata += '</tfoot>';
							tbldata += '</table>';
							tbldata += '</td>';
							tbldata += '</tr>';
						});


						if ($.fn.DataTable.isDataTable('#tblPointEarnedUser')) {
							//re initialize 
							$('#tblPointEarnedUser').DataTable().destroy();
							$('#tblPointEarnedUser tbody').empty();
							$('#tblPointEarnedUser tbody').html('').append(tbldata);
							$('#tblPointEarnedUser').DataTable({
								responsive: {
									details: {
										type: 'column',
										target: 'tr'
									}
								},
								columnDefs: [
									{className: 'control text-right', orderable: false, targets: 0},
									{orderable: false, targets: 0}
								],
//							order: [2, 'asc']
							});
						} else {
							//initilized                    
							$('#tblPointEarnedUser tbody').html('').append(tbldata);
							$('#tblPointEarnedUser').DataTable({
								responsive: {
									details: {
										type: 'column',
										target: 'tr'
									}
								},
								columnDefs: [
									{className: 'control text-right', orderable: false, targets: 0},
									{orderable: false, targets: 0}
								],
//							order: [2, 'asc']
							});
						}

						$('[data-toggle="tooltip"]').tooltip();
					}

					$('#tblPointEarnedUser').on('draw.dt', function () {



					});






					if (callback !== undefined) {
						if (typeof callback === 'function') {
							callback();
						}
					}
				}, "json");
			}, "json");
		}







		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready			
			tblPointEarnedUser();
		});
    </script>
</body>
</html>