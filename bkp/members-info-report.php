<?php include './access_control/pages_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>
		<style>
			.badge{
				font-size: 0.9rem !important;
			}
		</style>
    </head>
    <body>
        <!--navbar-->
		<?php include 'includes/backend-navbar.php'; ?>        

        <!--body content-->
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-file"></i>  Members Information Report  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard();"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row justify-content-center">                    
                    <div class="col-lg-12 col-12">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                
                                        <!--<th>Account Activation</th>-->                                  
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Username</th>
                                        <!--<th>Membership</th>-->                                        
                                        <!--<th>Identity Verification</th>-->                                       
                                        <th>PayPal Email</th>                                       
                                        <th>Business Name</th>                                       
                                        <th>Product/Service Type</th>                                       
                                        <th>Profile Category</th>                                       
                                        <th>Profile Grading</th>                                       
                                        <th>State</th>                                       
                                        <th>City</th>                                       
                                        <th>Personal Address</th>                                       
                                        <th>Business Address</th>                                       
                                        <th>Website</th>                                       
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
		function tblUser(callback) {
			var tbldata = "";
			$.post('controllers/userController.php', {action: 'AllDubboeMembersReport'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="6" class="bg-danger text-center"> -- Users not available -- </td>';
					tbldata += '</tr>';
					$('#userTable tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						tbldata += '<tr>';
//						if (parseInt(qdt.usr_status) == 1) {
//							tbldata += '<td><span class="badge badge-success">Actived</span></td>';
//						} else {
//							tbldata += '<td><span class="badge badge-warning">Pending</span></td>';
//						}
						tbldata += '<td><a target="_blank" href="../public-profile.php?usr_id=' + qdt.usr_id + '">' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</a></td>';
						tbldata += '<td>' + qdt.usr_email + '</td>';
						tbldata += '<td>' + qdt.usr_phone + '</td>';
						tbldata += '<td>' + qdt.usr_username + '</td>';
//						if (parseInt(qdt.usr_membership_status) == 1) {
//							tbldata += '<td><span class="badge badge-success">Actived</span><br><strong>Recent Update Date:</strong><br> ' + qdt.usr_last_membership_renew_date + ' <br><strong>Next Renew Date:</strong><br> ' + qdt.usr_next_membership_renew_date + '</td>';
//						} else {
//							tbldata += '<td><span class="badge badge-warning">Not Activated/Renewed</span></td>';
//						}
//						if (parseInt(qdt.usr_verified_status) == 0) {
//							tbldata += '<td><span class="badge badge-dark">Not Verifiled</span></td>';
//						} else if (parseInt(qdt.usr_verified_status) == 1) {
//							tbldata += '<td><span class="badge badge-warning">Processing</span></td>';
//						} else if (parseInt(qdt.usr_verified_status) == 2) {
//							tbldata += '<td><span class="badge badge-success">Verified</span><br><strong>Verifid by:</strong> ' + qdt.usr_verified_indicator_name + '</td>';
//						}
						if (qdt.pro_paypal_email === "") {
							tbldata += '<td>Not Available</td>';
						} else {
							tbldata += '<td>' + qdt.pro_paypal_email + '</td>';
						}
						if (qdt.pro_business_name !== null) {
							tbldata += '<td>' + qdt.pro_business_name + '</td>';
						} else {
							tbldata += '<td></td>';
						}
						if (qdt.pro_typeof_productservice !== null) {
							tbldata += '<td>' + qdt.pro_typeof_productservice + '</td>';
						} else {
							tbldata += '<td></td>';
						}
						tbldata += '<td>' + qdt.pro_profile_category_name + '</td>';
						tbldata += '<td>' + qdt.pro_grading_name + '</td>';
						tbldata += '<td>' + qdt.pro_state_name + '</td>';
						tbldata += '<td>' + qdt.pro_city_name + '</td>';
						if (qdt.pro_address !== null) {
							tbldata += '<td>' + qdt.pro_address + '</td>';
						} else {
							tbldata += '<td></td>';
						}
						if (qdt.pro_business_address !== null) {
							tbldata += '<td>' + qdt.pro_business_address + '</td>';
						} else {
							tbldata += '<td></td>';
						}
						if (qdt.pro_website_url !== null) {
							tbldata += '<td>' + qdt.pro_website_url + '</td>';
						} else {
							tbldata += '<td>#</td>';
						}
						tbldata += '</tr>';
					});
					if ($.fn.DataTable.isDataTable('#userTable')) {
						//re initialize 
						$('#userTable').DataTable().destroy();
						$('#userTable tbody').empty();
						$('#userTable tbody').html('').append(tbldata);
						$('#userTable').DataTable({
							"scrollX": true,
							dom: 'Bfrtip',
							buttons: {
								dom: {
									button: {
										className: 'btn btn-dark mr-1'
									}
								},
								buttons: [
									{
										extend: 'copy',
										title: 'Dubboe.com Member Information'
									}, {
										extend: 'csv',
										title: 'Dubboe.com Member Information'
									}, {
										extend: 'excel',
										orientation: 'landscape',
										title: 'Dubboe.com Member Information'
									}, {
										extend: 'pdfHtml5',
										orientation: 'landscape',
										pageSize: 'LEGAL',
										title: 'Dubboe.com Member Information',
										customize: function (doc) {
											doc.styles.tableHeader.fontSize = 7
											doc.defaultStyle.fontSize = 6;
											doc.defaultStyle.margin = 'center'
										}
									}, {extend: 'print', orientation: 'landscape', title: 'Dubboe.com Member Information',
										customize: function (win) {
											$(win.document.body).addClass('white-bg');
											$(win.document.body).css('font-size', '10px');
											$(win.document.body).find('table')
													.addClass('compact')
													.css('font-size', 'inherit');
										}
									}
								]
							}
						});
					} else {
						//initilized                    
						$('#userTable tbody').html('').append(tbldata);
						$('#userTable').DataTable({
							"scrollX": true,
							dom: 'Bfrtip',
							buttons: {
								dom: {
									button: {
										className: 'btn btn-dark mr-1'
									}
								},
								buttons: [
									{
										extend: 'copy',
										title: 'Dubboe.com Member Information'
									}, {
										extend: 'csv',
										title: 'Dubboe.com Member Information'
									}, {
										extend: 'excel',
										orientation: 'landscape',
										title: 'Dubboe.com Member Information'
									}, {
										extend: 'pdfHtml5',
										orientation: 'landscape',
										pageSize: 'LEGAL',
										title: 'Dubboe.com Member Information',
										customize: function (doc) {
											doc.styles.tableHeader.fontSize = 7
											doc.defaultStyle.fontSize = 6;
											doc.defaultStyle.margin = 'center'
										}
									}, {extend: 'print', orientation: 'landscape', title: 'Dubboe.com Member Information',
										customize: function (win) {
											$(win.document.body).addClass('white-bg');
											$(win.document.body).css('font-size', '10px');
											$(win.document.body).find('table')
													.addClass('compact')
													.css('font-size', 'inherit');
										}
									}
								]
							}
						});
					}
				}


				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}
			, "json");
		}

		$(document).ready(function () {
			tblUser();
		});
    </script>
</body>
</html>