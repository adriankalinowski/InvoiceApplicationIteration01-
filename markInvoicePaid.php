<?php
require_once('config.php');
$db= $config['dbInfo'];

$conn = mysqli_connect($db['host'], $db['user'], $db['pass']);
if($conn){
    mysqli_select_db($conn, $db['database']);
} else {
    die("Server not connected");
}
$invoiceId = $_GET['invoiceId'];
$query = "SELECT paid_time FROM invoices WHERE invoice_id='$invoiceId'";

if($result = $conn->query($query)){
    $row = mysqli_fetch_row($result);
    if($row[0] == null){
        $sql = "UPDATE invoices SET paid_time = CURRENT_TIMESTAMP WHERE invoice_id=?";
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("i", $invoiceId);
        $stmt->execute();
        $stmt->close();
    }
    $result->close();
}
$conn->close();

header('Content-Type: application/json; charset=utf-8');
exit;
?>