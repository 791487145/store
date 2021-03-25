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
                elem: '#demo'
                ,url:'{{url('user/list')}}'
                ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                ,parseData: function(res){ //res 即为原始返回的数据
                    return {
                        "code": res.code, //解析接口状态
                        "msg": res.msg, //解析提示文本
                        "data": res.data, //解析数据列表
                        "count": res.count //解析数据列表
                    };
                }
                ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
                    layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                    //,curr: 5 //设定初始在第 5 页
                    ,groups: 1 //只显示 1 个连续页码
                    ,first: false //不显示首页
                    ,last: false //不显示尾页

                }
                ,cols: [[
                    {field:'id', width:80, title: 'ID', sort: true}
                    ,{field:'name', width:80, title: '用户名'}
                    ,{field:'mobile', width:120, title: '手机号', sort: true}
                    ,{field:'email', width:120, title: '邮箱'}
                    ,{field:'created_at', title: '创建时间', width: '30%'} //minWidth：局部定义当前单元格的最小宽度，layui 2.2.1 新增
                ]]
            });
        });


    </script>
@endsection



