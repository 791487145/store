@extends('template_add')

@section('content')

    <div id="test12" class="demo-tree-more"></div>

<script>
    layui.use(['form', 'layer','jquery'],
        function() {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            let form_token = '';
            let DISABLED = 'layui-btn-disabled';
            token();

            //基本演示
            tree.render({
                elem: '#test12'
                ,data: data
                ,showCheckbox: true  //是否显示复选框
                ,id: 'demoId1'
                ,isJump: true //是否允许点击节点时弹出新窗口跳转
                ,click: function(obj){
                    var data = obj.data;  //获取当前点击的节点数据
                    layer.msg('状态：'+ obj.state + '<br>节点数据：' + JSON.stringify(data));
                }
            });

            //监听提交
            form.on('submit(add)', function(data) {
                $.post("{{url('role')}}",{data:data.field,_token:'{{ csrf_token() }}',form_token:form_token},function (res) {

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