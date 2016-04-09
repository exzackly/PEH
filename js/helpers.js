
// Opens the correct modal tab for login and signup
$('.loginsignup').on('click', function() {
	whichtab = $(this).data('opentab');
	$('#myModal').modal('show');
	$('.nav-tabs li:eq('+whichtab+') a').tab('show');
});
