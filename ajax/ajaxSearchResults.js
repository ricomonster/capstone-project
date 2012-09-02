$('document').ready(function(){
	$("#submitSearch").click(function(){
			$('#waiting').slideDown(500);
			$('#message').hide(0);
			$("#submitSearch").removeClass().addClass("disgbutton").val("Searching..."); 
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doSearchResults.php',
				dataType : 'json',
				data: {
					opdnum : $('#opdnum').val(),
					lastname : $('#lastname').val(),
					firstname : $('#firstname').val(),
					middlename : $('#middlename').val(),
					bdMonth : $('#bdMonth').val(),
					bdDay : $('#bdDay').val(),
					bdYear : $('#bdYear').val(),
					cs : $('#cs').val(),
					address : $('#address').val()
				},
					success : function(data){
						$('#waiting').slideUp(500);
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
						
						$("#submitSearch").removeClass().addClass("greenbutton").val("Search"); 
						if (data.error === true){
							$('#searchForm').show(500);
						}else{ (data.error === false)
							window.location.href = data.msg;
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
					$("#submitSearch").removeClass().addClass("disgbutton").val("Search"); 
				}
			
			});
			return false;
	});
});