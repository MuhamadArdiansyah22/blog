<?php
include_once('db/users_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $user = new User(null, $name, $email, $phone_number);
    UsersDB::create($user);
    header('Location: users.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <section class="home2" id="home2">
        <div class="home-text">
            <h2 class="">Halaman Insert Data User </h2>
        </div>
    </section>
    <div class="post-filter container">
        <span class="filter-item" data-filter="all"><a href="index.php">Dashboard</a></span>
        <span class="filter-item" data-filter="design"><a href="posts.php">Post</a></span>
        <span class="filter-item active-filter" data-filter="tech"><a href="users.php">User</a></span>
        <span class="filter-item" data-filter="mobile"><a href="abouts.php">About</a></span>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>

                    <div class="container">
                        <div class="row">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="inp_user_name" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="inp_user_name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="inp_email">Email</label>
                                    <input type="email" class="form-control" id="inp_email" name="email" />
                                </div>
                                <div class="mb-3">
                                    <label for="inp_phone_number" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="inp_phone_number" name="phone_number">
                                </div>
                                <button type="submit" class="btn btn-primary">Add New User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include('template/footer.php'); ?>