@extends('template_add')

@section('content')
<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form">

            <div class="layui-form-item">
                <label class="layui-form-label">菜单栏</label>
                <div class="layui-input-block">
                    <select name="parent_id" lay-filter="aihao">
                        <option value=""></option>
                        <option value="0">写作</option>
                        <option value="1" selected="">阅读</option>
                        <option value="2">游戏</option>
                        <option value="3">音乐</option>
                        <option value="4">旅行</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>菜单名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="name" name="name" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>
                </div>
            </div>

            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>icon
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="icon" name="icon" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>链接
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="url" name="url" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
            </div>



            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label"></label>
                <button class="layui-btn" lay-filter="add" lay-submit="">增加</button></div>
        </form>
    </div>
</div>
<script>
    layui.use(['form', 'layer','jquery'],
        function() {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            //自定义验证规则
            form.verify({

                pass: [/(.+){6,12}$/, '密码必须6到12位'],
                repass: function(value) {
                    if ($('#L_pass').val() != $('#L_repass').val()) {
                        return '两次密码不一致';
                    }
                }
            });

            //监听提交
            form.on('submit(add)', function(data) {
                $.post("{{url('users')}}",{data:data.field,_token:'{{ csrf_token() }}'},function (res) {
                    if(res.code == 201){
                        layer.msg(res.msg, {icon: 5});
                    }else{
                        layer.msg('添加成功');
                        xadmin.close();
                        xadmin.father_reload();
                    }
                });
                return false;
            });

        });
</script>

@endsection
