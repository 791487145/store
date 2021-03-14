@extends('template_list')

@section('contend')
@include('template_navi')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">

                    <table class="layui-hide" id="demo"></table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        layui.use(['laydate','form','table'], function(){
            var laydate = layui.laydate;
            var form = layui.form;
            var table = layui.table;

            table.render({
                elem: '#test'
                ,url:'/demo/table/user/'
                ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                ,cols: [[
                    {field:'id', width:80, title: 'ID', sort: true}
                    ,{field:'name', width:80, title: '用户名'}
                    ,{field:'mobile', width:80, title: '手机号', sort: true}
                    ,{field:'email', width:80, title: '邮箱'}
                    ,{field:'created_at', title: '创建时间', width: '30%'} //minWidth：局部定义当前单元格的最小宽度，layui 2.2.1 新增
                ]]
            });
        });


    </script>
@endsection



