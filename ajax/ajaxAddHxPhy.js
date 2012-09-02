$('document').ready(function(){
	$("#subHxPhys").click(function(){
			$('body,html').animate({scrollTop:0},800);
			$('#waiting').slideDown(500);
			$('#message').hide(0);
			
			if ($('#measles').attr('checked')){ var measles = $('#measles').val();}else{var measles = "N/A"}
			if ($('#tb').attr('checked')){ var tb = $('#tb').val();}else{var tb = "N/A"}
			if ($('#malaria').attr('checked')){ var malaria = $('#malaria').val();}else{var malaria = "N/A"}
			if ($('#arthritis').attr('checked')){ var arthritis = $('#arthritis').val();}else{var arthritis = "N/A"}
			if ($('#syphillis').attr('checked')){ var syphillis = $('#syphillis').val();}else{var syphillis = "N/A"}
			if ($('#drugs').attr('checked')){ var drugs = $('#drugs').val();}else{var drugs = "N/A"}
			
			if ($('#mumps').attr('checked')){ var mumps = $('#mumps').val();}else{var mumps = "N/A"}
			if ($('#asthma').attr('checked')){ var asthma = $('#asthma').val();}else{var asthma = "N/A"}
			if ($('#rheumatic').attr('checked')){ var rheumatic = $('#rheumatic').val();}else{var rheumatic = "N/A"}
			if ($('#typhoid').attr('checked')){ var typhoid = $('#typhoid').val();}else{var typhoid = "N/A"}
			if ($('#diarrhea').attr('checked')){ var diarrhea = $('#diarrhea').val();}else{var diarrhea = "N/A"}
			if ($('#alcoholism').attr('checked')){ var alcoholism = $('#alcoholism').val();}else{var alcoholism = "N/A"}
			
			if ($('#mental').attr('checked')){ var mental = $('#mental').val();}else{var mental = "N/A"}
			if ($('#diabetes').attr('checked')){ var diabetes = $('#diabetes').val();}else{var diabetes = "N/A"}
			if ($('#cancer').attr('checked')){ var cancer = $('#cancer').val();}else{var cancer = "N/A"}
			if ($('#hypertension').attr('checked')){ var hypertension = $('#hypertension').val();}else{var hypertension = "N/A"}
			if ($('#blooddys').attr('checked')){ var blooddys = $('#blooddys').val();}else{var blooddys = "N/A"}
			if ($('#allergies').attr('checked')){ var allergies = $('#allergies').val();}else{var allergies = "N/A"}
			
			if ($('#othcheck').attr('checked')){ var others = $('#others').val();}else{var others = "N/A"}
			if ($('#prevcheck').attr('checked')){ var prevop = $('#prevop').val();}else{var prevop = "N/A"}
			if ($('#childcheck').attr('checked')){ var children = $('#children').val();}else{var children = "N/A"}
			
			if ($('#fcancer').attr('checked')){ var fcancer = $('#fcancer').val();}else{var fcancer = "N/A"}
			if ($('#ftb').attr('checked')){ var ftb = $('#ftb').val();}else{var ftb = "N/A"}
			if ($('#fhypertension').attr('checked')){ var fhypertension = $('#fhypertension').val();}else{var fhypertension = "N/A"}
			if ($('#fmental').attr('checked')){ var fmental = $('#fmental').val();}else{var fmental = "N/A"}
			if ($('#fblooddys').attr('checked')){ var fblooddys = $('#fblooddys').val();}else{var fblooddys = "N/A"}
			
			if ($('#heartdisease').attr('checked')){ var heartdisease = $('#heartdisease').val();}else{var heartdisease = "N/A"}
			if ($('#fdiabetes').attr('checked')){ var fdiabetes = $('#fdiabetes').val();}else{var fdiabetes = "N/A"}
			if ($('#fallergies').attr('checked')){ var fallergies = $('#fallergies').val();}else{var fallergies = "N/A"}
			if ($('#familyplanning').attr('checked')){ var familyplanning = $('#familyplanning').val();}else{var familyplanning = "N/A"}
			
			if ($('#stomach').attr('checked')){ var stomach = $('#stomach').val();}else{var stomach = "N/A"}
			if ($('#liver').attr('checked')){ var liver = $('#liver').val();}else{var liver = "N/A"}
			if ($('#gallbladder').attr('checked')){ var gallbladder = $('#gallbladder').val();}else{var gallbladder = "N/A"}
			if ($('#spleen').attr('checked')){ var spleen = $('#spleen').val();}else{var spleen = "N/A"}
			
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doAddHxPhy.php',
				dataType : 'json',
				data: {
					complaint : $('#complaint').val(),
					presentill : $('#presentill').val(),
					
					measles : measles,
					tb : tb,
					malaria : malaria,
					arthritis : arthritis,
					syphillis : syphillis,
					drugs : drugs,
					
					mumps : mumps,
					asthma : asthma,
					rheumatic : rheumatic,
					typhoid : typhoid,
					diarrhea : diarrhea,
					alcoholism : alcoholism,
					
					mental : mental,
					diabetes : diabetes,
					cancer : cancer,
					hypertension : hypertension,
					blooddys : blooddys,
					allergies : allergies,
					
					others : others,
					prevop : prevop,
					children : children,
					
					fcancer : fcancer,
					ftb : ftb,
					fhypertension : fhypertension,
					fmental : fmental,
					fblooddys : fblooddys,
					heartdisease : heartdisease,
					fdiabetes : fdiabetes,
					fallergies : fallergies,
					familyplanning : familyplanning,
					
					genappearance : $('#genappearance').val(),
					skin : $('#skin').val(),
					headbent : $('#headbent').val(),
					headandlymph : $('#headandlymph').val(),
					chestbreast : $('#chestbreast').val(),
					hrate : $('#hrate').val(),
					hdia : $('#hdia').val(),
					hsys : $('#hsys').val(),
					rrate : $('#rrate').val(),
					
					stomach : stomach,
					liver : liver,
					gallbladder : gallbladder,
					spleen : spleen,
					
					kidneyblad : $('#kidneyblad').val(),
					genitalia : $('#genitalia').val(),
					spine : $('#spine').val(),
					neurological : $('#neurological').val(),
					impression : $('#impression').val()	,
					
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val(),
					docid : $('#docid').val()
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