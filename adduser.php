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

            <form id='adduser' method='post'>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="fname">Firstname</label>
                    <input class="form-control" type="text" name="fname" id="fname" required style="max-width: 600px;">
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="lname">Lastname</label>
                    <input class="form-control" type="text" name="lname" id="lname" required style="max-width: 600px;">
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="password">Password</label>
                    <input class="form-control" type="text" name="password" id="password" required style="max-width: 600px;">
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" required style="max-width: 600px;"> 
                </div>
                
               
                <button type='submit' class="btn btn-primary form-btn" id="btn-user">Submit</button>
                <script>
                    $('#adduser').submit((e)=>{
                        /*code to create/save new users to database*/
                        e.preventDefault()

                        $.ajax("adduser-server.php", {
                            type: 'POST',
                            data: {
                                fname: $('#fname').val(), 
                                lanme: $('lname').val(),
                                password: $('#password').val(),
                                email: $('#email').val()
                            }
                        }).done((res) => {
                            alert.res()
                            $('#fname').val('')
                            $('lname').val('')
                            $('#password').val('')
                            $('#email').val('')
                        }).fail((res) => {
                            alert(res)
                        })
                    })
                </script>
            </form>
        </div>
    
</body>
</html>