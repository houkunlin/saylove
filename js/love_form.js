var timer;
var al = 0;
var soso=0;
document.onkeydown=function(event){
var e = event || window.event || arguments.callee.caller.arguments[0];
if(e && e.keyCode==27){ // 按 Esc 
//要做的事情
}
if(e && e.keyCode==113){ // 按 F2 
//要做的事情
} 
if(e && e.keyCode==13){ // enter 键
//要做的事情
 uodatalovelist(1,'list');
}
};


$('#updatewall').bind('click',function(){
  $('#soname').val('');
  $('#input_so').slideUp();
 uodatalovelist(1,'list');
});

$('#nav_so').bind('click',function(){
  input_so=$('#input_so');
  if(input_so.css('display')=='none'){
    input_so.slideDown();
  }else{
    input_so.slideUp();
  }
});
$('#sobtn').bind('click',function(){
 //$('#soname').attr('data-ok',1);
 uodatalovelist(1,'list');
 //alert($('#soname').val());
});

$("#submit").bind("click", function () {
    myname = $("#myname").val();
    ta = $("#ta").val();
    email = $("#email").val();
    content = $("#content").val();
    if (myname == "" || ta == "" || content == ""||content.length<5) {
        alert("请填写完整内容，且表白内容不得少于5个汉字！");
        return false;
    }
//alert('gh');
jindutiao(1);
    $.ajax({
        type: "post",
        url: "php/ajax_add_saylove.php",
        data: {myname: myname, ta: ta, email: email, content: content},
        dataType: "json",
        timeout: 30000,
        success: function (data, textStatus) {
            // data 可能是 xmlDoc, jsonObj, html, text, 等等...
            //this; // 调用本次AJAX请求时传递的options参数
            //alert(data);
            jindutiao(0);
            if (data.error == "0" || data.error == 0) {
                alert(data.result);
                //window.location = "index.php";
                uodatalovelist(1,'list');
            } else {
                alert(data.error);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            // 通常 textStatus 和 errorThrown 之中
            // 只有一个会包含信息
            //this; // 调用本次AJAX请求时传递的options参数
            alert("请求出现错误，或者连接超时，请稍候重试！");
            jindutiao(0);
        }
    });


    //alert(myname+"\n"+ta+"\n"+email+"\n"+content+"\n");
});
$("#content,input").focus(function () {
    timer = setInterval('se()', 500);
});
$("#content,input").focusout(function () {
    clearInterval(timer);
});
function se() {
    var txt = $("#content").val();
    myname = $("#myname").val();
    ta = $("#ta").val();
    email = $("#email").val();
    num = 520;
    if (myname == "" || ta == "" || txt == "" || txt.length > num || txt.length<5 ) {
       $("#submit").attr("disabled", true);
    }
    else {
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
$("span[id=review]").bind("click", function () {
//	alert($(this).attr("data-id"));
});
$("div>div.content>div.action>span[id=like]").bind("click", function () {
    id = $(this).attr("data-id");
    //alert(id);
    var zan = $(this).attr('data-num');
    jindutiao(1);
    $.ajax({
        type: "get",
        url: "php/ajax_add_like.php",
        data: {uid: id},
        dataType: "json",
        timeout: 30000,
        success: function (data, textStatus) {
            // data 可能是 xmlDoc, jsonObj, html, text, 等等...
            //this; // 调用本次AJAX请求时传递的options参数
            //alert(data);
jindutiao(0);
            if (data.error == "0" || data.error == 0) {
                alert(data.result);
                var like = $("span[data-idd=like" + id + "]");
                like.attr("data-num", (zan * 1 + 1));
                like.html('赞' + (zan * 1 + 1));
            } else {
                alert(data.error);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            // 通常 textStatus 和 errorThrown 之中
            // 只有一个会包含信息
            //this; // 调用本次AJAX请求时传递的options参数
            alert("请求出现错误，或者连接超时，请稍候重试！");
            jindutiao(0);
        }
    });
});
function uodatalovelist(page,to){
name='';
//var soso= $('#soname').attr('data-ok');
if(to=='bd'){
var url='php/ajax_lovelist_bd.php';
var eid='#pdlist>div#list';
}else{
var url='php/ajax_lovelist.php';
var eid='#lovelist>div#list';
  //if(soso==1){
    name=$('#soname').val();
 // }
}
//alert(name);
jindutiao(1);
    $.ajax({
        url:url,
        data: {page: page,name:name},
        dataType: "json",
        timeout: 30000,
        success: function (data, textStatus) {
            // data 可能是 xmlDoc, jsonObj, html, text, 等等...
            //this; // 调用本次AJAX请求时传递的options参数
            //alert(data);
jindutiao(0);
            if (data.error == "0" || data.error == 0) {
                html='';
              if(to=='list'){ updatepageselect(data.max_page,data.page_in);
               } $.each(data.lovelist,function(i,item){
                    html+='<div class="list1 font" style="background:url(img/img'+(to=='bd'&&i<3&&data.page_in=='1'?'1':'7')+'.gif) rgba(100,100,100,0.5);"> <div class="content"> <strong>To</strong><span class="to">'+item.to+'</span>： <div class="action"> <span class="label label-success font_s">'+item.id+'楼</span> <a href="review.php?uid='+item.id+'" class="alert-link"><span class="label label-success font_s" data-id="'+item.id+'" id="review">评论'+item.review+'</span></a> <span class="label label-success font_s" data-id="'+item.id+'" data-num="'+item.likenum+'" id="like'+item.id+'" onclick="givelike(\''+item.id+'\')" >赞'+item.likenum+'</span> </div> <p class="">'+item.content+' </p> <div class="footer">From<span class="from">'+item.from+'</span>，<time>'+item.add_time+'</time></div> </div> <div class="clearfix"></div> </div>';
                });
$(eid).html(html);
//alert(html);

            } else {
                html='  <div class="alert alert-success">					<strong>'+ data.error +'</strong>				  </div> ';
$(eid).html(html);
updatepageselect(1,1);
            }
	  $('#myTab a:first').tab('show');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            // 通常 textStatus 和 errorThrown 之中
            // 只有一个会包含信息
            //this; // 调用本次AJAX请求时传递的options参数
            alert("请求出现错误，或者连接超时，请稍候重试！");
            jindutiao(0);
        }
    });
}

function givelike(id) {
    jindutiao(1);
    $.ajax({
        type: "get",
        url: "php/ajax_add_like.php",
        data: {uid: id},
        dataType: "json",
        timeout: 30000,
        success: function (data, textStatus) {
            // data 可能是 xmlDoc, jsonObj, html, text, 等等...
            //this; // 调用本次AJAX请求时传递的options参数
            //alert(data);
jindutiao(0);
            if (data.error == "0" || data.error == 0) {
                alert(data.result);
                var like = $("#lovelist>div#list #like" + id + "");
                zan=like.attr("data-num");
                like.attr("data-num", (zan * 1 + 1));
                like.html('赞' + (zan * 1 + 1));
                var like2 = $("#pdlist>div#list #like" + id + "");
                zan2=like2.attr("data-num");
                //alert(zan2);
                like2.html('赞' + (zan2 * 1 + 1));
                like2.attr("data-num", (zan2 * 1 + 1));
            } else {
                alert(data.error);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
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
  if(now_in_page==in_page){
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
  uodatalovelist(in_page,to);
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