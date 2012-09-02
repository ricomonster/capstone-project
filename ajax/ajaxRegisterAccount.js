$('document').ready(function(){
	$("#submitReg").click(function(){
			$('#waiting').slideDown(500);
			$('#message').hide(0);
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doRegisterUser.php',
				dataType : 'json',
				data: {
					firstname : $('#firstname').val(),
					lastname : $('#lastname').val(),
					username : $('#username').val(),
					password : $('#password').val(),
					cpassword : $('#cpassword').val(),
					priviledge : $('#priviledge').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#addForm').show(500);
						}else{
							$(':input','#addForm')
							.not(':button, :submit, :reset, :hidden')
							.val('')
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#addForm').show(500);
						}else{
							$(':input','#addForm')
							.not(':button, :submit, :reset, :hidden')
							.val('')
							/*.removeAttr('checked')
							.removeAttr('selected');*/
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