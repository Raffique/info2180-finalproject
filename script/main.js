window.onload = () => {

		$('#content').load('home.php')
		
	
		var fullHeight = function() {
	
			$('.js-fullheight').css('height', $(window).height());
			$(window).resize(function(){
				$('.js-fullheight').css('height', $(window).height());
			});
	
		};
		fullHeight();
	
		$('#sidebarCollapse').on('click', function () {
		  $('#sidebar').toggleClass('active');
		  
		  if ($('#menu-img').attr('src') == 'images/menu.png'){$('#menu-img').attr('src', 'images/back.png')}
		  else if ($('#menu-img').attr('src') == 'images/back.png'){$('#menu-img').attr('src', 'images/menu.png')}
	    });

		$('#home').click( function(e) {e.preventDefault(); $('#content').load('home.php'); return false; })
		$('#adduser').click( function(e) {e.preventDefault(); $('#content').load('adduser.php'); return false; })
		$('#addissue').click( function(e) {e.preventDefault(); $('#content').load('newissue.php'); return false; })
		$('#poweroff').click( function(e) {e.preventDefault(); /*extra stuff before signing out*/
			window.location.replace('..'); return false; 
		})
		//$('').click( function(e) {e.preventDefault(); $('#content').load('login.php'); return false; })
}

