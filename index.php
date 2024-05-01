<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Add Multiple Rows in database</title>
</head>
<body>
<?php
include "cfg/dbconnect.php";
$sql ="select * from items";
$stmt =$conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>
    <div class="container">
        <h1>Items List</h1>
        <a href="add_more.php" class="btn btn-success mb-3">Add Items</a>
        <div
            class="table-responsive">
            <table
                class="table table-bodered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows>0){ 
                        foreach($result as $row){ ?>
                        <tr class="">
                        <td scope="row"><?=$row['id']?></td>
                        <td><?=$row['item_name']?></td>
                        <td><?=$row['rate']?></td>
                        <td><?=$row['stock']?></td>
                    </tr>
                   <?php }
                    }
                    else{ ?>
                        <tr>
                            <td colspan="4">No Items found</td>
                        </tr>
                   <?php } ?>
                </tbody>
            </table>
        </div>
        
    </div>
</body>
</html>