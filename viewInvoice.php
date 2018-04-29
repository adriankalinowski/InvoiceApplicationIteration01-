<?php
require_once('config.php');
$db= $config['dbInfo'];

$conn = mysqli_connect($db['host'], $db['user'], $db['pass']);
if($conn){
    mysqli_select_db($conn, $db['database']);
} else {
    die("Server not connected");
}
//TODO: Do i still need this?
$invoiceId = (int)$_POST['searchId'];
$result = $conn->query("SELECT paid_time FROM invoices WHERE invoice_id='$invoiceId'");

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(e){

            $('#markPaid').click(function (e) {

                $.ajax({
                    url: "markInvoicePaid.php",
                    data:{invoiceId:$(this).val()},
                    dataType:'json',
                });
                //$("#buttonForPaid").remove();
                $("#paid1").remove();
                $("#paid2").remove();
                $("#isPaid").append("<div class='row'><h2 class='mx-auto'>Invoice has been paid.</h2></div>");
            });

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
            <form class="form-inline" action="viewInvoice.php" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchId">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <br>

    <div class="row pb-2 mt-4 mb-2 border-bottom" id="isPaid">
        <div class="col-md-8 mb-3" id="paid1">

        </div>
        <div class="col-md-4 mb-3" id="paid2">
            <?php
            if(empty($result)){
                echo "INVOICE NOT FOUND";
            }
            else {
                if($row=mysqli_fetch_row($result))
                    if($row[0] == null){
                        echo "<form class=\"form-inline text-right\" method=\"post\" id=\"buttonForPaid\">" . "<button type=\"button\" class=\"btn btn-danger\" id=\"markPaid\" value=\"<?php echo $invoiceId ?>\">Mark as Paid</button>" . "</form>";
                    }
                    else {
                        echo "<div class='row'><h2 class='mx-auto'>Invoice has been paid.</h2></div>";
                    }

            }
            $result->close();
            ?>
        </div>
    </div>


    <div class="row pb-2 mt-4 mb-2 border-bottom">
        <div class="col-md-8 mb-3">
            <h2>Kali Enterprises</h2>
            42275 June Drive <br>
            Sterling Heights, MI 48314 <br>
            <b>Phone:</b> (586) 344-6945 <br>
            <b>Email:</b> kalienterpriseinc@gmail.com
        </div>
        <div class="col-md-4 mb-3">
            <h2 class="text-right">INVOICE</h2>
            <h6 class="text-right">
                <b>Invoice #:</b>
                <?php
                    echo $_POST['searchId'];
                ?>
                <br>
                <b>Date:</b>
        </div>
    </div>

    <br>
    <h3>
        Reference #:
    </h3>

    <br>

    <h4>Shipped From:</h4>


    <br><br>

    <h4>Shipped To:</h4>


    <br><br>

    <h4>Bill To:</h4>


    <br><br><br>

    <h4>
        Amount Due:
    </h4>

    <br><br>

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

<?php $conn->close(); ?>