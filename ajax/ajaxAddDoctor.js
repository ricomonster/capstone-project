$('document').ready(function(){
	$("#submitDoc").click(function(){
			$('#waiting').slideDown(500);
			$('#message').hide(0);
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doAddDoctor.php',
				dataType : 'json',
				data: {
					firstname : $('#firstname').val(),
					middlename : $('#middlename').val(),
					lastname : $('#lastname').val(),
					title : $("#title").val(),
					position : $("#position").val(),
					specialization : $("#specialization").val(),
					contact : $("#contact").val(),
					address : $("#address").val(),
					duty : $("#duty").val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#addDrForm').show(500);
						}else{
							$(':input','#addDrForm')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#addDrForm').show(500);
						}else{
							$(':input','#addDrForm')
							.not(':button, :submit, :reset, :hidden')
							.val('');
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