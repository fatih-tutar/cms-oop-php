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
<body class="hold-transition sidebar-mini">
<div class="wrapper">  
  <?= $data['navbar']; ?>
  <?= $data['sidebar']; ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customer Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= _link('') ?>">Discovery</a></li>
              <li class="breadcrumb-item"><a href="<?= _link('customer') ?>">Customers</a></li>
              <li class="breadcrumb-item active">Add Customer</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
        <form id="customer" role="form">
            <div class="card-body">
                <div class="form-group">
                    <label for="customer_name">Name</label>
                    <input type="text" class="form-control" id="customer_name">
                </div>
                <div class="form-group">
                    <label for="customer_surname">Surname</label>
                    <input type="text" class="form-control" id="customer_surname">
                </div>
                <div class="form-group">
                    <label for="customer_company">Company</label>
                    <input type="text" class="form-control" id="customer_company">
                </div>
                <div class="form-group">
                    <label for="customer_phone">Phone</label>
                    <input type="text" class="form-control" id="customer_phone">
                </div>
                <div class="form-group">
                    <label for="customer_gsm">GSM</label>
                    <input type="text" class="form-control" id="customer_gsm">
                </div>
                <div class="form-group">
                    <label for="customer_email">E-mail</label>
                    <input type="text" class="form-control" id="customer_email">
                </div>
                <div class="form-group">
                    <label for="customer_address">Address</label>
                    <textarea class="form-control" id="customer_address"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </div>
  <?= $data['footer']; ?>
</div>
<script src="<?= assets('plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= assets('js/adminlte.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js" integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= assets('js/adminlte.min.js') ?>"></script>
<script>
    const customer = document.getElementById('customer');
    customer.addEventListener('submit', (e) => {
    let customer_name = document.getElementById('customer_name').value;
    let customer_surname = document.getElementById('customer_surname').value;
    let customer_company = document.getElementById('customer_company').value;
    let customer_phone = document.getElementById('customer_phone').value;
    let customer_gsm = document.getElementById('customer_gsm').value;
    let customer_email = document.getElementById('customer_email').value;
    let customer_address = document.getElementById('customer_address').value;
    
    let formData = new FormData();

    formData.append('customer_name', customer_name);
    formData.append('customer_surname', customer_surname);
    formData.append('customer_company', customer_company);
    formData.append('customer_phone', customer_phone);
    formData.append('customer_gsm', customer_gsm);
    formData.append('customer_email', customer_email);
    formData.append('customer_address', customer_address);

    axios.post('<?= _link('customer/add') ?>', formData)
        .then(res => {
        if(res.data.redirect){
            window.location.href = res.data.redirect;
        }
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