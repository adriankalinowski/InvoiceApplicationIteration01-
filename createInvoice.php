<?php
require_once("config.php");
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
$stmt->bind_param("ssssd",$_POST['FromCity'],$_POST['FromState'],$_POST['ToCity'],$_POST['ToState'],$_POST['Amount']);
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

$stmt->close();*/
$conn->close();
?>

<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<?php
echo $_POST['amount'];
?>
</body>
</html>
