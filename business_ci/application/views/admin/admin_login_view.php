<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login Form</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/login_assets/css/styles.css" />
    </head>
    <body>
        <div id="formContainer">
            <form id="login" method="post" action="<?php echo base_url(); ?>admin/admin_login_check">
                <a href="#" id="flipToRecover" class="flipLink">Forgot?</a>
                <input type="text" name="admin_email" id="loginEmail" placeholder="Email"/>
                <input type="password" name="admin_password" id="loginPass" placeholder="Password" />
                <input type="submit" name="btn" value="Login" />   
            </form>
        </div>
        <p style="text-align: center"> <a href="<?php echo base_url(); ?>admin/admin_registration">Create new account</a></p>
        <footer>
        </footer>
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    </body>
</html>


