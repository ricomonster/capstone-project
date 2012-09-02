$('document').ready(function(){
	$("#subBillStat").click(function(){
			$('body,html').animate({scrollTop:0},800);
			$('#waiting').slideDown(500);
			$('#message').hide(0);
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doBillStatement.php',
				dataType : 'json',
				data: {
					drugsandmedicine : $('#drugsandmedicine').val(),
					exdrugsandmedicines : $('#exdrugsandmedicines').val(),
					phdrugsandmedicines : $('#phdrugsandmedicine').val(),
					
					supplies : $('#supplies').val(),
					exsupplies : $('#exsupplies').val(),
					phsupplies : $('#phsupplies').val(),
					
					laboratory : $('#laboratory').val(),
					exlaboratory : $('#exlaboratory').val(),
					phlaboratory : $('#phlaboratory').val(),
					
					xray : $('#xray').val(),
					exxray : $('#exxray').val(),
					phxray : $('#phxray').val(),
					
					ultrasound : $('#ultrasound').val(),
					exultrasound : $('#exultrasound').val(),
					phultrasound : $('#phultrasound').val(),
					
					ecg : $('#ecg').val(),
					execg : $('#execg').val(),
					phecg : $('#phecg').val(),
					
					oxygen : $('#oxygen').val(),
					exoxygen : $('#exoxygen').val(),
					phoxygen : $('#phoxygen').val(),
					
					accomsubs : $('#accomsubs').val(),
					exaccomsubs : $('#exaccomsubs').val(),
					phaccomsubs : $('#phaccomsubs').val(),
					
					professionalfee : $('#professionalfee').val(),
					exprofessionalfee : $('#exprofessionalfee').val(),
					phprofessionalfee : $('#phprofessionalfee').val(),
					
					orfeedrfee : $('#orfeedrfee').val(),
					exorfeedrfee : $('#exorfeedrfee').val(),
					phorfeedrfee : $('#phorfeedrfee').val(),
					
					admissionfee : $('#admissionfee').val(),
					exadmissionfee : $('#exadmissionfee').val(),
					
					wardservice : $('#wardservice').val(),
					exwardservice : $('#exwardservice').val(),
					
					nebfee : $('#nebfee').val(),
					exnebfee : $('#exnebfee').val(),
					
					ambulancefee : $('#ambulancefee').val(),
					exambulancefee : $('#exambulancefee').val(),
					
					total : $('#total').val(),
					extotal : $('#extotal').val(),
					phtotal : $('#phtotal').val(),
					
					status : $('#status').val(),
					billingnumber : $('#billingnumber').val(),
					membership : $('#membership').val(),
					nurseonduty : $('#nurseonduty').val(),
					finaldiagnosis : $('#finaldiagnosis').val(),
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#bill-form').show(500);
						}else{
							$(':input','#addRecForm')
							.not(':button, :submit, :reset, :hidden')
							.val('')
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#bill-form').show(500);
						}else{
							$(':input','#bill-form')
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