@extends('template_add')

@section('content')
<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form">

            <input type="hidden" name="id" value="{{$menu->id}}" class="layui-input">

            <div class="layui-form-item">
                <label class="layui-form-label">菜单栏</label>
                <div class="layui-input-block">
                    <select name="parent_id" lay-filter="aihao">
                        <option value="0" @if($menu->parent_id == 0) selected  @endif>请选择</option>
                        @foreach($tree as $value)
                            <option @if($menu->parent_id == $value['id'])  selected  @endif value="{{$value['id']}}">{{$value['spl'].$value['name']}}</option>
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
                           autocomplete="off" value="{{$menu->name}}" class="layui-input">
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
                    <input type="text" id="icon" value="{{$menu->icon}}" name="icon" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>链接
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="url" name="url" value="{{$menu->url}}" required=""
                           autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>排序
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="sort" name="sort" value="{{$menu->sort}}" required="" lay-verify="required|number"
                           autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label"></label>
                <button class="layui-btn button-menu-form" lay-filter="add" lay-submit="">提交</button>
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
            let DISABLED = 'layui-btn-disabled';
            token();

            //监听提交
            form.on('submit(add)', function(data) {

                but_sub_ad();

                $.post("{{url('menu/update')}}",{data:data.field,_token:"{{csrf_token()}}",form_token:form_token},function (res) {

                    //console.log(res)
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
                    $('#form_token').val(form_token);
                })
            }

            //submit失效
            function but_sub_ad() {
                $('.button-menu-form').addClass(DISABLED);
                $('.button-menu-form').attr('disabled','disabled')
            }
            //submit生效
            function but_sub_rm() {
                $('.button-menu-form').removeClass(DISABLED);
                $('.button-menu-form').removeAttr('disabled');
            }

        });
</script>

@endsection
