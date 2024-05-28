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
    <div class="container">
        <h1>Add Multiple Rows in database</h1>
        <a href="index.php" class="btn btn-success mb-3">View Items</a>
        <div id = "msg">
            <!-- display message -->
        </div>
       <form action="" id="frm">
       
        <div class="items">
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label for="" class="form-label fw-bold ">Item Name</label>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="" class="form-label fw-bold ">Rate</label>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="" class="form-label fw-bold ">Stock</label>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-3">
                    <input
                        type="text" required
                        class="form-control"
                        name="item_name[]"
                    />
                </div>
                <div class="mb-3 col-md-3">
                    <input
                        type="number" min="1"
                        class="form-control"
                        name="rate[]" required
                    />
                </div>
                <div class="mb-3 col-md-3">
                    <input
                        type="number" min="1"
                        class="form-control"
                        name="stock[]" required
                    />
                </div>
                <div class="mb-3 col-md-3">
                    <button
                        type="button" id ="addMore"
                        class="btn btn-primary" title="add more row">
                        +
                    </button>
                </div>
            </div>
        </div>
        <button
            type="submit"
            class="btn btn-primary">
            Submit
        </button>
        
       </form> 
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).on("click","#addMore", function(e){
            e.preventDefault();
            $(".items").append(`<div class="row addlRow">
                <div class="mb-3 col-md-3">
                    <input
                        type="text" required
                        class="form-control"
                        name="item_name[]"
                    />
                </div>
                <div class="mb-3 col-md-3">
                    <input
                        type="number" min="1"
                        class="form-control"
                        name="rate[]" required
                    />
                </div>
                <div class="mb-3 col-md-3">
                    <input
                        type="number" min="1"
                        class="form-control"
                        name="stock[]" required
                    />
                </div>
                <div class="mb-3 col-md-3">
                    <button
                        type="button" id ="remove"
                        class="btn btn-danger" title="remove">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>`);
        });
    </script>

    <script>
        $(document).on("click","#remove",function(e){
            e.preventDefault();
            $(this).parent().parent().remove();
        });
    </script>

    <script>
       $(document).on("submit","#frm", function(e){
        e.preventDefault();
        $.ajax({
            type:"post",
            url:"create_items.php",
            data:$(this).serialize(),
            success:function(response){
                if (response=="success"){
                    var str = '<div class="alert alert-success">Rows inserted successfully</div>';
                    $(".addlRow").remove();
                    $("#frm")[0].reset();
                }
                else{
                    var str = '<div class="alert alert-danger">'+response+'</div>';
                }
                $("#msg").html(str);
            }

        });
       });
    </script>
</body>
</html>
