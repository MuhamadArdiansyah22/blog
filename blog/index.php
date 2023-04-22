<?php
include_once('db/posts_db.php');

$posts = PostsDB::all();
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
  <section class="home" id="home">
    <div class="home-text container">
      <h2 class="home title">Welcome To Blog Website</h2>
      <span class="home-subtitle">Di web ini berisi postingan dari user yang dapat kita lihat dan baca.. semoga web ini
        bermanfaat</span>
    </div>
  </section>
  <div class="post-filter container">
    <span class="filter-item active-filter" data-filter="all">Dashboard</span>
    <span class="filter-item" data-filter="design"><a href="posts.php">Post</a></span>
    <span class="filter-item" data-filter="tech"><a href="users.php">User</a></span>
    <span class="filter-item" data-filter="mobile"><a href="about.php">About</a></span>
  </div>

  <div class="container-fluid">
    <div class="row">
      <main class="col-md-9 mx-auto col-lg-10 px-md-2 mt-5 ">

        <div class="py-5 bg-light">
          <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


              <?php foreach ($posts as $post): ?>
                <!-- Card Component -->
                <div class="col-md-4">
                  <div class="card text-start">
                    <img class="card-img-top" src="<?= $post->getImage_url() ?>" style="height:400px;object-fit:contain;"
                      alt="Gambar">
                    <div class="card-body">
                      <h4 class="card-title">
                        <?= $post->getTitle() ?>
                      </h4>
                      <?php
                      include_once('db/users_db.php');

                      $userId = $post->getuser_id();
                      $userName = UsersDB::get($userId)->getName();
                      ?>
                      <p class="card-text">
                        <?= $userName ?>
                      </p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a class="btn btn-outline-primary btn-block"
                            href="viewer.php?post_id=<?= $post->getPost_id() ?>">
                            Selengkapnya...
                          </a>
                        </div>
                        <small class="text-muted">
                          <?= $post->getPublished_date() ?>
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of Card Component -->
              <?php endforeach; ?>

            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <!--footer-->
  <div class="footer d-flex justify-content-center">
    <p>&#169; 2023 ❤️</p>
  </div>


  <!--Jquery link-->

  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>

  <script src="js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"
    integrity="sha512-ml/QKfG3+Yes6TwOzQb7aCNtJF4PUyha6R3w8pSTo/VJSywl7ZreYvvtUso7fKevpsI+pYVVwnu82YO0q3V6eg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>