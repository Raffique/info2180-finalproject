<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container-fluid" style="padding-bottom: 25em;">
        <h2 style="margin-bottom: 30px;">Create Issue</h2>
        <form id='issue-form' method='post'>
        
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="title">Title</label>
                <input class="form-control" type="" name="title" id="title" required style="max-width: 600px;">
            </div>
            

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="desc">Description</label>
                <textarea class="form-control" name="desc" id="desc" required style="max-width: 600px; padding-bottom: 100px;"></textarea>
            </div>
            

            <div class="row" style="margin-bottom: 20px;">
                <label for="assgn">Assigned To</label>
                <select class="custom-select form-select" name="assgn" id="assgn" required style="max-width: 600px;">
                    <script>
                        //populate select with options of user names and their id's should be the s=assigned value
                    </script>
                    <?php

                        $host = 'localhost';
                        $username = 'root';
                        $password = '';
                        $dbname = 'bugme';

                        // Create connection
                        $conn = new mysqli($host, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        } 

                        $query = "SELECT id, firstname, lastname FROM Users";
                        $options = $conn->query($query);

                        if ($options->num_rows > 0){
                            while ($row = $options->fetch_assoc()){
                                $id = $row['id'];
                                $fn = $row['firstname'];
                                $ln = $row['lastname'];
                                echo "<option value = $id> $fn $ln </option>";
                            }
                        }
                        

                    ?>
                </select>
            </div>
            

            <div class="row" style="margin-bottom: 20px;">
                <label for="type">Type</label>
                <select class="custom-select form-select" name="type" id="type" required style="max-width: 600px;">
                    <option value="Bug">Bug</option>
                    <option value="Proposal">Proposal</option>
                    <option value="Task">Task</option>
                </select>
            </div>
            

            <div class="row" style="margin-bottom: 20px;">
                <label for="priority">Priority</label>
                <select class="custom-select form-select" name="priority" id="priority" required style="max-width: 600px;">
                    <option value="Minor">Minor</option>
                    <option value="Major">Major</option>
                    <option value="Critical">Critical</option>
                </select>
            </div>
            
        
            <button class="btn btn-primary form-btn" id="btn-issue">Submit</button>
            
        </form>
    </div>
</body>
<script>
    $('#issue-form').submit((e)=>{
        /*code to create/save new issue to database*/
        e.preventDefault()

            $.ajax("newissue-server.php", {
                type: 'POST',
                data: {
                    title: $('#title').val(), 
                    desc: $('#desc').val(),
                    assgn: $('#assgn').val(),
                    type: $('#type').val(),
                    priority: $('#priority').val()
                }
            }).done((res) => {
                alert(res)
                $('#title').val(''), 
                $('#desc').val(''),
                $('#assgn').val(''),
                $('#type').val(''),
                $('#priority').val('')
            }).fail((res) => {
                alert(res)
            })
    })
</script>
</html>