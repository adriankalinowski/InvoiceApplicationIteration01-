<?php
/*require_once("config.php");
$db=config["db"];

$conn = mysqli_connect($db["host"], $db["user"], $db["pass"]);
if($conn){
    mysqli_select_db($db["database"]);
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="print.css" type="text/css" media="print">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.html">Kali Enterprises Inc</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.html">Home</a></li>
                <li><a href="createInvoice.html">Create Invoice</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <form class="navbar-form navbar-left" action="/action_page.php">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search Invoices">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
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
