<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>Register Page
    <!-- CSS Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  </head>
  <body class="login-page bg-body-secondary">
    <div class="login-box mx-auto" style="max-width: 400px; margin-top: 50px;">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="/index2.html" class="link-dark text-decoration-none">
            <h1 class="mb-0"><b>Register</b>Form</h1>
          </a>
        </div>
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="{{ route('register_proses') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-people"></i></span>
                <div class="form-floating flex-grow-1">
                  <input id="loginName" name="name" type="text" class="form-control" placeholder="Name" required />
                  <label for="loginName">Name</label>
                </div>
              </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bi bi-envelope"></i></span>
              <div class="form-floating flex-grow-1">
                <input id="loginEmail" name="email" type="email" class="form-control" placeholder="Email" required />
                <label for="loginEmail">Email</label>
              </div>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <div class="form-floating flex-grow-1">
                <input id="loginPassword" name="password" type="password" class="form-control" placeholder="Password" required />
                <label for="loginPassword">Password</label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-8">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="flexCheckDefault" />
                  <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                  </label>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary w-100">Register</button>
              </div>
            </div>
          </form>

          {{-- <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-primary w-100 mb-2">
              <i class="bi bi-facebook me-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-danger w-100">
              <i class="bi bi-google me-2"></i> Sign in using Google+
            </a>
          </div> --}}
        </div>
      </div>
    </div>

    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
