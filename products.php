<?php
$hostName = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'kyla';
$link = mysqli_connect($hostName, $user, $pass, $dbName);
if (!$link) {
    die('There was an error while connecting to database');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
    img {
        width: 100% !important;
        height: 100px !important;
        object-fit: contain
    }

    h3 {
        text-align: center;
        white-space: nowrap
    }

    h6 {
        text-align: center
    }
    .imgA{
        width: 200px;
        height: 200px !important;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM `items`";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['id'] ." ". $row['item_name'] ." ". $row['item_image'] ." ". $row['item_price']."<br>";
                    ?>
                    <div class="col-md-3 text-center mt-5">
                        <img src="./img/<?php echo $row['item_image'] ?>" >
                        <h3><?php echo $row['item_name'] ?></h3>
                        <h6>Price: <?php echo $row['item_price'] ?></h6>
                        <div class="form-group">
                            <label>Select list:</label>
                            <select class="form-control" id="quantity<?php echo $row['id'] ?>">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <input type="hidden" id="item_name<?php echo $row['id'] ?>"
                                value='<?php echo $row['item_name'] ?>'>
                            <input type="hidden" id="item_price<?php echo $row['id'] ?>"
                                value='<?php echo $row['item_price'] ?>'>

                            <button class='btn btn-danger add' data-id="<?php echo $row['id'] ?>">Add to Cart</button>

                        </div>

                    </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-4">
                <h3 class='text-center'>Cart</h3>
                <div id="displayCheckout">
                    <?php
                    if (!empty($_SESSION['cart'])) {
                        $outputTable = '';
                        $total = 0;
                        $outputTable .= "<table class='table table-bordered'><thead><tr><td>Name</td><td>Price</td><td>Quantity</td><td>Action</td> </tr></thead>";
                        
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $outputTable .= "<tr><td>" . $value['p_name'] . "</td><td>" . ($value['p_price'] * $value['p_quantity']) . "</td><td>" . $value['p_quantity'] . "</td><td><button id=" . $value['p_id'] . " class='btn btn-danger delete'>Delete</button></td></tr>";
                            $total = $total + ($value['p_price'] * $value['p_quantity']);
                        }
                        $outputTable .= "</table>";
                        $outputTable .= "<div class='text-center'><b>Total: " . $total . "</b></div>";
                        echo $outputTable;
                    }
                    ?>

                </div>
                <button class='btn btn-danger add' onclick="window.location='./checkout.php';">Proceed to Checkout</button>
            </div>
            <div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        alldeleteBtn = document.querySelectorAll('.delete')
        alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click', deleteINsession)
        })
        function deleteINsession() {
            removable_id = this.id;
            $.ajax({
                url: 'cart.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    id_to_remove: removable_id,
                    action: 'remove'
                },
                success: function(data) {
                    $('#displayCheckout').html(data);
                    alldeleteBtn = document.querySelectorAll('.delete')
                    alldeleteBtn.forEach(onebyone => {
                        onebyone.addEventListener('click', deleteINsession)
                    })
                }
            }).fail(function(xhr, textStatus, errorThrown) {
                alert(xhr.responseText);
            });

        }

        $('.add').click(function() {
            id = $(this).data('id');
            item_name = $('#item_name' + id).val();
            item_price = $('#item_price' + id).val();
            quantity = $('#quantity' + id).val();
            $.ajax({
                url: 'cart.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    cart_id: id,
                    cart_name: item_name,
                    cart_price: item_price,
                    cart_quantity: quantity,
                    action: 'add'
                },
                success: function(data) {
                    $('#displayCheckout').html(data);
                    alldeleteBtn = document.querySelectorAll('.delete')
                    alldeleteBtn.forEach(onebyone => {
                        onebyone.addEventListener('click', deleteINsession)
                    })
                }
            }).fail(function(xhr, textStatus, errorThrown) {
                alert(xhr.responseText);
            });

        })
    })
    </script>

</body>

</html>


<?php


mysqli_close($link);


?>