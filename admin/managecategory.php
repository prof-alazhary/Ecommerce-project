<?php
require_once '../DBClasses/autoload.php';

$categories = CategoryClass::getAllCategories();
$products = ProductClass::getAllProducts();
// echo "<pre>";
// var_dump($categories);
// echo "</pre>";
session_start();
if(isset($_SESSION['loggeduser']))
{
    $user = $_SESSION['loggeduser'];
    // $users = user::getAll();
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
    <title>Category</title>
  </head>
  <body>
    <div class="container" style="margin-top:40px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-plus"></span><a href="insertCat.php" style='color:white'>Add new Category</a>
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
                      	foreach ($categories as $category)
                          {
                						if($category->parent === null)
                            {
                              echo "<div class='row' style='margin-top:10px;'>";
                              echo "<div class='col-md-2' style='margin-left:5%;'>$category->cat_name</div>";
                              echo "<div class='col-md-2'> <a href='updateCat.php?cat_id=$category->cat_id' class='edit'>Update <span class='glyphicon glyphicon-edit'></span></a></div>";
                              echo "<div class='col-md-2'> <a href='deleteCat.php?cat_id=$category->cat_id' class='trash'>Delete <span class='glyphicon glyphicon-trash'></span></a></div>";
                              echo "<div class='col-md-2'> <a href='insertProd.php?cat_id=$category->cat_id' class='plus'>Insert Product <span class='glyphicon glyphicon-plus'></span></a></div>";
                              echo "<div class='col-md-3'> <a href='insertSubCat.php?cat_id=$category->cat_id' class='plus'>Insert Subcategory <span class='glyphicon glyphicon-plus'></span></a></div>";
                              echo "</div>";
                            }
                					}
                				?>
                </div>
                <div class="panel-footer" style="margin-top:10px;">

                </div>
            </div>
        </div>
    </div>
</div>

  </body>
</html>
