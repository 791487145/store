<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.2</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{asset('system/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('system/css/login.css')}}">
	  <link rel="stylesheet" href="{{asset('system/css/xadmin.css')}}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('system/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script src="{{asset('system/js/RSA.js')}}" charset="utf-8"></script>
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">x-admin2.0-管理登录</div>
        <div id="darkbannerwrap"></div>

        <form class="layui-form" >
            <input name="mobile" id="mobile" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" id="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <button type="button" lay-submit lay-filter="login" class="button-role-form layui-btn">登录</button>
            <hr class="hr20" >
        </form>
    </div>

    <script>

            layui.use(['form', 'layer','jquery'],
                function() {
                    $ = layui.jquery;
                    var form = layui.form,
                        layer = layui.layer;

                    let DISABLED = 'layui-btn-disabled';

                    //监听提交
                    form.on('submit(login)', function(data) {

                        var mobile = $('#mobile').val();
                        var password = $('#password').val();
                        mobile = rsa_encode(mobile);
                        password = rsa_encode(password);

                        //but_sub_ad();

                        $.post("{{url('login')}}",{mobile:mobile,password:password,_token:'{{ csrf_token() }}'},function (res) {

                            if (res.code == 1) {
                                layer.msg(res.msg, {icon: 5});
                                return false;
                            }
                            if (res.code == 2) {
                                layer.msg(res.msg, {icon: 5});
                                return false;
                            }
                            if (res.code == 201) {
                                layer.msg(res.msg, {icon: 5});
                                but_sub_rm();
                                return false;
                            } else {
                                location.href = "{{url('index')}}"
                            }
                        });
                    });


                //submit失效
                function but_sub_ad() {
                    $('.button-role-form').addClass(DISABLED);
                    $('.button-role-form').attr('disabled','disabled')
                }
                //submit生效
                function but_sub_rm() {
                    $('.button-role-form').removeClass(DISABLED);
                    $('.button-role-form').removeAttr('disabled');
                }
            });
    </script>
    <!-- 底部结束 -->
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>