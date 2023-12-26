<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= assets('plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= assets('css/adminlte.min.css') ?>">
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
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
    <table class="table table-bordered">
      <thead>                  
        <tr>
          <th>Customers</th>
          <th>Projects</th>
          <th style="width: 40px">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data['customers'] as $key => $value): ?>
        <tr id="row_<?= $value['id'] ?>">
          <td><?= $value['name'].' '.$value['surname'] ?></td>
          <td>
            <div class="progress progress-xs">
              <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
            </div>
          </td>
          <td>
            <div class="btn-group btn-group-sm">
              <button onclick="removeCustomer('<?= $value['id'] ?>')" class="btn btn-sm btn-danger">Delete</button>
              <a href="<?= _link('customer/edit/'.$value['id']) ?>" class="btn btn-sm btn-secondary">Edit</a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
  <?= $data['footer']; ?>
</div>
<script src="<?= assets('plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= assets('js/adminlte.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js" integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  function removeCustomer(id){
    let customer_id = id;
    let formData = new FormData();
    formData.append('customer_id', customer_id);
    axios.post('<?= _link('customer/delete') ?>', formData)
      .then(res => {
        if(res.data.redirect){
            document.getElementById('row_'+res.data.deleted).remove();
            window.location.href = res.data.redirect;
        }
        Swal.fire(
            res.data.title,
            res.data.msg,
            res.data.status
        );
      }).catch((err) => { console.log(err); })
  }
</script>
</body>
</html>