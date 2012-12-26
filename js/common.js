/*  codz by PortWatcher ,goodluck hackathon,goodluck segmentfault */

$(document).ready(function() {
		setInterval('update()',20000);
});



function update() {
	$('#loading').show();
	$('#more').hide();
	$.ajax({
		type : "get",
		url  : "index.php?action=more",
		success: function(resp){
			$('#loading').hide();
			$('#more').show();
			$.map(resp, function(msg) {
				var metro;
				var modal = '<div class="modal hide fade" id="'+ $.htmlspecialchars(msg.tucaoid) +'">'+
					'<div class="modal-header">'+
						'<a class="close" data-dismiss="modal">&times;</a>'+
						'<h2>'+ $.htmlspecialchars(msg.nickname) +'吐槽到：</h2>'+	
					'</div>'+
					'<div class="modal-body">'+
						'<p>'+ $.htmlspecialchars(msg.content) +'</p>'+
					'</div>'+
					'<div class="modal-footer">'+
						'<p class="small">'+ $.htmlspecialchars(msg.date) +'</p>'+
					'</div>'+
				'</div>';
				if(msg.color == ""){
					var num = Math.floor(Math.random() * 10);
					var colors = ['bg-color-blue','bg-color-blueDark','bg-color-green','bg-color-greenDark','bg-color-red','bg-color-yellow','bg-color-orange','bg-color-pink','bg-color-purple','bg-color-darken'];
					msg.color = colors[num];
				}
				if(msg.content.length > 20) {
					metro = '<a class="tile wide text '+ $.htmlspecialchars(msg.color) + '" data-toggal="modal" href="#'+ msg.tucaoid +'">' +
						'<div class="column-text"><div class="text-header3">' + $.htmlspecialchars(msg.content) + '</div></div><div class="app-label">' + $.htmlspecialchars(msg.user) + '</div></a>' + modal;
				}
				else {
					metro = '<a class="tile square text '+ $.htmlspecialchars(msg.color) + '" data-toggal="modal" href="#'+ msg.tucaoid +'">' +
						'<div class="column-text"><div class="text-header3">' + $.htmlspecialchars(msg.content) + '</div></div><div class="app-label">' + $.htmlspecialchars(msg.user) + '</div></a>' + modal;
				}
				$('#update').prepend(metro);
			});

		}
	});
}

$(document).ready(function (){
	$('#login').click(function() {
		$.ajax({
			type: "post",
			url : "index.php?action=login",
			data: {
				username : $('#username').val(),
				password : $.md5($('#password').val())
			},
			success: function(resp) {
				if(resp.errno == 0){
					$('#loginform').hide();
					$('#welcomename').html(resp.nickname);
					$('#welcomemsg').show();
				}
				else{
					$('#info').show();
				}
			}
		});
	});
});

$(document).ready(function() {
	$('#more').click(function() {
		update();
	});
});

var metrocolor = "";
$(document).ready(function() {
	$('.btn-group > .btn').click(function() {
		metrocolor = this.value;
	});
});

$(document).ready(function() {
	$('#go').click(function(){
		$('#go').button('loading');
		var text = $('#content').val();
		
		$.ajax({
			type: "post",
			url : "index.php?action=create",
			data:{ 
				content : text,
				color : metrocolor
			},
			success: function(resp){
				if (resp.errno == 0){
					$('#tucaosuccess span').html("吐槽成功！");
					$('#tucaosuccess').show();
					setTimeout("$('#create').hide();window.location.reload();", 1000);
				}
				else{
					$('#tucaofail').show();
				}
			}
		});
	});
});




