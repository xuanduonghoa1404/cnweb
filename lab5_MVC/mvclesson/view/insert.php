<?php
require '../model/users.php';
session_start();
$usertb = isset($_SESSION['usertbl0']) ? unserialize($_SESSION['usertbl0']) : new users();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="../libs/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 550px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Add User</h2>
                        <a href="../" class="btn btn-success pull-right">Home</a>
                    </div>
                    <p>Please fill this form and submit to add users record in the database.</p>
                    <form action="../index.php?act=add" method="post">
                        <div class="form-group <?php echo (!empty($usertb->username_msg)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $usertb->username; ?>" , required>
                            <span class="help-block"><?php echo $usertb->username_msg; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($usertb->password_msg)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input name="password" class="form-control" value="<?php echo $usertb->password; ?>" , required>
                            <span class="help-block"><?php echo $usertb->password_msg; ?></span>
                        </div>
                        <input type="submit" name="addbtn" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>