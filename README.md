<h1>侯坤林制作的表白墙</h1>
<hr>
<pre>
目录结构：
config
  mysql_config.php数据库配置文件，以及几个自定义的数据库操作函数
css
  bootstrap-theme.min.css前端框架样式文件
  bootstrap.min.css前端框架样式文件
  styles.css主页和评论的引用样式文件
email
  class.phpmailer.php邮件类文件
  class.smtp.php邮件类文件
fonts前端框架字体文件夹
img图片存放文件夹
js
  application.js前端框架的一个提示脚本
  bootstrap.min.js前端框架脚本（被压缩）
  bootstrap.js前端框架脚本（未压缩）
  jindutiao.js进度条显示/隐藏
  jquery-1.1.3.1.min.js脚本库文件
  jquery-1.7.2.min.js脚本库文件
  love_from.js主页的脚本文件
  reviewlist.js评论界面的脚本文件
php
  ajax_add_like.php通过异步的点赞操作文件
  ajax_add_review.php通过异步评论操作文件
  ajax_add_saylove.php通过异步表白的操作文件
  ajax_lovelist.php通过异步加载表白列表
  ajax_lovelist_bd.php通过异步加载的表白排行列表
  ajax_review.php通过异步加载的评论列表
  email.php邮件发送自定义函数，把发送邮件操作集合到自定义函数中，方便调用

index.php主页文件
index.tpl主页模板文件
review.php评论文件
review.tpl评论模板文件
lovewall.sql数据库表结构及初始数据


</pre>


<hr>
<br>现在我已会在linux上使用git了，虽然经常会忘记命令，但是只要自己去百度，去学习，把命令多用，用熟悉就不会忘记了，目前你看到的内容就是我在linux上修改的内容。
<br>用写代码用得最多的设备是手机，并不是我想用手机，而是我只有手机可以用，所以我不得不用手机编写程序，还好我找到一个带有git功能的网页编写软件，我用这个软件编写好，然后再提交到分布式代码管理系统服务器上，这样我就可以通过我自己的linux系统使用git命令下载我自己的网站程序，还可以在linux系统上做出修改，然后提交到分布式代码管理系统上，通过分布式代码管理系统作为中转，我可以保持手机和linux服务器的网站代码的同步性
<br>别问我为什么这么麻烦,只是因为我不懂得用ssh上传下载服务器的文件，至于为什么我学不会ssh上传下载文件，我也不知道，或许是我的手机的ssh软件的问题，或许是我自己的学习能力问题
<br><br>总之因素很多的啦，不纠结这个了，如果你觉得这个程序可以的话，尽管下载来用吧，我保证开源！


