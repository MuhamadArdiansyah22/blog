<?php
include_once('db/posts_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_url = null;

    $post_id = $_POST['post_id'];
    $post = PostsDB::get($post_id);

    if ($_FILES['image_url']['name'] != null) {
        //Jika ada, hapus cover lama
        unlink($post->getImage_url());
        //Simpan cover yang baru
        $image_upload_to = 'files/image/';
        $image_filename = $_FILES['image_url']['name'];
        $image_tmp_filename = $_FILES['image_url']['tmp_name'];
        $image_url = $image_upload_to . $image_filename;
        $imageUploaded = move_uploaded_file($image_tmp_filename, $image_url);
    }

    //Ambil data dari form
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_date = $_POST['published_date'];

    $post = new Post(
        $post_id,
        $user_id,
        $title,
        $content,
        $image_url ?? $post->getImage_url(),
        $published_date
        //Jika tidak ada image yang diupload, maka gunakan image lama
    );

    PostsDB::update($post);

    header('Location: posts.php');
} else {
    $post_id = $_GET['post_id'] ?? '';
    $post = PostsDB::get($post_id);
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
<script>
    function updateTime() {
        var today = new Date();
        var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date + ' ' + time;
        document.getElementById('published_date').value = dateTime;
        setTimeout(updateTime, 1000);
    }
</script>


<body>
    <section class="home2" id="home2">
        <div class="home-text">
            <h2 class="">Halaman Update Post</h2>
        </div>
    </section>
    <div class="post-filter container">
        <span class="filter-item" data-filter="all"><a href="index.php">Dashboard</a></span>
        <span class="filter-item active-filter" data-filter="design"><a href="posts.php">Post</a></span>
        <span class="filter-item" data-filter="tech"><a href="users.php">User</a></span>
        <span class="filter-item" data-filter="mobile"><a href="abouts.php">About</a></span>
    </div>

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 mx-auto col-lg-10 px-md-2 mt-5 ">

                <div class="py-5 bg-light">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                            <?php if (isset($post)): ?>
                                <section class="py-1 text-center container">
                                    <div class="row">
                                        <h2 class="col-lg-6 col-md-8 mt-2 mx-auto">
                                            Edit Posts
                                        </h2>
                                    </div>
                                </section>

                                <div class="container">
                                    <div class="row">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <?php
                                            include_once('db/users_db.php');
                                            $users = UsersDB::all();
                                            ?>
                                            <div class="mb-3">
                                                <label for="inp_isbn" class="form-label">User</label>
                                                <select class="form-select form-select-lg mb-3"
                                                    aria-label=".form-select-lg example" name="user_id">
                                                    <?php foreach ($users as $user): ?>
                                                        <option <?= $user->getUser_id() == $post->getUser_id() ? 'selected' : '' ?>
                                                            value="<?php echo $user->getUser_id(); ?>">
                                                            <?php echo $user->getName(); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name="post_id" value="<?= $post->getPost_id() ?>">
                                            <div class="mb-3">
                                                <label for="inp_title" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="inp_title" name="title"
                                                    value="<?= $post->getTitle() ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="inp_content" class="form-label">Content</label>
                                                <input type="text" class="form-control" id="inp_content" name="content"
                                                    value="<?= $post->getContent() ?>">
                                            </div>
                                            <div class="mb-4">
                                                <img src="<?= $post->getImage_url() ?>" class="img-thumbnail"
                                                    style="height:300px;object-fit:contain;">
                                            </div>
                                            <div class="mb-3">
                                                <label for="inp_image_url" class="form-label">Replace image</label>
                                                <input class="form-control" type="file" id="inp_image_url" name="image_url">
                                            </div>
                                            <div class="mb-3">
                                                <label for="inp_published_date" class="form-label">Date</label>
                                                <input type="datetime-local" class="form-control" id="inp_published_date"
                                                    name="published_date" value="<?= $post->getPublished_date() ?>"
                                                    onfocus="updateTime()">
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-5">Update</button>
                                        </form>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="container">
                                    <div class="row">
                                        <h2>Post not found</h2>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include_once('template/footer.php'); ?>