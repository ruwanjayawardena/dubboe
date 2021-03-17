<script type="text/javascript">
	//Load Combo Box Functions  
	function cmbSubCombo(mcmb_id, className, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('bkp/controllers/subComboController.php', {action: 'cmbSubCombo', mcmb_id: mcmb_id}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Data not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.scmb_id)) {
							cmbdata += '<option value="' + qdt.scmb_id + '" selected>' + qdt.scmb_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
					}
				});
			}
			$(className).html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}
	
	function cmbLoadHomeLocation(callback) {
		var cmbdata = "";
		$.post('bkp/controllers/subComboController.php', {action: 'cmbLoadHomeLocation'}, function (e) {
			if (e === "" || e === null) {
				cmbdata += '<option value="0"> Locations Not Available! </option>';
			} else {
				cmbdata += e;
			}
			$('.cmbLocations').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		});
	}
	
	function cmbLoadHomeCategory(callback) {		
		var cmbdata = "";
		$.post('bkp/controllers/subComboController.php', {action: 'cmbLoadHomeCategory'}, function (e) {
			if (e === "" || e === null) {
				cmbdata += '<option value="0"> Categories Not Available! </option>';
			} else {
				cmbdata += e;
			}
			$('.cmbCategories').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		});
	}

	function cmbSubComboModal(mod, mcmb_id, className, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('bkp/controllers/subComboController.php', {action: 'cmbSubCombo', mcmb_id: mcmb_id}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Data not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.scmb_id)) {
							cmbdata += '<option value="' + qdt.scmb_id + '" selected>' + qdt.scmb_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
					}
				});
			}
			mod.find(className).html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbSubComboMultiple(mcmb_id, className, selectedAr, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('bkp/controllers/subComboController.php', {action: 'cmbSubCombo', mcmb_id: mcmb_id}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Data not available! </option>';
			} else {
				dataAvailable = 1;
				var ar = [];
				$.each(e, function (index, qdt) {
					ar.push(qdt.scmb_id);
				});
				$.each(selectedAr, function (selIndex, selVal) {
					ar = ar.filter(val => val !== selVal);
				});

				if (selectedAr.length !== 0 || selectedAr !== null) {
					$.each(e, function (index, qdt) {
						$.each(selectedAr, function (selIndex, selVal) {
							if (parseInt(selVal) == parseInt(qdt.scmb_id)) {
								cmbdata += '<option value="' + qdt.scmb_id + '" selected>' + qdt.scmb_name + '</option>';
							}
						});
					});
					$.each(ar, function (selIndex, selVal) {
						$.each(e, function (index, qdt) {
							if (parseInt(selVal) == parseInt(qdt.scmb_id)) {
								cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
							}
						});
					});
				} else {
					$.each(e, function (index, qdt) {
						cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
					});
				}
			}

			$(className).html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}



	function cmbRelateCombo(mcmb_id, scmb_relationship, className, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('bkp/controllers/subComboController.php', {action: 'cmbRelateCombo', mcmb_id: mcmb_id, scmb_relationship: scmb_relationship}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Data not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.rlcmb_id)) {
							cmbdata += '<option value="' + qdt.rlcmb_id + '" selected>' + qdt.rlcmb_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.rlcmb_id + '">' + qdt.rlcmb_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.rlcmb_id + '">' + qdt.rlcmb_name + '</option>';
					}
				});
			}
			$(className).html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbRelateSubCombo(mcmb_id, rlcmb_id, className, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('bkp/controllers/subComboController.php', {action: 'cmbRelateSubCombo', mcmb_id: mcmb_id, rlcmb_id: rlcmb_id}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Data not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.scmb_id)) {
							cmbdata += '<option value="' + qdt.scmb_id + '" selected>' + qdt.scmb_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
					}
				});
			}
			$(className).html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbAdcategory(selected, callback) {
		var cmbdata = "";
		$.post('bkp/controllers/kn_advController.php', {action: 'cmbAdcategory'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> -- Data not found -- </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.adcat_id)) {
							cmbdata += '<option value="' + qdt.adcat_id + '" selected>' + qdt.adcat_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.adcat_id + '">' + qdt.adcat_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.adcat_id + '">' + qdt.adcat_name + '</option>';
					}
				});
			}
			$('.cmbAdcategory').html('').append(cmbdata);
			chosenRefresh();


			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}

	function cmbAdcategoryWithName(selected, callback) {
		var cmbdata = "";
		$.post('bkp/controllers/kn_advController.php', {action: 'cmbAdcategory'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> -- Data not found -- </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.adcat_id)) {
							cmbdata += '<option value="' + qdt.adcat_id + '-#-' + qdt.adcat_name + '" selected>' + qdt.adcat_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.adcat_id + '-#-' + qdt.adcat_name + '">' + qdt.adcat_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.adcat_id + '-#-' + qdt.adcat_name + '">' + qdt.adcat_name + '</option>';
					}
				});
			}
			$('.cmbAdcategory').html('').append(cmbdata);
			chosenRefresh();


			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}

	function cmdServiceCategory(selected, callback) {
		var cmbdata = "";
		$.post('bkp/controllers/serviceController.php', {action: 'cmbServiceCategory'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Category not available! </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.secat_id)) {
							cmbdata += '<option value="' + qdt.secat_id + '" selected>' + qdt.secat_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.secat_id + '">' + qdt.secat_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.secat_id + '">' + qdt.secat_name + '</option>';
					}
				});
			}
			$('.cmbServiceCategory').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}


	function cmbModel(selected, callback) {
		var cmbdata = "";
		$.post('bkp/controllers/modelController.php', {action: 'cmbModel'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Models not available! </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.mo_id)) {
							cmbdata += '<option value="' + qdt.mo_id + '" selected>' + qdt.usr_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.mo_id + '">' + qdt.usr_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.mo_id + '">' + qdt.usr_name + '</option>';
					}
				});
			}
			$('.cmbModel').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}

	function cmbService(ser_category, selected, callback) {
		var cmbdata = "";
		$.post('bkp/controllers/serviceController.php', {action: 'cmdService', secat_id: ser_category}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Services not available! </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.ser_id)) {
							cmbdata += '<option value="' + qdt.ser_id + '" selected>' + qdt.ser_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.ser_id + '">' + qdt.ser_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.ser_id + '">' + qdt.ser_name + '</option>';
					}
				});
			}
			$('.cmbService').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}


</script>

