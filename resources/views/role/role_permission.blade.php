@extends('template_add')

@section('content')

    <div class="layui-fluid">
        <div class="layui-row">
            <div id="test7" class="demo-tree"></div>
        </div>
    </div>

    <div class="layui-btn-container">
        <button type="button" class="layui-btn layui-btn-sm" lay-demo="getChecked">获取选中节点数据</button>
    </div>

<script>
    layui.use(["tree", "util"], function(){
        var tree = layui.tree
            ,layer = layui.layer
            ,util = layui.util

        let data2 = '';
        let role_id = '{{$role->id}}';

        permissionTree();

        tree.render({
            elem: '#test7'
            ,data: [data2]
            ,id : 'demoId1'
            ,showCheckbox: true
            ,accordion: true
        });

        //按钮事件
        util.event('lay-demo', {
            getChecked: function(othis){
                var checkedData = tree.getChecked('demoId1'); //获取选中节点的数据

                var permissions = [];
                var recurrence = function(recurrence, checkedData) {
                    layui.each(checkedData, function(index, item) {
                        permissions.push(item.id);
                        if (item.children.length < 1) {
                            return false;
                        }
                        recurrence(recurrence, item.children);
                    });
                };
                recurrence(recurrence, checkedData);

                $.ajax({
                    type:"post",//数据提交类型
                    url:"{{url('role/permission')}}",//请求地址
                    data:{'permissions':permissions,role_id:role_id},
                    dataType:"json",//返回数据的类型
                    async:false,//是否为异步 ，true 异步
                    success:function(res){
                        if(res.code == 201){
                            layer.msg(res.msg);
                        }else{
                            layer.msg('添加成功');
                            xadmin.close();
                            xadmin.father_reload();
                        }
                    }
                });
            }
        });

        //生成form_token
        function permissionTree()
        {
            $.ajax({
                type:"get",//数据提交类型
                url:"/role/"+role_id+"/permission/tree",//请求地址
                dataType:"json",//返回数据的类型
                async:false,//是否为异步 ，true 异步
                success:function(res){
                    data2 = res.data;
                }
            });
        }

        });
</script>

@endsection