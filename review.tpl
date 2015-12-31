
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>鹿山逐梦者表白墙</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background:url(img/img8.gif);">

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand " href="JavaScript:void(0);" id="updatereview">刷新评论</a>
        </div>
      </div>
    </div>
	<div class="page-header text-center title font">
	  <h1>表白墙<small>鹿山逐梦者</small></h1>
	</div>
    <div class="container">


      <div class="starter-template bodybg">

		<ul class="nav nav-tabs font" id="myTab2">
		  <li><a href="index.php" class="alert-link">表白墙</a></li>
		  <li class="active"><a href="#login-setting" data-toggle="tab">评论列表</a></li>
		</ul>

		<div class="tab-content text-left">
		  <div class="tab-pane fade in active" id="login-setting">
			{louzhu}
			<form action="" method="post" class="clearmp">
			  
			  <div class="input-group widthb">
				<textarea type="text" class="form-control widthb" name="content" id="content" value="" placeholder="在这里写上你的评论内容"></textarea>
				<span class="sphelp font" id="havenum">还可以输入520字。</span>
			  </div>

			  <div class="text-center">
				<input type="button" class="btn btn-primary font" id="submit" value="发布评论">
			  </div>
			</form>
			 <div class="progress progress-striped active clearmp " id="jindutiao">
  <div class="progress-bar clearmp"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    <span class="sr-only">100% Complete</span>
  </div>
</div>

			 	  <div class="alert alert-info">
					<strong class="help-block">请您注意自己的表白用语，文明表白！</strong>
					<strong class="help-block">您的IP地址为：{ip}</strong>
					<strong class="help-block">不要填写违反法律法规的言论</strong>
				  </div>

			<hr>
			
			<div class="reviewlist">
			{view}
			</div>
<ul class="pager">
  <li class="previous"><a class="page" href=" JavaScript:void(0); " onclick="updatepage('up','list')" >&larr; 上一页</a></li>
  <span id="max_page">共1页</span>/
  <select id="pagenum" class="pagenum" data-page_in="1" data-max_page="1" value="1">
  <option value="1">第1页</option>
  </select>
  
  <li class="next" ><a class="page" href=" JavaScript:void(0); " onclick="updatepage('next','list')">下一页 &rarr;</a></li>
</ul>





		  </div>
		  

		  
		</div>

<script>
$(function () {
	  $('#myTab a:last').tab('show');
  });
</script>

      </div>

    </div><!-- /.container -->

    <div id="footer">
	  <div class="container">
		<p class="text-muted text-center">
		  Copyright © 2015 版权所有 <br>
		  鹿山逐梦者
		</p>
	  </div>

	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/reviewlist.js"></script>
	<script src="js/jindutiao.js"></script>
    <script>
    
var uid= $("#louzhu").attr('data-id');
update_review_list(1,uid);
	  $('ul.pager').hide();
	  
	  $('#myTab a:first').tab('show');
	  
	  $('div.action>span').hide(function(){
	    $(this).show();
	  });
	  
	  
	  
	  
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>
