<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-10
 * Time: 下午7:21
 */
include_once('output.php');


?>

<!DOCTYPE html>
<!-- saved from url=(0065)http://docs.bootcss.com/bootstrap-2.3.2/docs/examples/fluid.html# -->
<html lang="en">
<?php do_html_header("面试表") ?>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="./Bootstrap, from Twitter_files/Bootstrap, from Twitter.html"><?php// echo $_SESSION['valid_user']?>  Interview</a>

            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <a href="./Bootstrap, from Twitter_files/Bootstrap, from Twitter.html"
                       class="navbar-link">Exit</a>
                </p>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="well sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#" name="marksheet"><h5>面试</h5></a></li>
                    <li><a href="#"><h5>查看</h5></a></li>
                    <li><a href="#"><h5>管理</h5></a></li>
                    <li><a href="#"><h5>通知</h5></a></li>             
                </ul>

            </div>
            <!--/.well -->
        </div>
        <!--/span-->
        <div class="col-md-9  well">
                 <form class="form-group" name="marksheet" role="form" id="Form1" action="#" method="post" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
                            <fieldset>
                                <legend>面试评分</legend>
                               <div class="form-group" id="numcheck">
                                  <label class="col-sm-2 control-label" for="ATT_1" >面试态度：</label>
                                  <div class="col-sm-4">
                                     <input class="form-control input-lg " id="ATT_1" type="text" placeholder="请输入0-10分" name="att1" />
                                  </div>
                                  <label class="col-sm-2 control-label" for="ATT_2">团队态度：</label>
                                  <div class="col-sm-4">
                                     <input class="form-control" id="ATT_2" type="text" placeholder="请输入0-10分"  name="att2"/>
                                  </div>
                                  <label class="col-sm-2 control-label" for="ATT_3">人生态度：</label>
                                  <div class="col-sm-4">
                                     <input class="form-control" id="ATT_3" type="text" placeholder="请输入0-10分"  name="att3"/>
                                  </div>
                                  <label class="col-sm-2 control-label" for="KNOW_1">基础知识：</label>
                                  <div class="col-sm-4">
                                     <input class="form-control" id="KNOW_1" type="text" placeholder="请输入0-10分"  name="know1"/>
                                  </div>
                                  <label class="col-sm-2 control-label" for="KNOW_2">方向知识：</label>
                                  <div class="col-sm-4">
                                     <input class="form-control" id="KNOW_2" type="text" placeholder="请输入0-10分"  name="know2" />
                                  </div>
                               </div>
                            </fieldset> 
                            <hr>
                            <fieldset>
                                <legend>评价：</legend>
                                    <textarea class="form-control" rows="5" id="COMMENT" name="comment" ></textarea>
                                 <!-- <input class="form-control" id="COMMENT" type="textarea" rows="3" placeholder="请输入对被面试者的评价"/> -->
                            </fieldset>
                            <input type="submit" class="btn btn-info mybtn"  value="提交">
                            <input type="reset"  class="btn btn-info mybtn"   value="重置">
                            <a href="#showRule">点击查看评分规则</a>
                 </form>

            </div>
            <!-- end of right part -->
        </div>
    <!--/row-->
        <h1></h1>
        <div class="col-md-12  rule">
            <a name="showRule">           
            <img src="pic.png" width="70%" height="70%">
            </a>
            
        </div>
  <!-- end of container -->
  
    <a href="#marksheet" id="back">返回评分表</a>
    <hr>
    <hr>
    <footer>
        <p>© Company 2013</p>
    </footer>

</div>
<!--/.fluid-container-->


                <script type="text/javascript">

                /*表单验证*/
                    function InputCheck(marksheet)
                    {
                      if (marksheet.att1.value == "")
                      {
                        alert("面试态度分数未录入!");
                        marksheet.att1.value.focus();
                        return (false);
                      }
                      if (marksheet.att2.value == "")
                      {
                        alert("团队态度分数未录入!");
                        marksheet.att2.value.focus();
                        return (false);
                      }
                      if (marksheet.att3.value == "")
                      {
                        alert("人生态度分数未录入!");
                        marksheet.att3.value.focus();
                        return (false);
                      }
                      if (marksheet.know1.value == "")
                      {
                        alert("基础知识分数未录入!");
                        marksheet.know1.value.focus();
                        return (false);
                      }
                      if (marksheet.know2.value == "")
                      {
                        alert("方向知识分数未录入!");
                        marksheet.know2.value.focus();
                        return (false);
                      }
                      if (marksheet.group1.value > 10 || marksheet.group1.value < 0)
                      {
                        alert("请输入0-10分");
                        RegForm.password.focus();
                        return (false);
                      }

                      var oInput = document.getElementById("numcheck").getElementsByTagName('input');
                        for ( var i = 0 ; i < oInput.length;i++ )
                        {
                            if (parseFloat(oInput[i].value) < 0 || parseFloat(oInput[i].value) > 10) {
                                alert("输入为非法值，请输入0-10分");
                            };
                        }
                     }
    
 
                        </script>

  

</body>
<div></div>
<div></div>
</html>
