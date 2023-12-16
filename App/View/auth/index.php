<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= assets('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= assets('plugins/sweetalert2/sweetalert2.min.css') ?>">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="javascript:void(0)"><b>CMS</b>Project</a>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <form id="login">
            <div class="input-group mb-3">
              <input id="email" type="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input id="password" type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="<?= assets('plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= assets('plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js" integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= assets('js/adminlte.min.js') ?>"></script>
    <script>
      const login = document.getElementById('login');
      login.addEventListener('submit', (e) => {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        
        let formData = new FormData();

        formData.append('email', email);
        formData.append('password', password);

        axios.post('<?= _link('login') ?>', formData)
          .then(res => {
            console.log(res);
            Swal.fire(
              res.data.title,
              res.data.msg,
              res.data.status
            );
          })
          .catch((err) => { console.log(err); })

        e.preventDefault();
      });
    </script>
  </body>
</html>