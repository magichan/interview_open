<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Flat UI - Free Bootstrap Framework and Theme</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">


    　　
    <link href="http://apps.bdimg.com/libs/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">

    <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.0.3/js/bootstrap.min.js"></script>






    <script>
      $(document).ready(function(){
        $("#button_log_in").click(function(){

          var id = $("#student_id").val();

          $.post("./php_code/regist.php",
              {
                studentid:id
              },
              function(data,status){
                alert("数据：" + data + "\n状态：" + status);
              });

        });
      });

    </script>

  </head>
  <body>
  <div class="row demo-row">
    <div class="col-xs-12">
      <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand">请签到，等待</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-01">


        </div><!-- /.navbar-collapse -->
      </nav><!-- /navbar -->
    </div>
  </div>
<div class="container">
  <div class="col-lg-3">
    <div class="login-form">
      <div class="form-group" >
        <input type="text" class="form-control login-field" value="" placeholder="输入学号" id="student_id">
        <label class="login-field-icon fui-user" for="login-name"></label>
      </div>
      <a class="btn btn-primary btn-lg btn-block" id="button_log_in" >Log in</a>

     </div>
  </div>
  <div class="col-lg-7">
    <table class="table table-hover">
      <thead>
      <tr>
        <th>名字</th>
        <th>学号</th>
        <th>方向</th>
        <th>状态</th>
      </tr>
      </thead>
      <tbody>
     <?php include_once("./php_code/output_show_jobs.php");?>

      </tbody>
    </table>


  </div>
</body>


</html>
