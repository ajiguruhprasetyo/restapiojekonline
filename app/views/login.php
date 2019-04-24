<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?=base_url()?>asset/css/matrix-login.css" />
        <link href="<?=base_url()?>asset/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="post">
				<div class="control-group normal_text"> <h3><img src="<?=base_url()?>images/logo.png" alt="Logo" /></h3></div>
                <?php if(validation_errors() || isset($alert)){ ?> 
                <div class="alert alert-error">
                  <button class="close" data-dismiss="alert">×</button>
                  <?php if(isset($alert)){echo $alert;} echo validation_errors(); ?> 
                </div>
                <?php } ?>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Username" name="username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><button type="submit" href="" class="btn btn-success" > Login</button></span>
                </div>
            </form>
        </div>
        
        <script src="<?=base_url()?>asset/js/jquery.min.js"></script>  
        <script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>asset/js/matrix.login.js"></script> 
        <script src="<?=base_url()?>asset/js/matrix.popover.js"></script>
    </body>

</html>
