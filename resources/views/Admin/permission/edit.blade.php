<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>修改管理员</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        @include('admin.public.styles')
        @include('admin.public.script')
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>用户名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" value="{{$user->username}}" name="username" required="" lay-verify="nikename" autocomplete="off" class="layui-input"></div>
                        <div class="layui-form-mid layui-word-aux"><span class="x-red">*</span>将会成为用户的登入名</div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_email" class="layui-form-label">
                            <span class="x-red">*</span>电话</label>
                        <div class="layui-input-inline">
                            <input type="tel" id="L_email" value="{{$user->phone}}" maxlength="11" name="tel" required="" lay-verify="tel" autocomplete="off" class="layui-input"></div>

                    </div>

                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" type="button" lay-filter="edit" lay-submit="">修改</button></div>
                </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer','jquery'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                form.verify({
                    //tel: [/^1[3456789]d{9}$/, '请输入有效的电话号码'],
                    tel: function(value) {
                        if (value.length !=11) {
                            return '请输入有效的电话号码';
                        }
                    },
                    nikename: function(value) {
                        if (value.length < 5) {
                            return '昵称至少得5个字符';
                        }
                    }

                });

                //监听提交
                form.on('submit(edit)',
                function(data) {
                    //console.log(data.field);
                    $.ajax({
                        type:'PUT',
                        url:'/admin/user/'+{{$user->id}},
                        dataType:'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:data.field,
                        success:function(data){
                            //console.log(data);
                            if(data.status==0){
                                layer.msg(data.message,{icon:6},function(index){
                                    layer.close(layer.index);//刷新父页面，注意一定要在关闭当前iframe层之前执行刷新
                                    window.parent.location.reload();
                                });
                            }else{
                                layer.msg(data.message,{icon:5});
                            }
                        },
                        error:function(e){
                        }
                    })
                    return false;
                    // console.log(data);
                    // //发异步，把数据提交给php
                    // layer.alert("增加成功", {
                    //     icon: 6
                    // },
                    // function() {
                    //     //关闭当前frame
                    //     xadmin.close();
                    //
                    //     // 可以对父窗口进行刷新
                    //     xadmin.father_reload();
                    // });
                    // return false;
                }
                );

            });
        </script>

    </body>

</html>