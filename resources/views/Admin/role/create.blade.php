<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>添加角色</title>
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
                            <span class="x-red">*</span>角色</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="role_name" required="" lay-verify="username" autocomplete="off" class="layui-input"></div>
                        <div class="layui-form-mid layui-word-aux"><span class="x-red">*</span>角色名不能为空</div>
                    </div>

                    <div class="layui-form-item">
                        <label for="L_email" class="layui-form-label">
                            <span class="x-red">*</span>描述</label>
                        <div class="layui-input-inline">
                            <input type="tel" id="L_namedesc"  name="role_desc" required="" lay-verify="role_desc" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" type="button" lay-filter="add" lay-submit="">添加</button></div>
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
                    username: function(value) {
                        if (value.length < 1) {
                            return '请输入规则名';
                        }
                    },

                });

                //监听提交
                form.on('submit(add)',
                function(data) {
                    //console.log(data.field);
                    $.ajax({
                        type:'POST',
                        url:'/admin/role',
                        dataType:'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:data.field,
                        success:function(data){
                            //console.log(data);
                            if(data.status==0){
                                layer.msg(data.message,{icon:1},function(index){
                                    layer.close(layer.index);//刷新父页面，注意一定要在关闭当前iframe层之前执行刷新
                                    window.parent.location.reload();
                                });
                            }else{
                                layer.msg(data.message,{icon:6});
                            }
                        },
                        error:function(e){
                        }
                    })
                    return false;
                }
                );

            });
        </script>

    </body>

</html>