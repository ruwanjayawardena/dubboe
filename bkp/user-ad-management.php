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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-ad fa-lg"></i> User Ad Management&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-12 col-lg-12">
                        <div class="table-responsive">
                            <table id="tblAdv" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
									<tr>
										<th></th>										
										<th></th>										
										<th>Status</th>										
										<th>#</th>                                
										<th>Category</th>                            
										<th>Location</th>
										<th>Ad</th>
										<th>Posted Date</th>
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
		function tblAd(callback) {
			var tbldata = "";
			$.post('controllers/advController.php', {action: 'allAdvAdmin'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="8" class="bg-danger text-center"> -- Ads Not Available -- </td>';
					tbldata += '</tr>';
					$('#tblAdv tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						if (parseInt(qdt.ad_status) == 2 || parseInt(qdt.ad_status) == 1) {
							tbldata += '<tr>';
							tbldata += '<td>';
							tbldata += '<div class="btn-group btn-group-md">';
							tbldata += '<button class="btn btn-light btn_view" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Preview Ad"><i class="fas fa-eye"></i></button>';
							if (parseInt(qdt.ad_status) == 2) {
								//pending
								tbldata += '<button class="btn btn-danger btn_reject" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Reject Ad"><i class="fas fa-stop-circle"></i></button>';
								tbldata += '<button class="btn btn-success btn_active" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Activate Ad"><i class="fas fa-play-circle"></i></button>';
							} else if (parseInt(qdt.ad_status) == 1) {
								//active
								tbldata += '<button class="btn btn-dark btn_inactive" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Hold Ad"><i class="fas fa-pause-circle"></i></button>';
							}

							tbldata += '</div>';
							tbldata += '</td>';
							tbldata += '<td></td>';
							if (parseInt(qdt.ad_status) == 2) {
								//pending
								tbldata += '<td><h5><span class="badge badge-warning">Pending...</span></h5></td>';
							} else if (parseInt(qdt.ad_status) == 1) {
								//active
								tbldata += '<td><h5><span class="badge badge-success">Active</span></h5></td>';
							}
							tbldata += '<td>' + qdt.ad_id + '</td>';
							tbldata += '<td>' + qdt.ad_maincategory_name + '/ ' + qdt.ad_subcategory_name + '</td>';
							tbldata += '<td>' + qdt.ad_state_name + '/ ' + qdt.ad_city_name + '</td>';
							tbldata += '<td>' + qdt.ad_title + '</td>';
							tbldata += '<td>' + qdt.ad_date_updated + '</td>';
							tbldata += '</tr>';
						}

					});

					if (tbldata === "") {
						tbldata += '<tr>';
						tbldata += '<td colspan="8" class="bg-danger text-center"> -- Ads Not Available -- </td>';
						tbldata += '</tr>';
					}

					$('#tblAdv tbody').html('').append(tbldata);

					if ($.fn.DataTable.isDataTable('#tblAd')) {
						//re initialize 
						$('#tblAd').DataTable().destroy();
						$('#tblAdv tbody').empty();
						$('#tblAdv tbody').html('').append(tbldata);
						$('#tblAd').DataTable({
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
						$('#tblAdv tbody').html('').append(tbldata);
						$('#tblAd').DataTable({
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
					}
					$('[data-toggle="tooltip"]').tooltip();
				}

				$('#tblAd').on('draw.dt', function () {
					$('.btn_inactive').click(function () {
						var ad_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to hold this ad display?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-warning",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, Hold!",
							closeOnConfirm: false
						}, function () {
							$.post('controllers/advController.php', {action: 'holdAdv', ad_id: ad_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Ad Hold!", e.msg, "success");
									tblAd();
								} else {
									swal("Ad Hold!", e.msg, "error");
								}
							}, "json");
						});
					});

					$('.btn_reject').click(function () {
						var ad_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to reject this ad?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, Reject!",
							closeOnConfirm: false
						}, function () {
							$.post('controllers/advController.php', {action: 'rejectAdv', ad_id: ad_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Ad Reject!", e.msg, "success");
									tblAd();
								} else {
									swal("Ad Reject!", e.msg, "error");
								}
							}, "json");
						});
					});

					$('.btn_active').click(function () {
						var ad_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to active this ad?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-success",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, Activate!",
							closeOnConfirm: false
						}, function () {
							$.post('controllers/advController.php', {action: 'activeAdvByAdmin', ad_id: ad_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Ad Activate!", e.msg, "success");
									tblAd();
								} else {
									swal("Ad Activate!", e.msg, "error");
								}
							}, "json");
						});
					});

					$('.btn_view').click(function () {
						var ad_id = $(this).val();
						window.location.href = '../ad-info.php?ad_id=' + ad_id;

					});
				});

				$('.btn_view').click(function () {
					var ad_id = $(this).val();
					window.location.href = '../ad-info.php?ad_id=' + ad_id;

				});

				$('.btn_active').click(function () {
					var ad_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to active this ad?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-success",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, Activate!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/advController.php', {action: 'activeAdvByAdmin', ad_id: ad_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Ad Activate!", e.msg, "success");
								tblAd();
							} else {
								swal("Ad Activate!", e.msg, "error");
							}
						}, "json");
					});
				});

				$('.btn_inactive').click(function () {
					var ad_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to hold this ad display?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-warning",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, Hold!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/advController.php', {action: 'holdAdv', ad_id: ad_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Ad Hold!", e.msg, "success");
								tblAd();
							} else {
								swal("Ad Hold!", e.msg, "error");
							}
						}, "json");
					});
				});

				$('.btn_reject').click(function () {
					var ad_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to reject this ad?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, Reject!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/advController.php', {action: 'rejectAdv', ad_id: ad_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Ad Reject!", e.msg, "success");
								tblAd();
							} else {
								swal("Ad Reject!", e.msg, "error");
							}
						}, "json");
					});
				});








				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}, "json");
		}

		$(document).ready(function () {
			tblAd();
		});
    </script>
</body>
</html>