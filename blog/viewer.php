<?php
include_once('db/connection.php');
include_once('db/posts_db.php');

$post_id = $_GET['post_id'];
$post = PostsDB::get($post_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!--post-->
    <section class="post-header">
        <div class="header-content post-container">
            <!--back-->
            <a href="index.php" class="back-home"> Back To Home</a>
            <h1 class="header-title" style="color: white;">
                <?php echo $post->getTitle() ?>
            </h1>
            <img src="<?php echo $post->getImage_url() ?>" alt="" class="header-img border border-5 border-info-subtle">
        </div>
    </section>
    </section>
    <section class="post-content post-container">
        <h1 class=" fw-bold">
            <?php echo $post->getTitle() ?>
        </h1>
        <p class="post-text">
            <?php echo $post->getContent() ?>
        </p>
    </section>
    <!--share-->
    <div class="share post-container">
        <a href="index.php" class="back-home text-center"> Back To Home</a>
        <span class="share-title">share article</span>
        <div class="social">
            <a href="https://web.facebook.com/"><i class='bx bxl-facebook'></i></a>
            <a href="https://twitter.com/"><i class='bx bxl-twitter'></i></a>
            <a href="https://instagram.com/"><i class='bx bxl-instagram'></i></a>
            <a href="https://linkedin.com/"><i class='bx bxl-linkedin'></i></a>
        </div>
    </div>
</body>

<?php
include_once('template/footer.php')
    ?>

</html>