$('document').ready(function(){
	$("#submitEditInfo").click(function(){
			$('#waiting').slideDown(500);
			$('#message').hide(0);
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doEditPt.php',
				dataType : 'json',
				data: {
					pid : $('#pid').val(),
					firstname : $('#firstname').val(),
					middlename : $('#middlename').val(),
					lastname : $('#lastname').val(),
					membership : $('#membership').val(),
					sex : $('#sex').val(),
					cs : $('#cs').val(),
					bdMonth : $('#bdMonth').val(),
					bdDay : $('#bdDay').val(),
					bdYear : $('#bdYear').val(),
					opdnum : $('#opdnum').val(),
					address : $('#address').val(),
					placeofbirth : $("#placeofbirth").val(),
					occupation : $("#occupation").val(),
					contactno : $("#contactno").val(),
					religion : $("#religion").val(),
					nationality : $("#nationality").val(),
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#addRecForm').show(500);
						}else{
							$(':input','#addRecForm')
							.not(':button, :submit, :reset, :hidden')
							.val('')
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#addRecForm').show(500);
						}else{
							$(':input','#addRecForm')
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