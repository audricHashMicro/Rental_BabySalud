<!DOCTYPE html>
<html lang='en'>

<head>
    <title>Admin | Items</title>
    <?php echo $style; ?>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
</head>

<body class="adminPage">
    <div class="row" style="margin-top: 100px;">
        <div class="col-md-12"><?php echo $crud['output']; ?></div>
    </div>
    <?php echo $script; ?>

</body>

</html>