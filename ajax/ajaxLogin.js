$('document').ready(function(){
	$("#submitLogin").click(function(){
			$('#waiting').slideDown(500);
			$('#message').hide(0);
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doLogin.php',
				dataType : 'json',
				data: {
					username : $('#username').val(),
					password : $('#password').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					$('#message').removeClass().addClass((data.error === true) ? 'errorlog' : 'successlog').text(data.msg).delay(500).slideDown(500);
			
					if (data.error === true){
							$('#loginForm').show(500);
					}else{ (data.error === false)
						window.location.href = data.msg;
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('errorlog').text('There was an error. Please try again later.').delay(500).fadeIn();
				//$('#demoForm').show(500);
				}
			
			});
			return false;
	});
});