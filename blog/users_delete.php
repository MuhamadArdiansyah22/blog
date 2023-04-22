<?php
include('templates/header.php');
include_once('db/users_db.php');

// Kita tambahkan null coalescing operator untuk menghindari error
$user_id = $_GET['user_id'] ?? '';
$user = UsersDB::get($user_id);

if (isset($user)) {
    UsersDB::delete($user_id);
    header('Location: users.php');
}
?>

<?php if (!isset($user)): ?>

    <section class="py-1 text-center container">
        <div class="row">
            <h2 class="col-lg-6 col-md-8 mt-2 mx-auto">
                user Not Found
            </h2>
            <a name="" id="" class="btn btn-primary" href="users.php">Back</a>
        </div>
    </section>

<?php endif; ?>

<?php include('templates/footer.php'); ?>