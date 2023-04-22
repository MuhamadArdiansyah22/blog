<?php
include_once('db/users_db.php');

$users = UsersDB::all();
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
            <h2 class="">Halaman Data User </h2>
        </div>
    </section>
    <div class="post-filter container">
        <span class="filter-item" data-filter="all"><a href="index.php">Dashboard</a></span>
        <span class="filter-item" data-filter="design"><a href="posts.php">Post</a></span>
        <span class="filter-item active-filter" data-filter="tech"><a href="users.php">User</a></span>
        <span class="filter-item" data-filter="mobile"><a href="about.php">About</a></span>
    </div>

    <div class="container-fluid mt-4">
        <div class="row">

            <div class="py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>

                    <section class="py-1 text-center container">
                        <div class="row">
                            <h2 class="col-lg-6 col-md-8 mt-2 mx-auto">
                                User
                            </h2>
                            <div class="col-lg-6 col-md-8 mx-auto mt-2">
                                <a class="btn btn-primary" href="/blog/users_create.php"><i class="bx bx-plus"> Tambah
                                        User</i></a>
                            </div>
                        </div>
                    </section>

                    <div class="py-5 bg-light">
                        <div class="container">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-striped table-lg">
                                        <thead>
                                            <tr>
                                                <th scope="col">#ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $user): ?>
                                                <tr>
                                                    <td>
                                                        <?= $user->getUser_id() ?>
                                                    </td>
                                                    <td>
                                                        <?= $user->getName() ?>
                                                    </td>
                                                    <td>
                                                        <?= $user->getEmail() ?>
                                                    </td>
                                                    <td>
                                                        <?= $user->getPhone_number() ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="users_update.php?user_id=<?= $user->getUser_id() ?>"><i
                                                                class='bx bxs-edit-alt'> Edit</i></a>
                                                        <a class="btn btn-danger"
                                                            href="users_delete.php?user_id=<?= $user->getuser_id() ?>"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class='bx bxs-trash'> Hapus</i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('template/footer.php'); ?>