<!DOCTYPE html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.2</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="{{asset('system/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('system/css/xadmin.css')}}">

    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('system/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('system/js/xadmin.js')}}"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @yield('contend')

    <script>
        layui.config({
            base: './layui/' //指定 layuiAdmin 项目路径，本地开发用 src，线上用 dist
            // ,version: '1.6.0',
            ,version: new Date().getTime()
        }).extend({
            treeTable: 'extends/treeTable',
            //hxNav: 'extends/hxNav',
        });
    </script>

    @yield('javascript')

</body>
</html>
