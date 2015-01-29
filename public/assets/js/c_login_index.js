$(document).ready(function(){
    //模块定义
    var loginModule = function($){

        var login = function(){
            $("#loginformbtn").click(function(){
                //loading start
                var $btn = $(this);
                $btn.button('loading');
                $.AMUI.progress.start();
                //检查用户名以及密码
                var name = $("#name").val();
                var pwd = $("#password").val();
                if(typeof(name) != "undefined" && typeof(pwd) != "undefined" && name.length > 0 && pwd.length > 0)
                {
                    //ajax
                    $.ajax({
                        type: "GET",
                        url: login_valid_url,
                        data: "name="+name+"&pwd="+pwd,
                        success: function(data){
                            if(typeof(data.error) != "undefined" && data.error == 0)
                            {
                                top.location.href = data.redirect_url;
                            }
                            else{
                                //loading end
                                $btn.button('reset');
                                $.AMUI.progress.done();
                                $("#my-alert-message").html("用户名或密码错误!");
                                $('#my-alert').modal('open');
                            }
                        }
                    });
                }
                else{
                    //loading end
                    $btn.button('reset');
                    $.AMUI.progress.done();

                    $("#my-alert-message").html("用户名以及密码必须填写!");
                    $('#my-alert').modal('open');
                }
                return false;
            });
        };

        //return obj
        var obj = {
            init:function(){login();}
        };

        //return
        return obj;

    }(jQuery);

    //模块调用
    loginModule.init();

});