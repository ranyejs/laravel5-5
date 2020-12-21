<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 <title>地推-登录</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
      <script src="lib/jquery-2.1.3.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">  
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
        <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="lib/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body class=""> 
  <!--<![endif]-->
        <div class="row-fluid" style="margin-top:10em;">
    <div class="dialog">
        <div class="block">
            <p class="block-heading" style="font-size:22px;"><strong>地推</strong><span style="font-size:16px;">© 后台登录</span></p>
            <div class="block-body">
                <!--<form action="do_login.php" method="post">-->
                    <label>账　　号:</label>
                    <input type="text" id="user" class="user span12">
                    <label>密　　码:</label>
                    <input type="password" id="pwd" class="pwd span12">
                    <label>验 证 码:<img src="./login/createimg" onclick="javascript:this.src='./login/createimg?tm='+Math.random();" style="width: 92px;height: 30px;margin-left: 224px;" /></label>
                    <input type="text" id="yzcode" class="yzcode span12">
                    <div class="btn btn-primary pull-right queren_dl">确认登录</div>
                    <div class="clearfix"></div>
                <!--</form>-->
            </div>
        </div>
    </div>
</div>
  </body>

  <script type="text/javascript">
    console.log(222)
    $(".queren_dl").click(function(){
          var user = $('#user').val();
          var pwd = $("#pwd").val();
          var yzcode = $("#yzcode").val();
          var _token = $('meta[name="csrf-token"]').attr('content')
		  if(user==""){
		     alert("请输入用户名");
		     return;
		  }
	      if(pwd==""){
	          alert("请输入密码");
	          return;
	      }
	      if(yzcode==""){
	          alert("请输入验证码");
	          return;
	      }

          $.ajax({
              url:'./login/dologin',
              type:'POST',
              data:{'user':user,'pwd':pwd,'yzcode':yzcode,'_token':_token},
              dataType:'json',
              success:function(data){
                  if(data.code==1){
                      //window.location.href="index.php"
                  }else{
                      alert(data.msg)
                  }
              }
          })
      })
  </script>
</html>

