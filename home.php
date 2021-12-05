<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BugMe</title>

    <style>
        .filter-btn{
            background-color: lightgray;
            color: black;
            border: none;
            border-radius: 5px;
            margin-left: 15px;
            margin-right: 15px;
            margin-top: 15px;
            padding-left: 30px; 
            padding-right: 30px;
        }

        .filter-btn:hover{
            background-color: darkgrey;
        }

        .filter-btn2{
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            margin-left: 15px;
            margin-right: 15px;
            padding-left: 30px; 
            padding-right: 30px;
        }

        .btn-status{
            border: none;
            border-radius: 7px; 
            padding: 5px; 
            padding-left: 10px; 
            padding-right: 10px;
        }

        .status-open{
            background-color: green; 
            color: white; border: none; 
        }

        .status-closed{
            background-color: tomato;
            color: white;
        }

        .status-in-progress{
            background-color: yellow;
            color: black;
        }

        .issue-list{
            border: solid 1px transparent;
            display: grid; 
            grid-template-columns: 4fr 1fr 1fr 1fr 1fr;
        }

        .issue-list:hover{
            border: solid 1px black;
            border-radius: 5px;
        }

        .issue-list:active{
            background-color: #f1f1f1;
        }

        .t-column{
            min-width: 150px;
        }

        .t-column-title{
            min-width: 300px;
        }

        .heading-color{
            background-color: lightgray;
        }

    </style>
</head>
<body>
    <div class="container-fluid" style="padding-bottom: 25em;">
        <!-- Title and create new button-->
        <div style="margin-bottom: 30px;">
            <h2 style="margin-bottom: 30px; display: inline-block;">Issues</h2>
            <button class="btn btn-success form-btn" id="btn-issue" style=" float: right;">Create New Issue</button>
            <script>
                $('#btn-issue').click( function(e) {e.preventDefault(); $('#content').load('newissue.php'); return false; })
            </script>
        </div>

        <!-- filter buttons-->
        <div >
            <label for="fliter">Filter by:</label>
            <div id="btn-group" name="filter" style="display: inline-block; margin-bottom: 35px;">
                <button class="filter-btn" id="filter-all">ALL</button>
                <button class="filter-btn" id="filter-open">OPEN</button>
                <button class="filter-btn" id="filter-my-tickets">MY TICKETS</button>
                
            </div>
            <script>
                

                
            </script>
        </div>

        <!-- issue list -->
        <div class="container-fluid" id="issue-window" style=" min-height: 200px; max-height: 500px; overflow: auto;">
            <div class="" id="headings" style="display: grid; grid-template-columns: 4fr 1fr 1fr 1fr 1fr;;">
                <div class="t-column-title heading-color" >Title</div>
                <div class="t-column heading-color">Type</div>
                <div class="t-column heading-color">Status</div>
                <div class="t-column heading-color">Assigned To</div>
                <div class="t-column heading-color">Created</div>    
            </div>
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

                $query = "SELECT * FROM Issues join Users on Issues.assigned_to=Users.id";
                $results = $conn->query($query);

                if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()) {
                        $number = $row['i_id'];
                        $title = $row['title'];
                        $type = $row['i_type'];
                        $status = $row['i_status'];
                        $assgn = $row['assigned_to'];
                        $name = $row['firstname'].' '.$row['lastname'];
                        $date = $row['created'];

                        $user_id = $_SESSION['id'];

                        $stat_class = '';
                        if ($status == 'OPEN'){$stat_class = 'open';}
                        else if ($status == 'CLOSED'){$stat_class = 'closed';}
                        else if ($status == 'IN PROGRESS'){$stat_class = 'in-progress';}


                        echo    "<div class='info-block' name='$status' value=$assgn>
                                    <div class='issue-list'  onclick='issueViewer($number)'>
                                        <div class='t-column-title'><span>#$number</span> <span style='color: lightskyblue;'>$title</span></div>
                                        <div class='t-column'>$type</div>
                                        <div class='t-column'><button class='btn-status status-$stat_class' id='btn-status' >$status</button></div>
                                        <div class='t-column'>$name</div>
                                        <div class='t-column'>$date</div>
                                    </div>
                                    <hr style='background-color: black; margin: 0px;'>
                                </div>";
                    }
                }
                $conn->close();
            ?>


            <script>

                btnForm = (el) => {

                [...$('#btn-group').children()].forEach((obj) => { 
                    let name = '#'+obj.attributes[1].value; /* string: '#+id' */
                    if (! $(name).hasClass('filter-btn')) {
                        $(name).removeClass('filter-btn2'); 
                        $(name).addClass('filter-btn')
                    }
                })

                el.removeClass('filter-btn'); el.addClass('filter-btn2');
                }

                $('#filter-all').click(()=>{
                    btnForm($('#filter-all'))
                    /*-----code to filter all issues-------*/
                    $('.info-block').show()
                    
                })

                $('#filter-open').click(()=>{
                    btnForm($('#filter-open'))
                    /*-----code to filter open issues-------*/ 
                    $('.info-block').hide() 
                    $('.info-block[name="OPEN"]').show() 
                })

                $('#filter-my-tickets').click(()=>{
                    btnForm($('#filter-my-tickets'))
                    /*-----code to filter all assigned issues-------*/
                    $('.info-block').hide()
                    let arg =  '.info-block[value="'+ <?php echo $_SESSION['id'] ?>  +'"]'
                    $(arg).show()

                })
                
                issueViewer = (number) =>{
                    /*code that gets the info and description from database and loads the info into details.php page*/
                    
                    $.ajax("set-issue-id.php", {
                        type: 'POST',
                        data: {
                            issue_id: number
                        }
                    })
                    $('#content').load('detail.php')

                }

            </script>

        </div>
        
    </div>
    
</body>
</html>