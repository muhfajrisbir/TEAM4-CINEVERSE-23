      <?php
      session_start();
      require_once('koneksi.php');

      // Periksa apakah pengguna telah login
      if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
      }
      ?>

      <!DOCTYPE html>
      <html lang="en">

      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

        <title>Cineverse | Beranda</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
      </head>

      <style>
        .card {
          margin-left: 20px;
          margin-right: 20px;
          text-align: left;
          font-weight: bold;
        }

        .berita {
          margin-left: 20px;
          font-weight: bold;
        }
      </style>

      <body>
        <!-- Navbar Beranda -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="uploads/cineverselogo.png" width="90" height="50" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                </li>

                <li class="nav-item">
                  <a href="watchlist.php" class="nav-link active">Watchlist</a>
                </li>
              </ul>

              <!-- Username//Tombol Logout -->
              <div class="btn-group">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <a> Halo,
                    <?php echo  $_SESSION['username']; ?>👋</a>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </div>

            </div>
          </div>
          </div>
        </nav>

        <!-- Carousel/Banner Slide -->
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="uploads/image1.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="uploads/image2.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="uploads/image3.jpg" class="d-block w-100" alt="..." />
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <br>

        <div class="berita">
          <p>Berita Terbaru</p>
        </div>

        <!--card berita-->
        <div style="display: flex; justify-content: space-around;">
          <div class="card" style="width: 18rem;">
            <img src="uploads/madameweb.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Madame Web Rilis Trailer, Tampilkan Para Spider-Woman!</p>
            </div>
          </div>

          <div class="card" style="width: 18rem;">
            <img src="uploads/avangerstkd.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Tim Avengers Baru Dipastikan Hadir di The Kang Dynasty!</p>
            </div>
          </div>

          <div class="card" style="width: 18rem;">
            <img src="uploads/theboyheron.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Robert Pattinson Isi Suara The Boy and the Heron</p>
            </div>
          </div>

          <div class="card" style="width: 18rem;">
            <img src="uploads/supermanlegacy.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">David Corenswet Resmi Jadi Pemeran Utama Superman: Legacy</p>
            </div>
          </div>

          <div class="card" style="width: 18rem;">
            <img src="uploads/tira.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Serial Tira Akan Banyak Tampilkan Easter Egg Bumilangit</p>
            </div>
          </div>

        </div>
        <br>
        <br>
        <footer class="bg-dark text-center text-white py-3">
          <p>&copy; 2023 Cineverse. All rights reserved.</p>
        </footer>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>

      </html>