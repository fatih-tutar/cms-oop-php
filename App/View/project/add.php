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
            <h1 class="m-0">Project Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= _link('') ?>">Discovery</a></li>
              <li class="breadcrumb-item"><a href="<?= _link('customer') ?>">Projects</a></li>
              <li class="breadcrumb-item active">Add Project</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
        <form id="customer" role="form">
            <div class="card-body">
                <div class="form-group">
                  <label for="customer_id">Select a customer</label>
                  <input type="text" class="form-control" id="customer_id">
                </div>
                <div class="form-group">
                  <label for="title">Project Title</label>
                  <input type="text" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="description">Project Description</label>
                    <textarea class="form-control" id="description"></textarea>
                </div>
                <div class="form-group">
                  <label for="start_date">Start Date</label>
                  <input type="text" class="form-control" id="start_date">
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="text" class="form-control" id="end_date">
                </div>
                <div class="form-group">
                    <label for="progress">Progress</label>
                    <input type="text" class="form-control" id="progress">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status">
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
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js" integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= assets('js/adminlte.min.js') ?>"></script>
<script>
  const customer = document.getElementById('customer');
  customer.addEventListener('submit', (e) => {
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value;
    let progress = document.getElementById('progress').value;
    let status = document.getElementById('status').value;
    let customer_id = document.getElementById('customer_id').value;
    let start_date = document.getElementById('start_date').value;
    let end_date = document.getElementById('end_date').value;
  
    let formData = new FormData();

    formData.append('title', title);
    formData.append('description', description);
    formData.append('progress', progress);
    formData.append('status', status);
    formData.append('customer_id', customer_id);
    formData.append('start_date', start_date);
    formData.append('end_date', end_date);

    axios.post('<?= _link('project/add') ?>', formData)
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