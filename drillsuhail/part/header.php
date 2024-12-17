<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'PT.SAR'; ?></title>
    <link rel="stylesheet" href="http://localhost/drillsuhail/bootstrap/bootstrap1/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex">
        <?php include __DIR__ . '/sidebar.php'; ?>
        <div class="col-10 offset-2">
            <nav class="nav bg-warning p-2">
                <div class="container d-flex justify-content-end p-2">
                    <a href="../logout.php" class="btn btn-dark text-light me-5">Logout</a>
                </div>
            </nav>
