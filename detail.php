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

        <script>

            detailViewer = (number, title, description, assgn, type, priority, status, history) =>{ 
                // the dates varibale should be a list containing json objects that contain info history when the issue was made/modified in the fomrat: 
                //json obj: {status: 'OPEN', date: '2021-12-11', time: '12:56 PM', assgn: 'Raffique Muir'}
                // this is used in the section below the description to show a timeline hostory of the issue being credted or modified

                
                var notes = ``
                history.forEach(el => {
                    if (el.key == 'OPEN'){
                        notes += `<span><strong> > </strong></span> <span class="detail-notes">Issue created on ${el.date} at ${el.time} by ${el.assgn}</span><br>`
                    }
                    else if (el.key == 'IN PROGRESS'){
                        notes += `<span><strong> > </strong></span> <span class="detail-notes">Last updated on ${el.date} at ${el.time}</span><br>`
                    }
                    else if (el.key == 'CLOSED'){
                        notes += `<span><strong> > </strong></span> <span class="detail-notes">Issue closed on ${el.date} at ${el.time}</span><br>`
                    }
                })

                var html = `
                <h1>${title}</h1>
                <span><strong>Issue #${number}</strong></span>

                <div class="container-fluid" style=" overflow: hidden;">

                    <!--details-->
                    <div class="details">
                        
                        <div>
                            <p>
                                ${description}
                            </p>
                        </div>

                        <div>
                            ${notes}
                        </div>

                    </div>

                    <!-- section -->
                    <div class="section-container">

                        <div class="section-details" >
                            

                            <div>
                                <span><strong>Assigned To:</strong></span> 
                                <br>
                                <span>${assgn}</span>
                            </div>
                            
                            <div>
                                <span><strong>Type:</strong></span>
                                <br> 
                                <span>${type}</span>
                            </div>
                            
                            <div>
                                <span><strong>Priority:</strong></span>
                                <br> 
                                <span>${priority}</span>
                            </div>
                            
                            <div>
                                <span><strong>Status:</strong></span>
                                <br> 
                                <span>${status}</span>
                            </div>
                            

                        </div>

                        <button class="btn btn-primary detail-btn">Mark as Closed</button>
                        <br>
                        <button class="btn btn-success detail-btn">Mark In Progress</button>

                    </div>

                </div>
                `;

                $('#detail-content').html(html)
            }

            //example of using function
            var a = {status: 'OPEN', date: '2021-11-01', time: '10:00 AM', assgn: 'Raffique Muir'}
            var b = {status: 'IN PROGRESS', date: '20201-11-02', time: '12:00 PM', assgn: 'Raffique Muir'}
            var c = {status: 'CLOSED', date: '2021-11-12', time: '11:30 AM', assgn: 'Raffique Muir'}
            var historyline = [a,b,c]
            var info = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat quo tenetur magni ex laboriosam temporibus. Nostrum ullam blanditiis, voluptas aut sapiente obcaecati. Quaerat libero minima beatae dolorum quam placeat debitis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, obcaecati temporibus. Dolorem adipisci animi fuga nobis, odio aspernatur mollitia eaque id sint! Magni velit cumque quos inventore blanditiis nobis amet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate maiores quos ut adipisci necessitatibus quibusdam libero autem ab inventore ex nobis ad similique, nihil sed aliquid! Eos totam voluptatibus impedit.'

            detailViewer(001, 'Lets create a New GUI', info, 'Raffique Muir', 'Proposal', 'Major', 'OPEN', historyline)

        </script>

        
        
       



    </div>
</body>
</html>