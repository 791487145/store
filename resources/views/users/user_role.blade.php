@extends('template_add')

@section('content')
<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form">

            <input type="hidden" name="id" value="{{$user->id}}">

            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>角色列表</label>
                <div class="layui-input-block">
                    <select name="role_id" lay-filter="aihao">
                        <option value="0">请选择</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if($role_id == $role->id) selected @endif>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label"></label>
                <button class="layui-btn" lay-filter="add" lay-submit="">提交</button></div>
        </form>
    </div>
</div>
<script>
    layui.use(['form', 'layer','jquery'],
        function() {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            //监听提交
            form.on('submit(add)', function(data) {
                $.post("{{url('user/role')}}",{data:data.field,_token:'{{ csrf_token() }}'},function (res) {
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