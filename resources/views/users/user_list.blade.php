@extends('template_list')

@section('contend')
@include('template_navi')

    <div class="layui-fluid">

        <div class="layui-row layui-col-space15">
            <div class="demoTable">
                <form class="layui-form layui-col-space5">
                    <div class="layui-inline layui-show-xs-block">
                        <input class="layui-input"  autocomplete="off" placeholder="用户id" name="user_id" id="user_id">
                    </div>
                    <div class="layui-inline layui-show-xs-block">
                        <input class="layui-input"  autocomplete="off" placeholder="用户手机号" name="mobile" id="mobile">
                    </div>
                    <div class="layui-inline layui-show-xs-block">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                    <button class="layui-btn" data-type="reload">搜索</button>
                </form>
            </div>

            <a href="{{url('users/create')}}"><button type="button" class="layui-btn">添加</button></a>

            <div class="layui-col-md12">
                <div class="layui-card">
                    <table class="layui-hide" id="demo" lay-filter="test"></table>
                </div>
            </div>
        </div>

    </div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="role">分配角色</a>
</script>
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
                    ,{fixed: 'right', title:'操作', toolbar: '#barDemo'}
                ]]
            });

            //监听工具条
            table.on('tool(test)', function(obj){
                var data = obj.data;
                console.log(obj);
                if(obj.event === 'del'){
                    layer.confirm('真的删除行么', function(index){
                        $.ajax({
                            url:"users/"+data.id,
                            type:"DELETE",
                            contentType:"application/json",//设置请求参数类型为json字符串
                            data:{user_id:data.id},//将json对象转换成json字符串发送
                            dataType:"json",
                            success:function(result){
                                if(result.code == 200){
                                    obj.del();
                                    layer.close(index);
                                }else{
                                    layer.msg('删除失败，请重试')
                                }
                            },
                        });
                    });
                    return false;
                }
                if(obj.event === 'role') {
                    console.log(data);
                    xadmin.open('分配角色', "user/"+data.id+"/role");
                }
                if(obj.event === 'edit') {
                    console.log(data);
                    xadmin.open('编辑', "users/"+data.id+"/edit");
                }
            });

            var $ = layui.$, active = {
                reload: function(){
                    var user_id = $('#user_id');
                    var mobile = $('#mobile');

                    //执行重载
                    table.reload('testReload', {
                        page: {
                            curr: 1 //重新从第 1 页开始
                        }
                        ,where: {
                            key: {
                                user_id: user_id.val(),
                                mobile: mobile.val()
                            }
                        }
                    });
                }
            };

            $('.demoTable .layui-btn').on('click', function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });


        });


    </script>
@endsection



