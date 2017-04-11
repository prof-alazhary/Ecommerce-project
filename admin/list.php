<?php
require_once 'nav.php';
require_once '../DBClasses/autoload.php';
session_start();
if(isset($_SESSION['loggeduser']))
{
    $user = $_SESSION['loggeduser'];
    $users = user::getAll();
    // echo "<pre>";
    // var_dump($user);
    // echo "</pre>";
}
else
{
    header('Location: ../user/login.php?error=your are not logged in');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="../js/jquery.min.js"></script>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/adminstyle.css" rel="stylesheet" type="text/css" media="all" />
    <title>list users</title>
  </head>
  <body>
    <div class="container" style="margin-top:40px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>Users List
                    <div class="pull-right action-buttons">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
              </div>
                <div class="panel-body">
                  <?php
                      foreach ($users as $user)
                      {
                        if($user->user_name!= "admin" && $user->is_deleted!=1)
                        {
                          echo "<div class='row'>";
                          echo "<div class='col-md-1' style='margin-left:30px;'>".$user->user_id."</div>";
                          echo "<div class='col-md-1'>".$user->user_name."</div>";
                          echo "<div class='col-md-1'>".$user->first_name."</div>";
                          echo "<div class='col-md-1'>".$user->last_name."</div>";
                          echo "<div class='col-md-3'>".$user->email."</div>";
                          echo "<div class='col-md-1'>".$user->job."</div>";
                          echo "<div class='col-md-1'> <a href='delete.php?id=$user->user_id' class='trash'><span class='glyphicon glyphicon-trash'></span></a></div>";
                          echo "<div class='col-md-1'> <a href='be_admin.php?id=$user->user_id' class='flag'><span class='glyphicon glyphicon-flag'></span></a></div>";
                          echo "</div>";
                        }
                      }
                   ?>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
</div>

  </body>
</html>
