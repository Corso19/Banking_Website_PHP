<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Edit Product</h2>
        <form action="update.php" method="POST">
            <div class="form-group">
                <label>Product Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $values['title'] ?>">
            </div>
            <div class="form-group">
                <label>Value:</label>
                <input type="number" class="form-control" name="price" value="<?php echo $values['value'] ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $values['id'] ?>">
            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
        </form>
    </div>

</body>

</html>