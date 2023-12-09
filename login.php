<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Cineverse | Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <section class="h-100">
      <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
          <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="text-center my-5">
              <h1>‎</h1>
            </div>
            <div class="card shadow-lg">
              <div class="card-body p-5">
                <div class="text-center">
                  <img
                    src="uploads\cineverselogo.png"
                    alt="logo"
                    width="100"
                    height="50"
                  />
                </div>

                <!-- Formulir Login -->
                <form
                  action="proseslogin.php"
                  method="POST"
                  class="needs-validation"
                  novalidate=""
                  autocomplete="off"
                >
                  <div class="mb-3">
                    <label class="mb-2 text-muted" for="username"
                      >Username</label
                    >
                    <input
                      id="username"
                      type="text"
                      class="form-control"
                      name="username"
                      value=""
                      required
                      autofocus
                    />
                  </div>

                  <div class="mb-3">
                    <div class="mb-2 w-100">
                      <label class="text-muted" for="password">Password</label>
                    </div>
                    <input
                      id="password"
                      type="password"
                      class="form-control"
                      name="password"
                      required
                    />
                  </div>

                  <div class="mb-3">
                    <div class="form-check">
                      <input
                        type="checkbox"
                        name="ingat"
                        id="remember"
                        class="form-check-input"
                      />
                      <label for="ingat" class="form-check-label"
                        >Ingat Saya</label
                      >
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary ms-auto w-100">
                      Login
                    </button>
                  </div>
                </form>
              </div>
              <div class="card-footer py-3 border-0">
                <div class="text-center">
                  Belum punya akun?
                  <a href="daftar.php" class="text-dark">Daftar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
