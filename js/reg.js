/* codz by PortWatcher,Goodluck segmentfault */

$(document).ready(function(){
	$('#step1').hide();
	$('#step2').hide();
	$('#step3').hide();
	if(location.hash == "#2"){
		$('#step2').show();
	}
	else{
		$('#step1').show();
	}
});


$(document).ready(function() {
	$('#next1').click(function() {
		$('#step1').hide();
		$('#step2').show();
	});
});


$(document).ready(function() {
	$('#next2').click(function() {
		var name = $('#name').val();
		var pass = $('#pass').val();
		var nick = $('#nick').val();
		
		$.ajax({
			type: "post",
			url : "index.php?action=do_register",
			data: {
				username : name,
				password : $.md5(pass),
				nickname : nick
			},
			success: function(resp) {
				if(resp.errno == 0){
					$('#step2').hide();
					$('#step3').show();
					setTimeout('window.location="index.php"',2500);
				}
			}
		});
	});
});


$(document).ready(function(){
	$('.illegal').popover({
		content: ' ^ & ¡¢µ¥Ë«ÒýºÅµÈ',
		placement : 'right'
	});
});