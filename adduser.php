<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
        <div class="container-fluid" style=" padding-bottom:25em;">

            <h2 style="margin-bottom:30px;">New User</h2>

            <form action="">
                <div class="form-group">
                    <label for="fname">Firstname</label>
                    <input class="form-control" type="text" name="fname" id="fname" required style="max-width: 600px;">
                </div>
                <div class="form-group">
                    <label for="lname">Lastname</label>
                    <input class="form-control" type="text" name="lname" id="lname" required style="max-width: 600px;">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="text" name="password" id="password" required style="max-width: 600px;">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" required style="max-width: 600px;"> 
                </div>
                
               
                <button class="btn btn-primary form-btn" id="btn-user">Submit</button>
                <script>
                    $('#btn-user').click(()=>{
                        /*code to create/save new users to database*/
                    })
                </script>
            </form>
        </div>
    
</body>
</html>