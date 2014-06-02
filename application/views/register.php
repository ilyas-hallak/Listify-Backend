<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Simple Login with CodeIgniter</title>
    <link rel="stylesheet" type="text/css" href="<? echo base_url();?>css/bootstrap/bootstrap2.min.css">
</head>
<body>
<div class="container">

    <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px">
                    <?=anchor("/login", "Anmelden")?>

                </div>
            </div>

            <div class="panel-body" >
                <?php echo validation_errors('<p class="alert alert-danger alert-dismissable">'); ?>
                <?php
                    if(isset($error)) {
                        echo "<p class='alert alert-danger alert-dismissable'>$error</p>";
                    }
                ?>
                <?=form_open('login/registration', array("id" => "signupform", "class"=>"form-horizontal", "role"=>"form"))?>
                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <?=form_input(array("name" => "email", "class"=>"form-control", "id" => "email", "placeholder" => "Email Adresse"))?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Passwort</label>
                        <div class="col-md-9">
                            <?=form_password(array("name" => "password", "class"=>"form-control", "id" => "password", "placeholder" => "Passwort"))?>
                        </div>
                    </div>

                    <div class="form-group">
                        <br>
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Registrieren</button>
                            <span style="margin-left:8px;">oder</span>
                        </div>
                    </div>

                    <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">

                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-fbsignup" type="submit" class="btn btn-primary"><i class="icon-facebook"></i>Mit Facebook Anmelden</button>
                        </div>

                    </div>



                </form>
            </div>
        </div>




    </div>
</div>

</body>
</html>

