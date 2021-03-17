<?php include './access_control/pages_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>    
		<style>
			table .img-thumbnail {
				width: 100px !important;
				height: 100px !important;
			}

			table.imgdiv{
				width: 100px !important;
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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-user-shield fa-lg"></i> Identity Verification Request&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">                  
                    <div class="col">
                        <div class="table-responsive">
                            <table id="tblIdentityVerificationReqUser" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
										<th></th>                                
                                        <th>Request Verification By</th>                            
                                        <th>Requested User</th>
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
		function tblIdentityVerificationReqUser(callback) {
			var tbldata = "";
			$.post('controllers/userController.php', {action: 'tblIdentityVerificationReqUser'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- Users Not Available -- </td>';
					tbldata += '</tr>';
					$('#tblIdentityVerificationReqUser tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_viewfiles" value="' + qdt.usr_id + '"><i class="fas fa-info"></i></button>';
						tbldata += '<button class="btn btn-dark btn_approve" value="' + qdt.usr_id + '"><i class="fas fa-user-shield fa-lg"></i> Approve</button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td>' + qdt.rlcmb_name + '</td>';
						tbldata += '<td><a target="_blank" href="../public-profile.php?usr_id=' + qdt.usr_id + '">' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</a><br><strong>Email: </strong>' + qdt.usr_email + ' <strong>Phone: </strong>' + qdt.usr_phone + '</td>';
						tbldata += '</tr>';
					});

					$('#tblIdentityVerificationReqUser tbody').html('').append(tbldata);

					$('[data-toggle="tooltip"]').tooltip();
				}

				$('.btn_approve').click(function () {
					var usr_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to approve this identity verification ?",
						type: "info",
						showCancelButton: true,
						cancelButtonClass: "btn-light",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/userController.php', {action: 'userIdentityVerifyApprove', usr_id: usr_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Identity Verification!", e.msg, "success");
								tblIdentityVerificationReqUser();								
							} else {
								swal("Identity Verification!", x.msg, "error");
							}
						}, "json");
					});
				});

				$('.btn_viewfiles').click(function () {
					var usr_id = $(this).val();
					var confirmModalString = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Information of Identity Verifition</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">';
					//here is model body start
					confirmModalString += '<iframe frameborder="0" id="iframe_imageupload" src="../userverify_fileupload.php?id=' + usr_id + '" width="100%"></iframe> ';
					//here is model body end
					confirmModalString += '</div>' +
							//start model footer
							'<div class="modal-footer">' +
							'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
							'</div>' +
							//end modal footer
							'</div>' +
							'</div>' +
							'</div>';

					var confirmModal = $(confirmModalString);
					confirmModal.modal('show');

				});


				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}, "json");
		}






		$(document).ready(function () {
			tblIdentityVerificationReqUser();

		});
    </script>
</body>
</html>