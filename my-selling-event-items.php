<?php include './access_control/auth.php'; ?>  
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<style>
			.img-table-thumb{
				width: 120px !important;
				height: auto;
			}
		</style>	
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="PayerID" value="<?php
		if (isset($_REQUEST['PayerID'])) {
			echo $_REQUEST['PayerID'];
		} else {
			echo "0";
		}
		?>"/>
		<input type="hidden" id="token" value="<?php
		if (isset($_REQUEST['token'])) {
			echo $_REQUEST['token'];
		} else {
			echo "0";
		}
		?>"/>
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<div class="container">					
					<div class="row justify-content-center mb-4">
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">My Selling Event Items</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-box-open"></i> My Selling Event Items</h1>
								<span class="badge badge-dark px-3 py-2 font-size-lg">Total Commission Collected : <span id="total_commission">0</span></span>
							<span class="badge badge-primary px-3 py-2 font-size-lg">Total Received Commission: <span id="total_received">0</span></span>
						</div>
					</div>
				</div>
				<div class="container-fluid">	
					<div class="row justify-content-center px-xl-4 px-sm-2">
						<div class="col-xl-12 col-lg-12 col-12">						
							<div class="table-responsive table-sm font-size-sm mt-3">
								<table id="tblEventOrderHistory"  class="table table-bordered" style="width:100%">
									<thead class="thead-dark">
										<tr>                                                        
											<th></th>                           
											<th></th>                           
											<th>Order ID</th>
											<th>Buyer</th>
											<th>Item</th>
											<th>Sold Qty</th>
											<th>Unit Price</th>
											<th>Total Amount</th>
											<th>Buyer Transaction Status</th>                                        
											<th><i class="fab fa-paypal"></i> Buyer PayPal Transaction Info</th>

											<th>Purchase Date</th>  
											<th>Acc.Executive Commission Received Status</th> 
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>		
				</div>
			</section>							
		</main>     
		<?php
		include './includes/frontend-footer.php';
		include './includes/end-block-all.php';
		include './includes/comboboxJS.php';
		include './includes/commonJS.php';
		?>	
		<script>
			function tblEventItemOrderHistory(callback) {
				var total_commission = 0;
				var total_received = 0;
				var tbldata = "";
				$.post('bkp/controllers/paypalController.php', {action: 'tblEventItemOrderHistoryAccExe'}, function (e) {
					if (e === undefined || e.length === 0 || e === null) {
						tbldata += '<tr>';
						tbldata += '<td colspan="13" class="text-center bg-info text-white"> History Info Not Available </td>';
						tbldata += '</tr>';
						$('#tblEventOrderHistory tbody').html('').append(tbldata);
					} else {
						$.each(e, function (index, qdt) {
							index++;
							var total_amount_item = 0;
							var total_item_commission = 0;
							tbldata += '<tr>';
							tbldata += '<td></td>';
							tbldata += '<td>';
							tbldata += '<div class="btn-group btn-group-sm font-size-sm">';
							tbldata += '<button class="btn btn-primary btn_viewcart" value="' + qdt.or_id + '"  data-toggle="tooltip" data-placement="top" title="View Ordered Cart Items"><i class="fas fa-receipt fa-lg"></i></button>';
							tbldata += '</div>';
							tbldata += '</td>';
							tbldata += '<td>' + qdt.or_id + '</td>';
							tbldata += '<td><a target="_blank" href="public-profile.php?usr_id=' + qdt.or_usr_id + '">' + qdt.buyer + '</a></td>';
							tbldata += '<td>';
							if (qdt.evtem_img === "#") {
								tbldata += '<a target="_blank" href="event-item.php?id=' + qdt.evtem_id + '"><strong class="text-center">' + qdt.evtem_name + '<strong><br><img src="assets/img/noimage.png" class="rounded-lg img-table-thumb"></a>';
							} else {
								tbldata += '<a target="_blank" href="event-item.php?id=' + qdt.evtem_id + '"><strong class="text-center">' + qdt.evtem_name + '<strong><br><img src="asset_imageuploader/eventitemprofilephoto/' + qdt.evtem_id + '/thumbnail/' + qdt.evtem_img + '" class="rounded-lg img-table-thumb"></a>';
							}
							tbldata += '</td>';
							tbldata += '<td>' + qdt.oritm_qty + '</td>';
							tbldata += '<td>$' + qdt.oritm_qty_unit_price + ' USD</td>';
							total_amount_item = parseFloat(qdt.oritm_qty_unit_price) * parseFloat(qdt.oritm_qty);

							tbldata += '<td>$' + Number(total_amount_item).toFixed(2) + ' USD</td>';
							if (parseInt(qdt.or_status) == 1) {
								tbldata += '<td><span class="font-size-sm badge badge-primary">Processing</span></td>';
							} else if (parseInt(qdt.or_status) == 2) {
								total_commission += (parseFloat(total_amount_item) * parseFloat(qdt.sys_account_executive_com_rate)) / 100;
								tbldata += '<td><span class="font-size-sm badge badge-success">Completed</span></td>';
							} else if (parseInt(qdt.or_status) == 0) {
								tbldata += '<td><span class="font-size-sm badge badge-dark">Not Processed</span></td>';
							}
//							tbldata += '<td>$' + qdt.or_totalamt + ' USD</td>';
							if (parseInt(qdt.or_status) == 2) {
								tbldata += '<td><strong>Payer ID: </strong> ' + qdt.m_payer_id + '<br><strong>Payer Email: </strong> ' + qdt.m_player_pp_email + '<br><strong>Transaction No: </strong> ' + qdt.m_txn_id + '<br><strong>Paid Status: </strong> ' + qdt.m_paid_status + '</td>';
							} else {
								tbldata += '<td>-</td>';
							}

							tbldata += '<td>' + qdt.or_created_date + ' ' + qdt.or_created_time + '</td>';
							if (parseInt(qdt.oritm_commission_release_status) == 0) {
								tbldata += '<td><span class="badge badge-info font-size-md p-2">Pending</span></td>';
							} else if (parseInt(qdt.oritm_commission_release_status) == 1) {
								tbldata += '<td><span class="badge badge-primary font-size-md p-2">Processing</span></td>';
							} else if (parseInt(qdt.oritm_commission_release_status) == 2) {
								total_item_commission = (parseFloat(total_amount_item) * parseFloat(qdt.sys_account_executive_com_rate)) / 100;
								total_received += parseFloat(total_item_commission);
								tbldata += '<td><span class="badge badge-success font-size-md p-2 mb-2">Received</span> <br><strong> TRN ID: </strong>' + qdt.oritm_paypal_trn_id + '<br><strong>Commission:</strong> $' + Number(total_item_commission).toFixed(2) + ' USD</td>';
							}
							tbldata += '</tr>';
						});
						$('#total_commission').html('').append('$' + Number(total_commission).toFixed(2) + ' USD');
						$('#total_received').html('').append('$' + Number(total_received).toFixed(2) + ' USD');

						$('#tblEventOrderHistory tbody').html('').append(tbldata);
						if ($.fn.DataTable.isDataTable('#tblEventOrderHistory')) {
							//re initialize 
							$('#tblEventOrderHistory').DataTable().destroy();
							$('#tblEventOrderHistory tbody').empty();
							$('#tblEventOrderHistory tbody').html('').append(tbldata);
							$('#tblEventOrderHistory').DataTable({
								responsive: {
									details: {
										type: 'column',
										target: 'tr'
									}
								},
								columnDefs: [
									{className: 'control text-right', orderable: false, targets: 0},
									{orderable: false, targets: 0}
								]
							});
						} else {
							//initilized                    
							$('#tblEventOrderHistory tbody').html('').append(tbldata);
							$('#tblEventOrderHistory').DataTable({
								responsive: {
									details: {
										type: 'column',
										target: 'tr'
									}
								},
								columnDefs: [
									{className: 'control text-right', orderable: false, targets: 0},
									{orderable: false, targets: 0}
								]
							});
						}
						$('[data-toggle="tooltip"]').tooltip();

						$('.btn_viewcart').click(function () {
							var or_id = $(this).val();
							$.post('bkp/controllers/eventController.php', {action: 'eventItemsByOrderID', or_id: or_id}, function (e) {
								var eventModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
										'<div class="modal-dialog modal-lg" role="document">' +
										'<div class="modal-content">' +
										'<div class="modal-header">' +
										'<h5 class="modal-title" id="exampleModalLabel">Order Cart</h5>' +
										'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
										'<span aria-hidden="true">&times;</span>' +
										'</button>' +
										'</div>' +
										'<div class="modal-body">' +
										//here is model body start                        
										'<div class="row">' +
										'<div class="col-lg-12">' +
										'<div class="table-responsive">' +
										'<table id="tblCartItems" class="table font-size-sm" style="width:100%">' +
										'<thead class="thead-dark">' +
										'<tr>' +
										'<th></th>' +
										'<th>Item</th>' +
										'<th>Unit Price</th>' +
										'<th>Qty</th>' +
										'<th>Total</th>' +
										'</tr>' +
										'</thead>' +
										'<tbody>';
								var nettotal = 0;
								$.each(e, function (index, qdt) {
									var subtotal = 0
									subtotal = parseFloat(qdt.evtem_price) * parseFloat(qdt.oritm_qty);
									nettotal += parseFloat(subtotal)
									eventModalStr += '<tr>';
									eventModalStr += '<td>';
									if (qdt.evtem_img === "#") {
										eventModalStr += '<img src="assets/img/noimage.png" class="rounded-lg img-table-thumb">';
									} else {
										eventModalStr += '<img src="asset_imageuploader/eventitemprofilephoto/' + qdt.evtem_id + '/thumbnail/' + qdt.evtem_img + '" class="rounded-lg img-table-thumb">';
									}
									eventModalStr += '</td>';
									eventModalStr += '<td>' + qdt.evtem_name + '</td>';
									eventModalStr += '<td>' + qdt.oritm_qty_unit_price + '</td>';
									eventModalStr += '<td>' + qdt.oritm_qty + '</td>';
									eventModalStr += '<td class="text-right">$' + Number(subtotal).toFixed(2) + ' USD</td>';
									eventModalStr += '</tr>';
								});
								eventModalStr += '</tbody>' +
										'<tfoot>' +
										'<tr><th colspan="4" class="text-right text-uppercase font-size-md">Net Total</th><th class="text-right">$' + Number(nettotal).toFixed(2) + ' USD</th></tr>' +
										'</tfoot>' +
										'</table>' +
										' </div>' +
										'</div>' +
										'</div>' +
										//here is model body end
										'</div>' +
										//start model footer
										'<div class="modal-footer">' +
										'<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>' +
										'</div>' +
										//end modal footer
										'</div>' +
										'</div>' +
										'</div>';
								var eventModal = $(eventModalStr);
								eventModal.modal('show');
							}, "json");
						});
					}

					if (callback !== undefined) {
						if (typeof callback === 'function') {
							callback();
						}
					}
				}, "json");
			}


			function updateOrderEventItemPayPalToken() {
				var PayerID = $('#PayerID').val();
				var token = $('#token').val();
				if (PayerID !== "0" && token !== "0") {
					swal({
						title: "Dubboe Checkout!",
						text: "Please wait for processing your transaction...",
						imageUrl: 'assets/img/gif/1.gif',
						showConfirmButton: false
					});
					$.post('bkp/controllers/paypalController.php', {action: 'updateOrderEventItemPayPalToken', token: token}, function (e) {

						if (parseInt(e.msgType) == 1) {
							shoppingCartClearAll();
							swal({
								title: "Dubboe Checkout!",
								text: e.msg,
								type: "success",
								showCancelButton: false,
								closeOnConfirm: true,
							}, function (isConfirm) {
								if (isConfirm) {
									window.location.href = 'order-history.php';
								}
							});
						} else {
							$.post('bkp/controllers/paypalController.php', {action: 'removeOrderEventItem', token: token}, function (ex) {
								if (parseInt(ex.msgType) == 1) {
									swal({
										title: "Dubboe Checkout!",
										text: e.msg,
										type: "info",
										showCancelButton: false,
										closeOnConfirm: true,
									}, function (isConfirm) {
										if (isConfirm) {
											window.location.href = 'order-history.php';
										}
									});
								} else {
									swal("Dubboe Checkout!", ex.msg, "warning");
								}
							}, "json");
						}
					}, "json");
				} else if (PayerID == "0" && token !== "0") {
					//cancel and return
					$.post('bkp/controllers/paypalController.php', {action: 'removeOrderEventItem', token: token}, function (e) {
						if (parseInt(e.msgType) == 1) {
							swal({
								title: "Dubboe Checkout!",
								text: e.msg,
								type: "info",
								showCancelButton: false,
								closeOnConfirm: true,
							}, function (isConfirm) {
								if (isConfirm) {
									window.location.href = 'order-history.php';
								}
							});
						} else {
							swal("Dubboe Checkout!", e.msg, "warning");
						}
					}, "json");
				}
			}
			$(document).ready(function () {
				updateOrderEventItemPayPalToken();
				tblEventItemOrderHistory();
			});
        </script>
	</body>
</html>