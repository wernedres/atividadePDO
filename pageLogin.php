<?php include 'pg_connect.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="styles/login.css">
  <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">

     <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>


<div class="container ">

<div id="login">


        <div class="jumbotron">

           <h4 class="alert alert-success">M² Smart - Area Restrita</h4>
<form class="form-horizontal" role="form" action="verificar_login.php" method="post">
  
      <div class="input-group margin-bottom-sm-2 col-sm-6">
        <span class="input-group-addon"><i  class="fa fa-user"></i></span>
        <input class="form-control" name="nome" type="text" placeholder="Usuario">
      </div>

    <div class="input-group col-sm-6">
      <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
      <input class="form-control" name="senha" type="password" placeholder="Password">
    </div><br/>


<input type="submit"  class="btn btn-success" value="Acessar"/> </i>




            </div>                                      
          </div>

  </form>
  </div>
</div>
</div>
</body>

</html>




