var timer;

$('#updatereview').bind('click',function(){
var uid= $("#louzhu").attr('data-id');
update_review_list(1,uid);
});

$("#content,input").focus(function() {
							  timer = setInterval('se()', 500);
						  });
$("#content,input").focusout(function() {
								 clearInterval(timer);
							 });
function se() {
	var txt=$("#content").val();
	num = 520;
	if (txt.length > num||txt.length<5)
	{
		$("#submit").attr("disabled", true);
	}
	else
	{
		$("#submit").attr("disabled", false);
	}
	/*
	 if(txt.length>num){
	 //alert('您输入的表白内容超过520个字了哦！');
	 $("#submit").attr("disabled",true);
	 }else{
	 $("#submit").attr("disabled",false);
	 //	al=0;
	 }*/

	$("#havenum").text("还可以输入" + (num - txt.length) + "字");
}


$("#submit").bind("click", function() {
					  content = $("#content").val();
					  if (content == ""||content.length<5)
					  {
						  alert("请填写完整内容！内容不能少于5个汉字！");
						  return false;
					  }
//alert('gh');
var uid= $("#louzhu").attr('data-id');
jindutiao(1);
					  $.ajax({
								 type:"post",
								 url:"php/ajax_add_review.php",
								 data:{content:content,uid:uid},
								 dataType:"json",
								 timeout:30000,
								 success:function (data, textStatus) {
									 // data 可能是 xmlDoc, jsonObj, html, text, 等等...
									 //this; // 调用本次AJAX请求时传递的options参数
									 //alert(data);
									 jindutiao(0); if(data.error=="0"||data.error==0){
										 alert(data.result);
										 re_num=$('#louzhu_review').attr('data-review');
										 $('#louzhu_review').html('评论'+(re_num*1+1));
										 $('#louzhu_review').attr('data-review',(re_num*1+1));
										 update_review_list(1,uid);
									 }else{
										 alert(data.error);
									 }
								 },
								 error:function (XMLHttpRequest, textStatus, errorThrown) {
									 // 通常 textStatus 和 errorThrown 之中
									 // 只有一个会包含信息
									 //this; // 调用本次AJAX请求时传递的options参数
									 alert("请求出现错误，或者连接超时，请稍候重试！");
									 jindutiao(0);
								 }
							 });


					  //alert(myname+"\n"+ta+"\n"+email+"\n"+content+"\n");
				  });
function update_review_list(page,uid){
//alert(page+''+uid);
jindutiao(1);
  $.ajax({
								 type:"get",
								 url:"php/ajax_review.php",
								 data:{page:page,uid:uid},
								 dataType:"json",
								 timeout:30000,
								 success:function (data, textStatus) {
									 // data 可能是 xmlDoc, jsonObj, html, text, 等等...
									 //this; // 调用本次AJAX请求时传递的options参数
									//alert(data);
									 jindutiao(0); if(data.error=="0"||data.error==0){
									review_htm='';	$.each(data.reviewlist,function(i,item){
										 review_htm+=' <div class="list1 font" style="background:url(img/img9.gif) rgba(100,100,100,0.5);">		  <div class="content">			<strong>From</strong><span class="to">'+item.ip+'</span>：								<p class="">'+item.content+'			</p>			<div class="footer"><time>'+item.add_time+'</time></div>		  </div>		  <div class="clearfix"></div>		</div> ';
										});
									//alert(review_htm);	
									$('div.reviewlist').html(review_htm);
									 updatepageselect(data.max_page,data.page_in);
									 }else{
										 //alert(data.error);
										 review_htm='  <div class="alert alert-success">			<strong>'+ data.error +'</strong>			  </div> '; 	$('div.reviewlist').html(review_htm);
									 }
								 },
								 error:function (XMLHttpRequest, textStatus, errorThrown) {
									 // 通常 textStatus 和 errorThrown 之中
									 // 只有一个会包含信息
									 //this; // 调用本次AJAX请求时传递的options参数
									 alert("请求出现错误，或者连接超时，请稍候重试！");
									 jindutiao(0);
								 }
							 });
}
function updatepage(go,to){
  in_page=$('#pagenum').val();
  now_in_page=$('#pagenum').attr('data-page_in');
  max_page=$('#pagenum').attr('data-max_page');
  //alert(go+in_page);
  if(now_in_page==in_page&&to!='nav_update'){
    if(go=='next'){
      1*in_page++;
    }else{
      1*in_page--;
    }
  }
//  alert(in_page+go+to);
  if(in_page==0||in_page>max_page){
  alert('没有上一页或下一页！');
    return;
  }
var uid= $("#louzhu").attr('data-id');
  update_review_list(in_page,uid);
}
function updatepageselect(max_page,page_in){
  select='';
  if(max_page>1){
	  $('ul.pager').show();
  }
  for(i=1;i<=max_page;i++){
    select+='<option value="'+i+'" '+(i==page_in?'selected="selected"':'')+'>第'+i+'页</option>';
  }
  $('#pagenum').html(select);
  $('#pagenum').attr('data-page_in',page_in);
  $('#pagenum').attr('data-max_page',max_page);
  $('#max_page').html('共'+max_page+'页');
  //alert(page_in);
  //alert($('#pagenum').html());
}