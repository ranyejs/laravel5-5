<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>地推-后台登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    @include('admin.public.styles')
    @include('admin.public.script')
</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">地推-后台登录</div>
        <div id="darkbannerwrap"></div>



        <form method="post" class="layui-form" action="/admin/dologin">
            <input type="hidden" value="{{csrf_token()}}" name="_token">
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input name="yzCode" style="width:60%;float: left" placeholder="验证码"  type="text" lay-verify="required" class="layui-input" >
            <img style="float: right" src="/createimg" onclick="javascript:this.src='/createimg?tm='+Math.random();"/>
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
            @if(is_object($errors))

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="font-size: 14px;color: red;">*{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @else
                <div class="alert alert-danger">
                    <ul>
                        <li style="font-size: 14px;color: red;">*{{ $errors }}</li>
                    </ul>
                </div>

            @endif
        </form>

    </div>

    <script>
        $(function  () {
            // layui.use('form', function(){
            //   var form = layui.form;
            //   // layer.msg('玩命卖萌中', function(){
            //   //   //关闭后的操作
            //   //   });
            //   //监听提交
            //   form.on('submit(login)', function(data){
            //     // alert(888)
            //     // layer.msg(JSON.stringify(data.field),function(){
            //     //     //location.href='index.html'
            //     // });
            //     //return false;
            //   });
            // });
        })
    </script>

</body>
</html>