@extends('template_list')

@section('contend')
@include('template_navi')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card-body demoTable">
                    <button onclick="xadmin.open('添加菜单','{{url('menus/create')}}',600,400)" class="layui-btn" data-type="getCheckData">添加</button>
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
                url:  "{{url('menu/list')}}",
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
                        {field: 'sort', title: '排序', align: 'center', minWidth: 160, sort: true},
                        {fixed: 'right',title:'操作', width:150, align:'center', toolbar: '#barDemo'}
                    ]
                ]
            });


        });


    </script>
@endsection



