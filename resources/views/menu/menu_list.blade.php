@extends('template_list')

@section('contend')
@include('template_navi')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card-body demoTable">
                    <form class="layui-form layui-col-space5">

                        <div class="layui-inline layui-show-xs-block">
                            <input type="text" id="menu_name" name="name" placeholder="请输入菜单名" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-inline layui-show-xs-block">
                            <button class="layui-btn" lay-submit="" lay-filter="sreach">
                                <i class="layui-icon">&#xe615;</i>
                            </button>
                        </div>
                       <a href="{{}}"><button class="layui-btn layui-btn-warm" data-type="getCheckData">添加</button></a>
                    </form>
                </div>

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
                ,url:'{{url('menu/list')}}'
                ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                ,parseData: function(res){ //res 即为原始返回的数据
                    return {
                        "code": res.code, //解析接口状态
                        "msg": res.msg, //解析提示文本
                        "data": res.data, //解析数据列表
                    };
                }
                ,cols: [[
                    {field:'id', title: 'ID', sort: true}
                    ,{field:'name',title: '菜单名'}
                    ,{field:'sort', title: '手机号', sort: true}
                    ,{field:'created_at', title: '创建时间'} //minWidth：局部定义当前单元格的最小宽度，layui 2.2.1 新增
                ]]
                ,id: 'testReload'
            });

            var $ = layui.$, active = {
                reload: function(){
                    var menu_name = $('#menu_name');

                    //执行重载
                    table.reload('testReload', {
                        page: {
                            curr: 1 //重新从第 1 页开始
                        }
                        ,where: {
                            key: {
                                name: menu_name.val()
                            }
                        }
                    }, 'data');
                }
            };

            $('.demoTable .layui-btn').on('click', function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });


        });


    </script>
@endsection



