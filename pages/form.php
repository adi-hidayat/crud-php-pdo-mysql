<?php

require_once '../crud/User.php';

if ($_POST) {
    if (isset($_POST['id'])) {
        $user = new User();
        $user->id = $_POST['id'];
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->phone = $_POST['phone'];
        $result = $user->update();
    } else {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
            $user = new User();
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->phone = $_POST['phone'];
            $result = $user->create();
        }
    }

    header("Location: list.php");
    exit();
}


if (isset($_GET['id'])) {
    $user = new User();
    $user = $user->get($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-md-4">
            <h1>Form User</h1>
            <form action="" method="post">
                <?php echo isset($result) ? $result : ""; ?>
                <?php if (isset($user)) { ?>
                    <input type="hidden" name="id" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>">
                <?php } ?>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo isset($user['phone']) ? $user['name'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="text" name="phone" class="form-control" placeholder="phone" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo isset($user['phone']) ? $user['phone'] : ''; ?>">
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>