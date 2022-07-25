<?php
session_start();
if (isset($_SESSION['userId']))
    header("Location: index.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <title>Profile</title>
</head>

<body>
    <div class="container-md">
        <h1>Personal details information</h1>
        <table class="table-patient table">
            <tbody class="table-body">
                <!-- to be insert by script -->

            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "http://localhost/covid19/api/users/" + <?php echo json_encode($_SESSION['userId']); ?>,
                dataType: "json",
                success: function(data, status, xhr) {
                    // var obj = JSON.parse(data);
                    console.log(data);
                    var html = "";
                    if (xhr.status == 200) {

                        html += "<tr>";
                        html += "<th scope='col'>ID</th>";
                        html += "<td scope='row'>" + data.patient.id + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Name</th>";
                        html += "<td>" + data.patient.name + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Phone</th>";
                        html += "<td>" + data.patient.phoneNo + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Address</th>";
                        html += "<td>" + data.patient.address + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Emergency contact</th>";
                        html += "<td>" + data.patient.emergencyContact + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Status</th>";
                        html += "<td>" + data.patient.status + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Admission date</th>";
                        html += "<td>" + data.patient.admissionDateTime + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Discharge date</th>";
                        html += "<td>" + data.patient.dischargeDateTime + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>ICU admission date</th>";
                        html += "<td>" + data.patient.ICUDateTime + "</td>";
                        html += "</tr><tr>";
                        html += " <th scope='col'>Clinical death date</th>";
                        html += "<td>" + data.patient.deathDateTime + "</td>";
                        // html += "<td><button class='btn btn-primary btn-update' data-id='" + data.patient[i].id + "'>Update</button> ";
                        html += "</tr>";

                    } else {
                        html += "<tr>";
                        html += "<td scope='row'>No data</td>";
                        html += "</tr>";
                    }
                    $(".table-body").html(html);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                },
            });
        });
    </script>
</body>

</html>