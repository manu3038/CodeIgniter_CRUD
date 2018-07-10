<!DOCTYPE html>

  <body class="container">
    <h1 class="text-center">This is my blog</h1>
    <form action="<?php echo base_url('saveBlog'); ?>" method="post">

       <?php echo form_open('blog'); ?>

      <div class="form-group">
        <label for="head">Title:</label>
        <input type="text" id="head" name="head" class="form-control" value="<?=set_value('head'); ?>">
      </div><?php echo form_error('head'); ?>
      <div class="form-group">
        <label for="body">Description:</label>
        <textarea rows="3"type="text" id="body" name="body" class="form-control"><?=set_value('body');?></textarea>
      </div><?php echo form_error('body'); ?>
      <input type="submit" class="btn btn-primary" value="Submit">
    </form>
    <br>
    <a href="<?php echo base_url('viewBlog');?>" class="btn btn-info">View BLog</a>
  </body>
</html>
