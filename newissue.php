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
        <form id='newissue' method='post'>
        
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

                        try {
                            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
                        }
                        catch (Exception $e){
                            die($e->getMessage());
                        }

                        $query = "SELECT id, firstname, lastname FROM Users";
                        try{
                            $statement = $conn->query($query);
                            $results = $statement->fetch(PDO::FETCH_ASSOC);

                    }
                        catch (PDOException $e){
                            echo "Error! " . $e->getMessage() . "<br/>";
                            die();
                        }

                        for ( $i = 0; $i < count($results); $i++) {
                            echo "<option value = $results[$i]['id']>$results[$i]['firstname'] $results[$i]['lastname'] </option>";
                        }

                    ?>
                </select>
            </div>
            

            <div class="row" style="margin-bottom: 20px;">
                <label for="type">Type</label>
                <select class="custom-select form-select" name="type" id="type" required style="max-width: 600px;">
                    <option value="bug">Bug</option>
                    <option value="proposal">Proposal</option>
                    <option value="task">Task</option>
                </select>
            </div>
            

            <div class="row" style="margin-bottom: 20px;">
                <label for="priority">Priority</label>
                <select class="custom-select form-select" name="priority" id="priority" required style="max-width: 600px;">
                    <option value="minor">Minor</option>
                    <option value="major">Major</option>
                    <option value="critical">Critical</option>
                </select>
            </div>
            
        
            <button class="btn btn-primary form-btn" id="btn-issue">Submit</button>
            <script>
                $('#newissue').submit((e)=>{
                    /*code to create/save new issue to database*/
                    e.preventDefault()

                        $.ajax("newissue-server.php", {
                            type: 'POST',
                            data: {
                                title: $('#title').val(), 
                                desc: $('desc').val(),
                                assgn: $('#assgn').val(),
                                type: $('type').val(),
                                priority: $('priority').val()
                            }
                        }).done((res) => {
                            alert.res()
                            $('#title').val(''), 
                            $('desc').val(''),
                            $('#assgn').val(''),
                            $('type').val(''),
                            $('priority').val('')
                        }).fail((res) => {
                            alert(res)
                        })
                })
            </script>
        </form>
    </div>

    
    
    
</body>
</html>