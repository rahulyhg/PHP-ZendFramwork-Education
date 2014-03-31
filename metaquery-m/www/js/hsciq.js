var $querywrap, $listwrap, $hscode, gatewayURL = 'http://pinecone.my.phpcloud.com/metaquery-s', hsciqs;

function init() {

	$querywrap = $("#query_wrap");
	$listwrap = $("#list_wrap");
	$hscode = $("#hs_code");
	setMode("query");

	$hscode.on("keyup", checkEnter);
	$("#reset").on("click", clearForm);
	$("#search").on("click", query);
	$("#clear").on("click", clear);
	$('#hsciqs li[role!=heading]').remove();
	$('#errorMessage').ajaxError(ajaxErrorHandler);
	jQuery.support.cors = true;
}

$(document).ready(init);

function clearForm() {
	$hscode.val("");
}

function setMode(mode) {
	if (mode === "query") {
		$querywrap.show();
		$listwrap.hide();
	} else {
		$querywrap.hide();
		$listwrap.show();
	}
}
function query(e) {
	e.preventDefault();
	e.stopPropagation();
	var hscode = $hscode.val().trim();
	if (hscode === "" || hscode.length < 4) {
		alert("at least 4 numbers", function() {
		}, "failed", 'OK');
	} else {
		getHsciqsByhs(hscode);
		setMode("result");
	}
}

function clear() {
	clearForm();
	setMode("query");
}

function checkEnter(e) {
	e.preventDefault();

	if (e.keyCode == 13) {
		$(e.target).blur();
		query();
	}
}
function getHsciqsByhs(hscode) {
	// This method is automatically generated. Don't modify it.
	jQuery.mobile.showPageLoadingMsg('Loading');
	$.ajax({
		url : gatewayURL + '/hsciqs/' + hscode,
		cache : false,
		type : 'GET',
		success : function(data, status, xhr) {
			jQuery.mobile.hidePageLoadingMsg();
			onGetHsciqs(data);
		}
	});
}

/**
 * Handle response from GET /customers
 * 
 * @param response
 * @returns
 */
function onGetHsciqs(response) {
	hsciqs = response;
	var newHsciqs = '';
	$.each(hsciqs, function(index, item) {
		newHsciqs += '<li data-theme="">' + '<h2>' + item.hs_code + '--->'
				+ item.ciq_code + '</h2>' + '<p>' + item.hs_name + '--->'
				+ item.ciq_name + '</p>' + '</li>';
	});
	$('#hsciqs li[role!=heading]').remove();
	$('#hsciqs').append(newHsciqs).listview('refresh');
}
function ajaxErrorHandler(xhr, ajaxOptions, thrownError) {
	jQuery.mobile.hidePageLoadingMsg();
	var _this = this;
	var msg = 'Ajax error. ';
	if (ajaxOptions.statusText != null && ajaxOptions.statusText != '')
		msg = msg + '<br/>' + ajaxOptions.statusText + '<br/>';
	msg = msg + 'Trying static data!';
	$(this).html(msg).show('slow', function() {
		onGetHsciqs(hsciqs);
		setTimeout(function() {
			$(_this).hide('slow');
		}, 1000);
	});
}
