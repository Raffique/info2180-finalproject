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
        <form action="#">
        
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="" name="title" id="title" required style="max-width: 600px;">
            </div>
            

            <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" name="desc" id="desc" required style="max-width: 600px; padding-bottom: 100px;"></textarea>
            </div>
            
            <style>
                .form-select{
                    width: 100%; 
                    max-width: 600px; 
                    margin-left: 11px; 
                    margin-bottom: 25px;
                }
            </style>

            <div class="row">
                <label for="assgn">Assigned To</label>
                <select class="custom-select form-select" name="assgn" id="assgn" required>
                    
                </select>
            </div>
            

            <div class="row">
                <label for="type">Type</label>
                <select class="custom-select form-select" name="type" id="type" required>
                    <option value="">Bug</option>
                    <option value="">Proposal</option>
                    <option value="">Task</option>
                </select>
            </div>
            

            <div class="row">
                <label for="priority">Priority</label>
                <select class="custom-select form-select" name="priority" id="priority" required>
                    <option value="">Minor</option>
                    <option value="">Major</option>
                    <option value="">Critical</option>
                </select>
            </div>
            
        
            <button class="btn btn-primary form-btn" id="btn-issue">Submit</button>
            <script>
                $('#btn-issue').click(()=>{
                    /*code to create/save new issue to database*/
                })
            </script>
        </form>
    </div>

    
    
    
</body>
</html>