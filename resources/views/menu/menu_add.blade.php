@extends('template_add')

@section('content')
<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form">

            <div class="layui-form-item">
                <label class="layui-form-label">菜单栏</label>
                <div class="layui-input-block">
                    <select name="parent_id" lay-filter="aihao">
                        <option value="0" selected>请选择</option>
                        @foreach($data as $menu)
                            <option value="{{$menu['id']}}">{{$menu['spl'].$menu['name']}}</option>
                        @endforeach
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
                    <input type="text" id="url" name="url" required=""
                           autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>排序
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="sort" name="sort" required="" lay-verify="required|number"
                           autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label"></label>
                <button class="layui-btn" lay-filter="add" lay-submit="">增加</button>
            </div>
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
            token();

            //监听提交
            form.on('submit(add)', function(data) {

                $.post("{{url('menus')}}",{data:data.field,_token:"{{csrf_token()}}",form_token:form_token},function (res) {

                    token();
                    /*if(res.code == 201){
                        layer.msg(res.msg, {icon: 5});
                    }else{
                        layer.msg('添加成功');
                        xadmin.close();
                        xadmin.father_reload();
                    }*/
                })


                return false;
            });

            //生成form_token
            function token()
            {
                $.get("{{url('create/formtoken')}}",{},function (res) {
                    form_token = res.data.token;
                    $('#form_token').val(form_token);
                })
            }

        });
</script>

@endsection
