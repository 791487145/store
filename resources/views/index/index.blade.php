<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>后台登录-X-admin2.2</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="{{asset('system/css/font.css')}}">
        <link rel="stylesheet" href="{{asset('system/css/xadmin.css')}}">
        <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
        <script src="{{asset('system/lib/layui/layui.js')}}" charset="utf-8"></script>
        <script type="text/javascript" src="{{asset('system/js/xadmin.js')}}"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
        <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
        <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            // 是否开启刷新记忆tab功能
            // var is_remember = false;
        </script>
    </head>
    <body class="index">
        <!-- 顶部开始 -->
        @include('template_top')
        <!-- 顶部结束 -->
        <!-- 中部开始 -->
        <!-- 左侧菜单开始 -->
        @include('template_left')
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        @include('template_nav')
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->

    </body>

</html>