<?php
require_once '../crud/User.php';
$user = new User();
$users = $user->get();

if (isset($_GET['delete'])) {
    $user = new User();
    $deleted = $user->delete($_GET['delete']);

    if ($deleted) {
        header('Location: list.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <h2>Data Users</h2>
            <a class="btn btn-primary" href="form.php">Add User</a>
            <hr>
            <table class="table table-border" id="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['phone']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                                <a href="form.php?id=<?php echo $user['id']; ?>" class="btn btn-success">Edit</a>
                                <a href="?delete=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
<script src="//code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script>
    new DataTable('#users-table');
</script>
</html>