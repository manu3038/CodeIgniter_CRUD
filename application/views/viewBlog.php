<body class="container"><h2>Posts of my blog:</h2>
<!-- the view blog page getting data from controller and displaying the same -->
  <a href="<?php echo base_url(); ?>" class="btn btn-info">Return</a>
  <br>
  <div class="row">
    <div class="col-md">

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
</head>
