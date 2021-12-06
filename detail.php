<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container-fluid" id="detail-content" style="padding-bottom: 25em;">

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

            $issue_id = $_SESSION['issue-id'];
            $user_id = $_SESSION['id'];

            $title = '';
            $desc = '';
            $assgn_name = '';
            $creator_name = '';
            $type = '';
            $priority = '';
            $status = '';
            $created = '';
            $updated = NULL;

            $issue_id_string = strval($issue_id);
            $query1 = "SELECT * FROM Issues where i_id=$issue_id_string";

            $query2 = "SELECT c.firstname as c_fn, 
                                c.lastname as c_ln, 
                                a.firstname as a_fn, 
                                a.lastname as a_ln 
                                from Issues i 
                                join Users c on i.created_by=c.id 
                                join Users a on i.assigned_to=a.id
                                where i.i_id = $issue_id_string";
                                
            $result1 = $conn->query($query1);
            if($result1->num_rows > 0){
                while($row1 = $result1->fetch_assoc()){

                    //we have a $issue_id up above remember that
                    $title = $row1['title'];
                    $desc = $row1['i_description'];
                    $type = $row1['i_type'];
                    $priority = $row1['i_priority'];
                    $status = $row1['i_status'];
                    $created = $row1['created'];
                    $updated = $row1['updated'];
                }
            }
        

            $result2 = $conn->query($query2);
            if($result2->num_rows > 0){
                while($row2 = $result2->fetch_assoc()){

                    $assgn_fn = $row2['a_fn'];
                    $assgn_ln = $row2['a_ln'];
                    $assgn_name =  $assgn_fn .' '.$assgn_ln;

                    $creator_fn = $row2['c_fn'];
                    $creator_ln = $row2['c_ln'];
                    $creator_name = $creator_fn.' '.$creator_ln;
                }
            }

            $notes = "";
            if(is_null($updated)){
                $notes = "<span><strong> > </strong></span> <span class='detail-notes'>Issue created on $created by $creator_name</span><br>";
            }
            else{
                $notes = "<span><strong> > </strong></span> <span class='detail-notes'>Issue created on $created by $creator_name</span><br>".
                    "<span><strong> > </strong></span> <span class='detail-notes'>Last updated on $updated</span><br>";
            }

            echo "  <h1>$title</h1>
                    <span><strong>Issue #$issue_id</strong></span>

                    <div class='container-fluid' style=' overflow: hidden;'>

                        <!--details-->
                        <div class='details'>
                            
                            <div>
                                <p>
                                    $desc
                                </p>
                            </div>

                            <div>
                                $notes
                            </div>

                        </div>

                        <!-- section -->
                        <div class='section-container'>

                            <div class='section-details' >
                                

                                <div>
                                    <span><strong>Assigned To:</strong></span> 
                                    <br>
                                    <span>$assgn_name</span>
                                </div>
                                
                                <div>
                                    <span><strong>Type:</strong></span>
                                    <br> 
                                    <span>$type</span>
                                </div>
                                
                                <div>
                                    <span><strong>Priority:</strong></span>
                                    <br> 
                                    <span>$priority</span>
                                </div>
                                
                                <div>
                                    <span><strong>Status:</strong></span>
                                    <br> 
                                    <span>$status</span>
                                </div>
                                

                            </div>

                            <button id='closer' class='btn btn-primary detail-btn'>Mark as Closed</button>
                            <br>
                            <button id='progressor' class='btn btn-success detail-btn'>Mark In Progress</button>

                        </div>

                    </div>";
            $conn->close();
        ?>
    </div>
</body>
<script>
    $('#closer').click((e)=>{
        e.preventDefault()
        console.log('close')
        $.ajax("change-status.php", {
            type: 'POST',
            data: {
                status: 'CLOSED'
            }
        }).done((res) => {
            alert(res)
            $('#content').load('detail.php')

        }).fail((res) => {
            alert(res)
        })
    })

    $('#progressor').click((e)=>{
        e.preventDefault()
        console.log('progress')
        $.ajax("change-status.php", {
            type: 'POST',
            data: {
                status: 'IN PROGRESS'
            }
        }).done((res) => {
            alert(res)
            $('#content').load('detail.php')

        }).fail((res) => {
            alert(res)
        })
    })
</script>
</html>