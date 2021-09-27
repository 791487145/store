@extends('template_list')

@section('contend')
@include('template_navi')

    <div class="layui-fluid">

        <div class="layui-row layui-col-space15">
            <div class="demoTable">
                <form class="layui-form layui-col-space5">
                    <div class="layui-inline layui-show-xs-block">
                        <input class="layui-input"  autocomplete="off" placeholder="角色名称" name="name" id="name">
                    </div>

                    <button class="layui-btn" data-type="reload">搜索</button>
                </form>
            </div>



            <div class="layui-col-md12">
                <div class="layui-card-body demoTable">
                    <button onclick="xadmin.open('添加角色','{{url('role/create')}}',600,400)" class="layui-btn" data-type="getCheckData">添加</button>
                </div>
                <div class="layui-card">
                    <table class="layui-hide" id="demo" lay-filter="test"></table>
                </div>
            </div>
        </div>
    </div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-warm layui-btn-xs" lay-event="permission">配置权限</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>

<script type="text/html" id="checkboxTpl">
    @{{# if(d.is_use == 1){ }}
        <input type="checkbox" name="lock" value="@{{ d.id }}" title="启用" lay-filter="lockDemo" checked>
    @{{# } else { }}
        <input type="checkbox" name="lock" value="@{{ d.id }}" title="启用" lay-filter="lockDemo">
    @{{# } }}
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
                ,url:'{{url('role/list')}}'
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
                    {field:'id', width:100, title: 'ID', sort: true}
                    ,{field:'name', width:100, title: '角色名'}
                    ,{field:'describe', width:200, title: '描述'}
                    ,{field:'is_use', title:'是否锁定', width:110, templet: '#checkboxTpl', unresize: true}
                    ,{field:'created_at', title: '创建时间', width: '30%'}
                    ,{fixed: 'right', title:'操作', toolbar: '#barDemo',width:300}
                ]]
            });

            //监听工具条
            table.on('tool(test)', function(obj){
                var data = obj.data;
                console.log(obj);
                if(obj.event === 'del'){
                    layer.confirm('真的删除此角色么', function(index){
                        $.ajax({
                            url:"{{url('role/delete')}}",
                            type:"POST",
                            data:{id:data.id},//将json对象转换成json字符串发送
                            dataType:"json",
                            success:function(result){
                                if(result.code == 200){
                                    //obj.del();
                                    layer.close(index);
                                }else{
                                    layer.msg('删除失败，请重试')
                                }
                            },
                        });
                    });
                    return false;
                }
                if(obj.event === 'edit') {
                    console.log(data);
                    xadmin.open('编辑角色', "role/"+data.id+"/show");
                    return false;
                }
                if(obj.event === 'permission') {
                    console.log(data);
                    xadmin.open('分配权限', "role/"+data.id+"/permission");
                    return false;
                }
            });

            //监听锁定操作
            form.on('checkbox(lockDemo)', function(obj){
                var id = this.value;
                if(obj.elem.checked){
                    layer.confirm('真的启用此角色么', function(index){
                        $.ajax({
                            url:"{{url('role/status')}}",
                            type:"POST",
                            //contentType:"application/json",//设置请求参数类型为json字符串
                            data:{id:id,is_use:1},//将json对象转换成json字符串发送
                            dataType:"json",
                            success:function(result){
                                if(result.code == 200){
                                    layer.close(index);
                                }else{
                                    layer.msg(result.msg)
                                    table.reload('testReload');
                                }
                            },
                        });
                    });
                }else{
                    layer.confirm('真的禁止此角色么', function(index){
                        $.ajax({
                            url:"{{url('role/status')}}",
                            type:"POST",
                            //contentType:"application/json",//设置请求参数类型为json字符串
                            data:{id:id,is_use:2},//将json对象转换成json字符串发送
                            dataType:"json",
                            success:function(result){
                                if(result.code == 200){
                                    obj.del();
                                    layer.close(index);
                                }else{
                                    layer.msg(result.msg)
                                    table.reload('testReload');
                                }
                            },
                        });
                    });
                };
            });

            var $ = layui.$, active = {
                reload: function(){
                    var name = $('#name');
                    //执行重载
                    table.reload('testReload', {
                        page: {
                            curr: 1 //重新从第 1 页开始
                        }
                        ,where: {
                            key: {
                                name: name.val(),
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



