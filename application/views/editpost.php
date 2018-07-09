<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  </head>
  <body class="container">
<?php foreach ($post as $item) {?>
    <form action="updateBlog" method="post">
      <div class="form-group">
        <label for="head">Title:</label>
        <input type="text" id="head" name="head" class="form-control" value="<?php echo $item->title;?>"required>
      </div>
      <div class="form-group">
        <label for="body">Description:</label>
        <input type="text" id="body" name="body" class="form-control" value="<?php echo $item->body;?>"required>
      </div>
      <div class="form-group">
        <label for="id">ID:</label>
        <input type="text" name="id" class="form-control" value="<?php echo $item->id;?>" readonly>
      </div>
      <input type="submit" class="btn btn-primary" value="Update" class="form-control">
    </form>
<?php } ?>
  </body>
</html>
