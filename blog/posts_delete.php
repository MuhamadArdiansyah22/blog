<?php
include('templates/header.php');
include_once('db/posts_db.php');

// Kita tambahkan null coalescing operator untuk menghindari error
$post_id = $_GET['post_id'] ?? '';
$post = PostsDB::get($post_id);

if (isset($post)) {
    unlink($post->getImage_url()); //Hapus File Cover
    PostsDB::delete($post_id);

    header('Location: posts.php');
}
?>

<?php if (!isset($post)): ?>

    <section class="py-1 text-center container">
        <div class="row">
            <h2 class="col-lg-6 col-md-8 mt-2 mx-auto">
                post Not Found
            </h2>
            <a class="btn btn-primary" href="posts.php">Back</a>
        </div>
    </section>

<?php endif; ?>

<?php include('templates/footer.php'); ?>