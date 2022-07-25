<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All antique items</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container w-75">
        <h1>List of Colleges</h1>
        <table class="table table-dark table-hover">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">College Name</th>
                <th scope="col">Occupied</th>
                <th scope="col">Availability</th>
              </tr>
            </thead>
            <tbody id="the-body">
            </tbody>
          </table>

    </div>

      <script>
        $(document).ready(function(){
            $.get('http://localhost/final_project_wt/api/colleges', function(data, status){
                let content='';
                for (let i = 0; i < data.college.length; i++) {
                content += "<tr><th scope='row'>"+(i+1)+"</th><td>"+data.college[i].collegeName+"</td><td>"+data.college[i].occupied+"</td><td>"+data.college[i].availability+"</td></tr>";
            }
            $('#the-body').html(content);
            });
        });
      </script>
</body>
</html>