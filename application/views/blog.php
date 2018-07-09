<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <title>My blog</title>
  </head>
  <body class="container">
    <h1 class="text-center">This is my blog</h1>
    <form action="<?php echo base_url('saveBlog'); ?>" method="post">

       <?php echo form_open('blog'); ?>
      <div class="form-group">
        <label for="head">Title:</label>
        <input type="text" id="head" name="head" class="form-control" value="<?=$this->input->post('head');?>">
      </div><?php echo form_error('head'); ?>
      <div class="form-group">
        <label for="body">Description:</label>
        <textarea rows="3"type="text" id="body" name="body" class="form-control"><?=$this->input->post('body'); ?></textarea>
      </div><?php echo form_error('body'); ?>
      <input type="submit" class="btn btn-primary" value="Submit">
      <input type="reset" class="btn btn-danger" value="Reset">
    </form>
    <h2>Reading data from DB:</h2>
    <div class="row"><div class="col-md">

    <table class="table table-bordered table-striped">
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Edit/Delete</th>
      </tr>
      <?php foreach($posts as $post) { ?>
        <tr>
          <td><?php echo $post->title; ?></td>
          <td><?php echo $post->body; ?></td>
          <td>
          <a class="btn btn-sm btn-primary" href='<?php echo base_url('editBlog?id=').$post->id;?>'>Edit</a>
          <a class="btn btn-sm btn-danger" href='<?php echo base_url('deleteBlog?id=').$post->id;?>'>Delete</a>
        </tr>
    <?php  } ?>
  </table>
</div>
</div>
  </body>
</html>
