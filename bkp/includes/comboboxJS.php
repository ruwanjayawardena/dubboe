<script type="text/javascript">
	//Load Combo Box Functions 
	function cmbRelateCombo(mcmb_id, scmb_relationship, className, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/subComboController.php', {action: 'cmbRelateCombo', mcmb_id: mcmb_id, scmb_relationship: scmb_relationship}, function (e) {
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
		$.post('controllers/subComboController.php', {action: 'cmbRelateSubCombo', mcmb_id: mcmb_id, rlcmb_id: rlcmb_id}, function (e) {
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

	function cmbPagefilter1(selected, callback) {
		var cmbdata = "";
		$.post('controllers/pageController.php', {action: 'cmbPagefilter1'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> -- Data Not Found -- </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.flh_id)) {
							cmbdata += '<option value="' + qdt.flh_id + '" selected>' + qdt.flh_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.flh_id + '">' + qdt.flh_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.flh_id + '">' + qdt.flh_name + '</option>';
					}
				});
			}
			$('.cmbPagefilter1').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}
	function cmbAdMainCategory(selected, callback) {
		var cmbdata = "";
		$.post('controllers/ubAdMainCategoryController.php', {action: 'cmbAdMainCategory'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> -- Data Not Found -- </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.admc_id)) {
							cmbdata += '<option value="' + qdt.admc_id + '" selected>' + qdt.admc_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.admc_id + '">' + qdt.admc_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.admc_id + '">' + qdt.admc_name + '</option>';
					}
				});
			}
			$('.cmbAdMainCategory').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}

	function cmbPagefilter2(flh_id, selected, callback) {
		var cmbdata = "";
		$.post('controllers/pageController.php', {action: 'cmbPagefilter2', flh_id: flh_id}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> -- Data Not Found -- </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.fls_id)) {
							cmbdata += '<option value="' + qdt.fls_id + '" selected>' + qdt.fls_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.fls_id + '">' + qdt.fls_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.fls_id + '">' + qdt.fls_name + '</option>';
					}
				});
			}
			$('.cmbPagefilter2').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}

	function cmbPageStyle(selected, callback) {
		var cmbdata = "";
		$.post('controllers/pageController.php', {action: 'cmbPageStyle'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> -- Data Not Found -- </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.sty_id)) {
							cmbdata += '<option value="' + qdt.sty_id + '" selected>' + qdt.sty_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.sty_id + '">' + qdt.sty_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.sty_id + '">' + qdt.sty_name + '</option>';
					}
				});
			}
			$('.cmbPageStyle').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}



	function cmbUserCategory(selected, callback) {
		var cmbdata = "";
		$.post('controllers/userController.php', {action: 'cmbUserCategory'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> -- no data found -- </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.usr_cat_id)) {
							cmbdata += '<option value="' + qdt.usr_cat_id + '" selected>' + qdt.usr_cat_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.usr_cat_id + '">' + qdt.usr_cat_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.usr_cat_id + '">' + qdt.usr_cat_name + '</option>';
					}
				});
			}
			$('.cmb_usercategory').html('').append(cmbdata);
			chosenRefresh();


			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}


	function cmbAdcategory(selected, callback) {
		var cmbdata = "";
		$.post('controllers/kn_advController.php', {action: 'cmbAdcategory'}, function (e) {
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

	function cmbAllComboBoxFilter(selected, callback) {
		var cmbdata = "";
		$.post('controllers/kn_advController.php', {action: 'cmbAllComboBoxFilter'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> -- Data not found -- </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.mcmb_id)) {
							cmbdata += '<option value="' + qdt.mcmb_id + '" selected>' + qdt.mcmb_display_text + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.mcmb_id + '">' + qdt.mcmb_display_text + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.mcmb_id + '">' + qdt.mcmb_display_text + '</option>';
					}
				});
			}
			$('.cmbAllComboBoxFilter').html('').append(cmbdata);
			chosenRefresh();


			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}


	function cmbAllTextBoxFilter(selected, callback) {
		var cmbdata = "";
		$.post('controllers/kn_advController.php', {action: 'cmbAllTextBoxFilter'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> -- Data not found -- </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.txfl_id)) {
							cmbdata += '<option value="' + qdt.txfl_id + '" selected>' + qdt.txfl_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.txfl_id + '">' + qdt.txfl_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.txfl_id + '">' + qdt.txfl_name + '</option>';
					}
				});
			}
			$('.cmbAllTextBoxFilter').html('').append(cmbdata);
			chosenRefresh();


			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}




</script>

