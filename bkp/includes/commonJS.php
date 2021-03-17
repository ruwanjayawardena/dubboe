<script>
	function frontNavbarMsgNotification() {
		$.post('controllers/messageController.php', {action: 'getNotReadMsgCountAdministrator'}, function (count) {
			$('.notify-msg').html('').append(count);
		}, "json");
	}
	function chosenRefresh() {
		$('select').trigger("chosen:updated");
	}

	function madeCheckBoxString(chkClassName, stringStoreID) {
		var ar = [];
		var es;
		var v;
		if ($(this).is(':checked')) {
			es = $(chkClassName + ':checked');
			es.each(function (index) {
				ar.push($(this).val());
			});
		} else {
			es = $(chkClassName + ':checked');
			es.each(function (index) {
				ar.push($(this).val());
			});
		}
		v = ar.join(',');
		$(stringStoreID).val(v);
	}


	//NEED
	function navigateDashboard() {
		var postData = {
			action: "navigateDashboard"
		}
		$.post('controllers/userController.php', postData, function (e) {
			if (parseInt(e) == 2) {
				//admin
				window.location.href = 'dashboard-admin.php';
			} else if (parseInt(e) == 3) {
				//user category
				window.location.href = '../dashboard-requester.php';
			} else if (parseInt(e) == 4) {
				//user category
				window.location.href = '../dashboard-runner.php';
			} else if (parseInt(e) == 1) {
				//super admin
				window.location.href = 'dashboard.php';
			}
		});
	}
	//END NEED



	$(document).ready(function () {		
		$('select').chosen();

		$(".datepicker").datetimepicker({
			viewMode: 'days',
			format: 'YYYY-MM-DD'
		});


		$('body').append('<button id="toTop" class="btn btn-outline-light" hidden><i class="fas fa-arrow-circle-up"></i></button>');
		$(window).on('scroll', function () {
			if ($(this).scrollTop() != 0) {
				$('#toTop').prop('hidden', false);
			} else {
				$('#toTop').prop('hidden', true);
			}
		});

		$('#toTop').click(function () {
			$("html, body").animate({scrollTop: 0}, 600);
			return false;
		});

		//NEED
		$('.logout').click(function () {
			swal({
				title: "Alert !",
				text: "Do you need to sign out ?",
				type: "info",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				cancelButtonClass: "btn-light",
				confirmButtonText: "Yes, Sign out",
				closeOnConfirm: false

			}, function () {
				$.post('controllers/userController.php', {action: 'logout'}, function (x) {
					if (parseInt(x.msgType) == 1) {
						swal({
							title: "Please Wait...",
							text: x.msg,
							timer: 1000,
							showConfirmButton: false
						});
						setTimeout(function () {
							window.location.href = "../index.php";
						}, 1500);
					} else {
						swal("Alert !", x.msg, "warning");
					}
				}, "json");
			});
		});
		//END NEED


	});
</script>