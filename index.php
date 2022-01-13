<?php require_once('response.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>IP</title>
</head>
<body>
  <div class="container-fluid py-5" style="background:transparent url('https://media.istockphoto.com/vectors/abstract-vector-futuristic-blue-background-vector-id470895202') no-repeat center center /cover">
    <div class="row">
      <div class="col-lg-5 col-md-8 col-12 mx-auto">
        <div class="card rounded bg-light border p-4">
          <div class="card-body">
            <h3 class="card-title mb-3 text-center">IP Location Finder</h3>
            <?php echo $msg; ?>
            <div class="row">
            <form action="" method="POST">
            <div class="mb-3">
                <label for="ip_addr" class="form-label">Enter IP address or Hostname</label>
                <div class="row">
                  <div class="col-9 ">
                    <input type="text" class="form-control" id="ip_addr" name="ip_addr" value="<?php echo $ip_addr; ?>" required> <!-- Taking Input from User -->
                  </div>
                  <div class="col-3 ">
                    <button type="submit" name="search" class="btn btn-primary">Find</button>
                  </div>
                </div>
            </div>
            </form>
            </div>
            <div class="row">
              <?php echo $result; ?> <!-- Displaying data returned by  response.php -->
            </div>
        </div>
        
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>