<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>BugMe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  <script src="script/jquery-3.6.0.js"></script>

  <meta name="robots" content="noindex, follow">

  </head>



  <body>

    <header>
      <div style="background-color: black; padding: 10px;">
        <span style="color: white; font-weight: bold;"> <img src="images/bug.png" alt="BUG"> BugMe Issue Tracker</span>
      </div>
    </header>

    <div class="wrapper d-flex align-items-stretch">


      <nav id="sidebar" class="" style="display: none;">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn-menu">
            <img id="menu-img" src="images/back.png" alt="">
          </button>
        </div>
        
        
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="#" id="home"><span> <img src="images/home.png" alt=""> Home</span></a>
          </li>
          <li>
            <a href="#" id="adduser"><span> <img src="images/adduser.png" alt=""> Add User</span></a>
          </li>
          <li>
            <a href="#" id="addissue"><span> <img src="images/add.png" alt=""> New Issue</span></a>
          </li>
          <li>
            <a href="logout.php" id="poweroff"><span> <img src="images/poweroff.png" alt=""> Logout</span></a>
          </li>
        </ul>
      </nav>

      <main class="container-fluid">
        <div id="content" class="p-4 p-md-5 pt-5 d-flex justify-content-center align-items-center">
          <!--content gets loaded here-->
        </div>
      </main>

    </div>

  </body>

  <script>
    window.onload = () => 
        $('#content').load('login.php')
      
    
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

      $('#home').click( function(e) {
        e.preventDefault() 
        $('#content').load('home.php')
      })

      $('#adduser').click( function(e) {
        e.preventDefault()
        let privilege = "<?php echo $_SESSION['privilege']?>";
        if(privilege == 'admin'){

          $('#content').load('adduser.php')
        }
        else {

          alert('Only Administrator has Access!')
        } 
      })
      
      $('#addissue').click( function(e) {
        e.preventDefault() 
        $('#content').load('newissue.php') })
      
      $('#poweroff').click( function(e) {
        e.preventDefault()
        $('#content').load('login.php')
      })
  </script>
</html>