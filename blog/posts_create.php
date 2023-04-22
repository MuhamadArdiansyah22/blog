<?php
include_once('db/posts_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_url = null;

    //Folder tujuan untuk menyimpan image dan ebook yang diupload
    $image_upload_to = 'files/image/';
    //Ambil nama file image dan ebook yang diupload
    $image_filename = $_FILES['image_url']['name'];

    //Mengambil nama file temp image dan ebook
    $image_tmp_filename = $_FILES['image_url']['tmp_name'];
    //Direktori + Nama File image dan Ebook
    $image_url = $image_upload_to . $image_filename;

    $imageUploaded = move_uploaded_file($image_tmp_filename, $image_url);


    if ($imageUploaded) {
        $user_id = $_POST['user_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $published_date = $_POST['published_date'];

        $post = new Post(
            null,
            $user_id,
            $title,
            $content,
            $image_url,
            $published_date
        );

        PostsDB::create($post);

        header('Location: posts.php');
    } else {
        echo '<div class="alert alert-danger mt-5" role="alert">
                Error: Failed to upload image or Post
              </div>';
    }
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
            <h2 class="">Halaman Insert Post</h2>
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
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>

                        <section class="py-1 text-center container">
                            <div class="row">
                                <h2 class="col-lg-6 col-md-8 mt-2 mx-auto">
                                    Posts
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
                                                <option value="<?php echo $user->getUser_id(); ?>">
                                                    <?php echo $user->getName(); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inp_title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="inp_title" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inp_content" class="form-label">Content</label>
                                        <textarea class="form-control" id="inp_content" name="content"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inp_image_url" class="form-label">Upload image</label>
                                        <input class="form-control" type="file" id="inp_image_url" name="image_url">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inp_published_date" class="form-label">Published Date</label>
                                        <input class="form-control" type="datetime-local" id="inp_published_date"
                                            name="published_date">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add New Post</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    <?php include('template/footer.php'); ?>