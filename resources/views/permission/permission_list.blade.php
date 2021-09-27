@extends('template_list')

@section('contend')
@include('template_navi')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card-body demoTable">
                    <button onclick="xadmin.open('添加菜单','{{url('permission/create')}}',600,600)" class="layui-btn" data-type="getCheckData">添加</button>
                </div>

                <div class="layui-card">
                    <table class="layui-hide" id="menu_list" lay-filter="menu_list"></table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>

@endsection
@section('javascript')
    <script>
        layui.use(['laydate','form','table','treeTable'], function(){
            var laydate = layui.laydate;
            var form = layui.form;
            var table = layui.table;
            var treeTable = layui.treeTable;

            var insTb = treeTable.render({
                elem: '#menu_list',
                cellMinWidth: 80,
                height: 'full-150',
                page: false,
                url:  "{{url('permission/list')}}",
                method: 'get',
                headers: {},
                tree: {
                    iconIndex: 2,
                    isPidData: true,
                    idName: 'id',
                    pidName: 'parent_id'
                },
                cols: [
                    [
                        {type: 'numbers',title: '编号',minWidth: 80},
                        {field: 'id', title: '菜单id', align: 'center', minWidth: 80, unresize: false},
                        {field: 'name', title: '菜单名', align: 'center', minWidth: 160, unresize: true},
                        {field: 'url', title: '链接', align: 'center', minWidth: 160, unresize: true},
                        {fixed: 'right',title:'操作', width:150, align:'center', toolbar: '#barDemo'}
                    ]
                ]
            });

            //监听工具条
            treeTable.on('tool(menu_list)', function(obj){
                var data = obj.data;
                console.log(obj);
                if(obj.event === 'del'){
                    layer.confirm('真的要删除么', function(index){
                        $.ajax({
                            url:"menu/"+data.id+"/delete",
                            type:"post",
                            contentType:"application/json",//设置请求参数类型为json字符串
                            data:{id:data.id},//将json对象转换成json字符串发送
                            dataType:"json",
                            success:function(result){
                                if(result.code == 0){
                                    obj.del();
                                    layer.close(index);
                                }else{
                                    layer.msg(result.msg)
                                }
                            },
                        });
                    });
                    return false;
                }
                if(obj.event === 'edit') {
                    console.log(data);
                    xadmin.open('编辑', "permission/"+data.id+"/show");
                    return false;
                }
            });



        });


    </script>
@endsection



