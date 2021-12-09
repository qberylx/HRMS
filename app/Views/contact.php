<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 Form Validation Example</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
    <?php
                if (\Config\Services::validation()->hasError('name')) {
                    echo '<div class="alert alert-danger" role="alert">'.$validation->getError('name').'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button></div>';
                }
             ?>
    <div class="row">
      <div class="col-md-9">
        <form action="<?php echo site_url('test/create') ?>" method="post" accept-charset="utf-8">
 
          <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
             
          </div> 
 
          <div class="form-group">
            <label for="email">Email Id</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
             
          </div>   
 
          <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control"></textarea>
             
          </div>
 
          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
 
    </div>
  
</div>
</body>
</html>