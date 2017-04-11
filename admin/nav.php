<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
     <script src="../js/jquery.min.js"></script>
 <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
     <title>admin</title>
    <style>
    body { padding-top:20px; }
  .panel-body .btn:not(.btn-block) { width:120px;margin-bottom:10px; }    </style>
  </head>
  <body>
    <div class="container" style="margin-top:100px;margin-left:30%;font-size:20px" >
    <div class="row">
        <div class="col-md-5">
            <!-- It can be fixed with bootstrap affix http://getbootstrap.com/javascript/#affix-->
            <div id="sidebar" class="well sidebar-nav">
                <h4><i class="glyphicon glyphicon-home"></i>
                    <b>MANAGEMENT</b>
                </h4>
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="managecategory.php">Manage Category</a></li>
                  <li><a href="manageProd.php">Manage Product</a></li>
                </ul>
                <h4><i class="glyphicon glyphicon-user"></i>
                  <b>USERS</b>
                </h4>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="list.php">List</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>

  </body>
</html>
