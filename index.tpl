
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>鹿山学院表白墙</title>

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
          <a class="navbar-brand " href="JavaScript:void(0);" id="updatewall">刷新墙</a>
          <a class="navbar-brand pull-right" href="JavaScript:void(0);" id="nav_so">搜索</a>
          
          <div class="navbar-brand input-group " href="#" id="input_so" style="display:none;border-top:2px solid red;">
					
					<input type="text" class="form-control" name="soname" id="soname" data-ok="0" value="" placeholder="搜索姓名">
					<span class="input-group-addon" id="sobtn" >搜索</span>
</div>
          
        </div>
      </div>
    </div>
	<div class="page-header text-center title font">
	  <h1>表白墙<small>鹿山学院</small></h1>
	</div>
    <div class="container">
	  
	  
      <div class="starter-template bodybg">
		
		
			<ul class="nav nav-tabs font" id="myTab">
			  <li class="active"><a href="#lovelist" data-toggle="tab">表白墙</a></li>
			  <li><a href="#tellyou" data-toggle="tab">我要表白</a></li>
			  <li><a href="#pdlist" data-toggle="tab">榜单</a></li>
			</ul>
 <div class="progress progress-striped active clearmp " id="jindutiao">
  <div class="progress-bar clearmp"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    <span class="sr-only">100% Complete</span>
  </div>
</div>
		
			<div class="tab-content text-left">
			  <div class="tab-pane fade in active" id="lovelist">
			  <ul class="pager">
  <li class="previous"><a class="page" href=" JavaScript:void(0); " onclick="updatepage('up','list')" >&larr; 上一页</a></li>
 
 <span id="max_page">共1页</span>/
  <select id="pagenum" class="pagenum" data-page_in="1" data-max_page="1" value="1">
  <option value="1">第1页</option>
  </select>
  
  <li class="next" ><a class="page" href=" JavaScript:void(0); " onclick="updatepage('next','list')">下一页 &rarr;</a></li>
</ul> <div class="clearfix"></div>
			  <div id="list">
				{lovelist}
				
				</div>
				
				
				
				
				
			  </div>
			  <div class="tab-pane fade" id="tellyou">
				<form action="" method="post" class="clearmp">
				  <div class="alert alert-success">
					<strong>在这里，向你喜欢的人，说出你想说的话！填写对方的邮箱我们还可以通过电子邮件把您的情意送达哦！</strong>
				  </div>

				  <div class="input-group">
					<span class="input-group-addon">我是</span>
					<input type="text" class="form-control" name="myname" id="myname" value="" placeholder="署上我的名字">
				  </div>

				  <div class="input-group">
					<span class="input-group-addon">给TA</span>
					<input type="text" class="form-control" name="ta" id="ta" value="" placeholder="写上TA的姓名">
				  </div>

				  <div class="input-group">
					<span class="input-group-addon">邮箱</span>
					<input type="email" class="form-control" name="email" id="email" value="" placeholder="写上TA的电子邮箱">
				  </div>


				  <div class="input-group widthb">
					<textarea type="text" class="form-control widthb" name="content" id="content" value="" placeholder="在这里写上我想对TA说的话"></textarea>
					<span class="sphelp font" id="havenum">还可以输入520字。</span>
				  </div>

				  <div class="text-center">
					<input type="button" class="btn btn-primary font" id="submit" value="送出我对TA的情意">
				  </div>
				</form>
				  <div class="alert alert-info">
					<strong class="help-block">请您注意自己的表白用语，文明表白！</strong>
					<strong class="help-block">您的IP地址为：{ip}</strong>
					<strong class="help-block">不要填写违反法律法规的言论</strong>
				  </div>

			  </div>

			  <div class="tab-pane fade" id="pdlist">
			  <div id="list">
			  {top}
			  </div>
			  </div>
			</div>

      </div>

    </div><!-- /.container -->

    <div id="footer">
	  <div class="container">
		<p class="text-muted text-center">
		  Copyright © 版权所有 2015 <br>
		  鹿山学院易班学生工作站项目部技术支持
		</p>
	  </div>

	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/love_form.js"></script>
	<script src="js/jindutiao.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

<script>
$(function () {
	  $('#myTab a:first').tab('show');
	  uodatalovelist(1,'list');
	  uodatalovelist(1,'bd');
	  $('ul.pager').hide();
  });
  
  
  
</script>

  </body>
</html>
