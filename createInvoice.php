<?php
require_once('config.php');
$db= $config['dbInfo'];

$conn = mysqli_connect($db['host'], $db['user'], $db['pass']);
if($conn){
    mysqli_select_db($conn, $db['database']);
} else {
    die("Server not connected");
}

/*
$sql = "INSERT INTO Invoices (shipped_from_city, shipped_from_state, shipped_to_city, shipped_to_state, amount) VALUES (?,?,?,?,?)";

$stmt = mysqli_prepare($sql);
$stmt->bind_param("ssssd",$_POST['fromCity'],$_POST['fromState'],$_POST['toCity'],$_POST['toState'],$_POST['amount']);
$stmt->execute();

$invoiceId = mysqli_insert_id($conn);
$stmt->close();

if($_POST['broker'] == 'Add New'){
    $sql = "INSERT INTO Broker (company_name, address, city, state, zip_code, email, bill_via_email) VALUES (?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($sql);
    $stmt->bind_param("ssssisb"/*TODO: Add broker variables*//*);
    $stmt->execute();

    $brokerId = mysqli_insert_id($conn);
    $stmt->close();
}

$sql = "INSERT INTO Invoice_Broker (invoice_id, broker_id) VALUES(?,?)";
$stmt = mysqli_prepare($sql);
$stmt->bind_param("ii",$invoiceId, $brokerId);
$stmt->execute();

$stmt->close();
$conn->close();*/
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
    <script>
        $(document).ready(function(e){

        });

    </script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="home.html">Kali Enterprises Inc</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse show" id="navbarColor02" style="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
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


        <div class="page-header">
            <div class="pull-left">
                <h2>Kali Enterprises</h2>
                <h6>
                    42275 June Drive <br>
                    Sterling Heights, MI 48314
                </h6>
                <h6>
                    Phone: (586) 344-6945 <br>
                    Email: kalienterpriseinc@gmail.com
                </h6>
            </div>
            <div class="pull-right">
                <h2 class="text-right">INVOICE</h2>
                <h6 class="text-right">
                    Invoice #:
                    <?php
                        echo "####"
                    ?>
                    <br>
                    Date:
                    <?php
                        echo "##/##/####"
                    ?>
                </h6>
                <h6 class="text-right"></h6>
            </div>
            <div class="clearfix"></div>
        </div>

        <h4>
            Reference #:
            <?php
                echo $_POST['reference'];
            ?>
        </h4>

        <br>

        <h4>Shipped From:</h4>
        <?php
            echo $_POST['fromCity'] . ", " . $_POST['fromState'];
        ?>

        <br><br>

        <h4>Shipped To:</h4>
        <?php
            echo $_POST['toCity'] . ", " . $_POST['toState'];
        ?>

        <br><br>

        <h4>
            Amount Due:
            <?php
                echo "$" . $_POST['amount'];
            ?>
        </h4>

        <br><br><br>

        <h4>Remit Payment To:</h4>
        <p>
            Kali Enterprises Inc <br>
            42275 June Drive <br>
            Sterling Heights, MI 48314 <br>
        </p>

        <div class="panel-footer">
            <h5 class="text-center">Thank you for your business!</h5>
        </div>

    </div>
</body>
</html>
