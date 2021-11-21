<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script/jquery-3.6.0.js"></script>
    

    <title>BugMe</title>
</head>
<body>

    <header>
        <div style="background-color: black; padding: 10px;">
          <span style="color: white; font-weight: bold;"> <img src="images/bug.png" alt="BUG"> BugMe Issue Tracker</span>
        </div>
    </header>

    <main class="container-fluid">
        <div class="p-4 p-md-5 pt-5 d-flex justify-content-center align-items-center">
            <div class="" style="border: solid 5px gray; border-radius: 20px; padding: 50px; background-color:#dddddd;">
                <div class="container-fluid ">

                    <h2 style="padding-bottom:20px;"> Login</h2>

                    
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        
                        <button class="btn btn-primary form-btn" id="sign-in" onclick="signIn()">Login</button>
                    
                </div>
            </div>
        </div>
    </main>
 
</body>
<script>
        

        fullHeight = () => {
            
            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function(){
                $('.js-fullheight').css('height', $(window).height());
            });

        };
        fullHeight();

        signIn = () =>{

            /*this code is just for testing should be deleted eventually*/
            if ($('#email').val() == 'admin@admin.com' && $('#password').val() == '1234'){
                window.location.replace('base.php')
            }
            else{
                window.alert('Invalid!')
            }

            /*this is to be used for final production rather than the above for testing*/
            
        }
    </script>
</html>