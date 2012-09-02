$('document').ready(function(){
	$("#submitClinical").click(function(){
			$('body,html').animate({scrollTop:0},800);
			$('#waiting').slideDown(500);
			$('#message').hide(0);
			
			if ($('#wb').attr('checked')){ var wb = $('#wb').val();}else{var wb = "N/A"}
			if ($('#imp').attr('checked')){ var imp = $('#imp').val();}else{var imp = "N/A"}
			if ($('#unmp').attr('checked')){ var unmp = $('#unmp').val();}else{var unmp = "N/A"}
			if ($('#exp').attr('checked')){ var exp = $('#exp').val();}else{var exp = "N/A"}
			if ($('#ref').attr('checked')){ var ref = $('#ref').val();}else{var ref = "N/A"}
			
			if ($('#trans').attr('checked')){ var trans = $('#trans').val();}else{var trans = "N/A"}
			if ($('#hama').attr('checked')){ var hama = $('#hama').val();}else{var hama = "N/A"}
			if ($('#abs').attr('checked')){ var abs = $('#abs').val();}else{var abs = "N/A"}
			if ($('#others').attr('checked')){ var others = $('#othersval').val();}else{var others = "N/A"}
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doAddClinicalFace.php',
				dataType : 'json',
				data: {
					category : $('#category').val(),
					nameofnextkin: $('#namekin').val(),
					relationshipkin : $('#kinrelationship').val(),
					addresskin : $('#kinaddress').val(),
					
					dateadmitted : $('#dateadmitted').val(),
					timeadmitted : $('#timeadmitted').val(),
					datedischarge : $('#datedischarge').val(),
					timedischarge : $('#timedischarge').val(),
					ampmdis : $('#ampmdis').val(),
					noofhosdays : $('#no-of-hosdays').val(),
					
					servicedept : $('#serdept').val(),
					ward : $('#ward').val(),
					serdeptat : $('#serdeptat').val(),
					
					admittingdiagnosis : $('#ad-diagnosis').val(),
					wb : wb,
					imp : imp,
					unmp : unmp,
					exp : exp,
					ref : ref,
					
					trans : trans,
					hama : hama,
					abs : abs,
					others : others,
					
					admittingphysician : $('#adphysician').val(),
					admittingclerk : $('#adclerk').val(),
					disposition : $('#disposition').val(),
					
					finaldiagnosis : $('#finaldiagnosis').val(),
					complications : $('#complications').val(),
					surgicaldone : $('#surgical-done').val(),
					pathologicalreport : $('#patreport').val(),
					
					residentincharge : $('#resident-in-charge').val(),
					medicalspecialist : $('#med-spec').val(),
					seniorresidenthead : $('#sen-res-head').val(),
					
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val(),
					did : $('#did').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#pthxForm').show(500);
						}else{
							$(':input','#pthxForm')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#pthxForm').show(500);
						}else{
							$(':input','#pthxForm')
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