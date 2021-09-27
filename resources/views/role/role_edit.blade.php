@extends('template_add')

@section('content')
<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form">

            <input type="hidden" name="id" value="{{$role->id}}">
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>角色名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="nickname" name="name" value="{{$role->name}}" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>将会成为您唯一角色名
                </div>
            </div>

            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>描述
                </label>
                <div class="layui-input-inline">
                    <textarea placeholder="请输入内容" class="layui-textarea" name="describe">{{$role->describe}}</textarea>
                </div>
            </div>


            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label"></label>
                <button class="layui-btn button-role-form" lay-filter="add" lay-submit="">增加</button></div>
        </form>
    </div>
</div>
<script>
    layui.use(['form', 'layer','jquery'],
        function() {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            let form_token = '';
            let DISABLED = 'layui-btn-disabled';

            token();

            //监听提交
            form.on('submit(add)', function(data) {
                $.post("{{url('role/update')}}",{data:data.field,_token:'{{ csrf_token() }}',form_token:form_token},function (res) {

                    if(res.code == 1){
                        layer.msg(res.msg, {icon: 5});
                        return false;
                    }
                    if(res.code == 2){
                        layer.msg(res.msg, {icon: 5});
                        token();
                        return false;
                    }
                    if(res.code == 201){
                        layer.msg(res.msg, {icon: 5});
                        token();
                        but_sub_rm();
                        return false;
                    }else{
                        layer.msg('添加成功');
                        xadmin.close();
                        xadmin.father_reload();
                    }
                });
                return false;
            });


            //生成form_token
            function token()
            {
                $.get("{{url('create/formtoken')}}",{},function (res) {
                    form_token = res.data.token;
                })
            }

            //submit失效
            function but_sub_ad() {
                $('.button-role-form').addClass(DISABLED);
                $('.button-role-form').attr('disabled','disabled')
            }
            //submit生效
            function but_sub_rm() {
                $('.button-role-form').removeClass(DISABLED);
                $('.button-role-form').removeAttr('disabled');
            }


        });
</script>

@endsection