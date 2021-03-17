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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-mail-bulk fa-lg"></i> Messages&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="table-responsive table-sm font-size-sm">
                            <table id="tblMessages"  class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>                                                        
                                        <th></th>                           
                                        <th></th>                           
                                        <th>#</th>                          
                                        <th>Messages With</th>
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
		function getMessageGroupByAdministrator(callback) {
			var tbldata = "";
			$.post('controllers/messageController.php', {action: 'getMessageGroupByAdministrator'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="5" class="bg-danger text-white text-center">Messages not available</td>';
					tbldata += '</tr>';
					$('#tblMessages tbody').html('').append(tbldata);
				} else {
					//0-invited,1-userapplied,2-approve,3-reject,4-win
					$.each(e, function (index, qdt) {
						tbldata += '<tr>';
						tbldata += '<td><button class="btn btn-primary btn-sm btn_viewMsg" value="' + qdt.you_messaged_with_id + '"><i class="fas fa-eye"></i> View</button></td>';
						tbldata += '<td></td>';
						tbldata += '<td>';
//						console.log(qdt.sender_img);
						if (qdt.msg_with_img === "#") {

							tbldata += '<img src="../assets/img/noimage.png" class="img-thumbnail">';
						} else {
							tbldata += '<img src="../asset_imageuploader/userprofileimages/' + qdt.you_messaged_with_id + '/' + qdt.msg_with_img + '" class="img-thumbnail">';
						}
						tbldata += '</td>';
//							tbldata += '<td>' + qdt.msg_forwhat + '</td>';

						tbldata += '<td>' + qdt.you_messaged_with + '</td>';
//							tbldata += '<td>' + qdt.msg_create_date + ' ' + qdt.msg_create_time + '</td>';
						tbldata += '</tr>';
					});

					if ($.fn.DataTable.isDataTable('#tblMessages')) {
						//re initialize 
						$('#tblMessages').DataTable().destroy();
						$('#tblMessages tbody').empty();
						$('#tblMessages tbody').html('').append(tbldata);
						$('#tblMessages').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							]
						});
					} else {
						//initilized                    
						$('#tblMessages tbody').html('').append(tbldata);
						$('#tblMessages').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							]
						});

						$('#tblMessages').on('draw.dt', function () {
							$('.btn_viewMsg').click(function () {
								var msg_receiver = $(this).val();
								window.location.href = 'view-message.php?msgof=' + msg_receiver;
							});
						});
					}

					$('.btn_viewMsg').click(function () {
						var msg_receiver = $(this).val();
						window.location.href = 'view-message.php?msgof=' + msg_receiver;
					});
				}
			}, "json");
		}






		$(document).ready(function () {
			getMessageGroupByAdministrator();
			setInterval(function () {
				getMessageGroupByAdministrator();
			}, 5000);
		});
    </script>
</body>
</html>