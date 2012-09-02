$('document').ready(function(){
	$("#subDeleteRec").click(function(){
			$('#waiting').slideDown(500);
			$('#message').hide(0);
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doDeleteRecord.php',
				dataType : 'json',
				data: {
					pid : $('#pid').val(),
					rid : $('#rid').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#deleteInfo').show(500);
						}else{
							window.location.href = data.msg;
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#deleteInfo').show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There is something wrong in the system. Please try refreshing the page or try again later. If problem persists, contact the developer.').delay(500).fadeIn();
				}
			
			});
			return false;
	});
});