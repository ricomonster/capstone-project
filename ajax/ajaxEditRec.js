$('document').ready(function(){
	$("#submitEditRec").click(function(){
			$('body,html').animate({scrollTop:0},800);
			$('#waiting').slideDown(500);
			$('#message').hide(0);
			$("#submitEditRec").removeClass().addClass("disgbutton").val("Updating..."); 
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doEditRec.php',
				dataType : 'json',
				data: {
					rid : $('#rid').val(),
					pid : $('#pid').val(),
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
					complaint : $('#complaint').val(),
					remarks : $('#remarks').val(),
					foradmission : $('#foradmission').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
						
						$("#submitEditRec").removeClass().addClass("greenbutton").val("Update Patient's Record"); 
			
						if (data.error === true){
							$('#addRecForm').show(500);
						}
					}else{
						$("#submitEditRec").removeClass().addClass("greenbutton").val("Update Patient's Record"); 
						
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#addRecForm').show(500);
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