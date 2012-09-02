$('document').ready(function(){
	$("#submitVer").click(function(){
			$('#waiting').slideDown(500);
			$('#message').hide(0);
			$("#submitVer").removeClass().addClass("disgbutton").val("Verifying..."); 
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doVerify.php',
				dataType : 'json',
				data: {
					username : $('#username').val(),
					password : $('#password').val(),
					cpassword : $('#cpassword').val(),
					loc : $('#loc').val(),
					type : $('#type').val(),
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					uid : $('#uid').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
						
						$("#submitVer").removeClass().addClass("greenbutton").val("Continue");
			
						if (data.error === true){
							$('#verifyForm').show(500);
						}else{
							window.location.href = data.msg;
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
						
						$("#submitVer").removeClass().addClass("greenbutton").val("Continue");
			
						if (data.error === true){
							$('#verifyForm').show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},
				
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			
			});
			return false;
	});
});