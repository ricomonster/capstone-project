$('document').ready(function(){
	$("#subAdmit").click(function(){
			$('#waiting').slideDown(500);
			$('#message').hide(0);
			$("#subAdmit").removeClass().addClass("disgbutton").val("Adding..."); 
		
			var pid = $('#pid').val();
			var rid = $('#rid').val();
			var docid = $('#docid').val();
			var service = $('#service').val();
			var roomtype = $('#roomtype').val();
			
			if(roomtype == 'Ward'){var bednum = $('#bednum_wd').val();}
			if(roomtype == 'Private Room'){var bednum = $('#bednum_pr').val();}
			if(roomtype == 'Private Room w/ Air-Con'){var bednum = $('#bednum_pra').val();}
			
			var datastring = 'pid='+pid+'&rid='+rid+'&docid='+docid+'&service='+service+'&roomtype='+roomtype+'&bednum='+bednum;
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doAdmitPatient.php',
				dataType : 'json',
				data: datastring,
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
						
						$("#subAdmit").removeClass().addClass("greenbutton").val("Admit Patient"); 
						
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