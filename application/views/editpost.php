<body class="container">
<?php foreach ($post as $item) {?>
    <form action="updateBlog" method="post">
      <?php echo form_open('editpost'); ?>
      <!-- <?php echo validation_errors(); ?> -->
      <div class="form-group">

        <label for="head">Title:</label>
        <input type="text" id="head" name="head" class="form-control" value="<?php echo set_value('head', $item->title);?>">
      <?php echo form_error('head'); ?>
      </div>
      <div class="form-group">
        <label for="body">Description:</label>
        <input type="text" id="body" name="body" class="form-control" value="<?php echo set_value('body',$item->body);?>">
      </div>
      <?php echo form_error('body'); ?>
      <div class="form-group">
        <input type="hidden" name="id" class="form-control" value="<?php echo $item->id;?>">
      </div>
      <input type="submit" class="btn btn-primary" value="Update" class="form-control">
      <a href="<?php echo base_url('viewBlog'); ?>" class="btn btn-info">View Blog</a>
    </form>
<?php } ?>
  </body>
</html>
