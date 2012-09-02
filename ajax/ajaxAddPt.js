$('document').ready(function(){
	$("#submitAddPt").click(function(){
			$('body,html').animate({scrollTop:0},800);
			$('#waiting').slideDown(500);
			$('#message').hide(0);
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doAddPt.php',
				dataType : 'json',
				data: {
					firstname : $('#firstname').val(),
					middlename : $('#middlename').val(),
					lastname : $('#lastname').val(),
					membership : $('#membership').val(),
					sex : $('#sex').val(),
					cs : $('#cs').val(),
					birthdate : $('#birthdate').val(),
					opdnum : $('#opdnum').val(),
					address : $('#address').val(),
					placeofbirth : $("#placeofbirth").val(),
					occupation : $("#occupation").val(),
					contactno : $("#contactno").val(),
					religion : $("#religion").val(),
					nationality : $("#nationality").val(),
					dateofvisit : $('#dateofvisit').val(),
					age : $('#age').val(),
					timein : $('#timein').val(),
					inampm : $('#inampm').val(),
					timeout : $('#timeout').val(),
					outampm : $('#outampm').val(),
					sys : $('#sys').val(),
					dia :  $('#dia').val(),
					cr : $('#cr').val(),
					rr : $('#rr').val(),
					temp : $('#temp').val(),
					weight : $('#weight').val(),
					complaint : $('#complaint').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#addPtForm').show(500);
						}else{
							$(':input','#addPtForm')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#addPtForm').show(500);
						}else{
							$(':input','#addPtForm')
							.not(':button, :submit, :reset, :hidden')
							.val('')
							.removeAttr('required');
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