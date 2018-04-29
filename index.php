<?php
require_once('config.php');
$db= $config['dbInfo'];

$conn = mysqli_connect($db['host'], $db['user'], $db['pass']);
if($conn){
    mysqli_select_db($conn, $db['database']);
} else {
    die("Server not connected");
}
?>

<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(e){

            $("#tblDatatr:has(td)").mouseover(function(e) {
                $(this).css("cursor", "pointer");
            });
            //
            /*$("#tblDatatr:has(tr):has(td)").click(function(e) {
                var clickedCell= $(e.target).closest("td");
                $("#something").html(clickedCell.text());
                $(location).attr('href','createInvoice.html');
            });*/

            $('#tblDatatr').DataTable( {
                "order": [[ 3, "desc" ]],
                stateSave: true,
                columnDefs: [ {
                    targets: [ 0 ],
                    orderData: [ 0, 1 ]
                }, {
                    targets: [ 1 ],
                    orderData: [ 1, 0 ]
                }, {
                    targets: [ 4 ],
                    orderData: [ 4, 0 ]
                } ]
                /*columnDefs: [ {
                    targets: [ 0 ],
                    orderData: [ 0, 1 ]
                }, {
                    targets: [ 1 ],
                    orderData: [ 1, 0 ]
                }, {
                    targets: [ 4 ],
                    orderData: [ 4, 0 ]
                } ]*/
            } );
        });

    </script>
</head>
<body>
<br>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Kali Enterprises Inc</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse show" id="navbarColor02" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createInvoice.html">Create Invoice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page 3</a>
                </li>
            </ul>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <br><br>
    <h2 class="text-center">Invoices</h2>
    <table class="table table-hover" id="tblDatatr">
        <thead>
        <tr>
            <th>Invoice</th>
            <th>Reference</th>
            <th>Shipped From</th>
            <th>Shipped To</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Paid</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM invoices ORDER BY invoice_id DESC";

        if ($result = $conn->query($query)) {

            while ($row = $result->fetch_array()) {
                $date = date_create($row['creation_time']);

                echo "<tr><td>";
                echo sprintf("%'.05d\n", $row['invoice_id']);
                echo "</td><td>";
                echo $row['reference_number'];
                echo "</td><td>";
                echo $row['shipped_from_city'] . ", " . $row['shipped_from_state'];
                echo "</td><td>";
                echo $row['shipped_to_city'] . ", " . $row['shipped_to_state'];
                echo "</td><td>";
                echo $row['amount'];
                echo "</td><td>";
                echo date_format($date, 'm-d-Y');
                echo "</td><td>";
                $id = settype(row['invoice_id'],"string");
                echo "<buttontype=\"button\" class=\"btn btn-primary\" value=$id>Paid</button>";
                echo "</td></tr>";

            }
            $result->close();
        }
        ?>
        <!--<tr>
            <td>0001</td>
            <td>TQL</td>
            <td>$1,200</td>
            <td>4/5/2018</td>
        </tr>
        <tr class="warning">
            <td>0002</td>
            <td>PLS</td>
            <td>$1,000</td>
            <td>3/7/2018</td>
        </tr>
        <tr class="table-danger">
            <td>0003</td>
            <td>Broker Logistics</td>
            <td>$2,000</td>
            <td>2/1/2018</td>
        </tr>
        <tr>
            <td>0004</td>
            <td>Broker Logistics</td>
            <td>$2,000</td>
            <td>2/1/2018</td>
        </tr>-->
        </tbody>
    </table>
    <p id="something"></p>
</div>
</body>
</html>
