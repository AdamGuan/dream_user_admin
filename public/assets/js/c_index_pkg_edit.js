$(document).ready(function(){
    //模块定义
    var pkgEditModule = function($){

        //loading start
        var loadingStart = function(obj){
            obj.button('loading');
            $.AMUI.progress.start();
        };

        //loading end
        var loadingEnd = function(obj){
            obj.button('reset');
            $.AMUI.progress.done();
        };

        //back btn
        var pkg_back = function(){
            $("#pkg_edit_back").click(function(){
                //loading start
                 var $btn = $(this);
                loadingStart($btn);

                location.href = document.referrer;
                return false;
            });
        };

        //修改包
        var pkg_modify = function(){
            $("#pkg_edit_submit").click(function(){
                //loading start
                 var $btn = $(this);
                loadingStart($btn);
                //验证
                var valid = true;
                var msg = "";
                //check app_name
                var F_app_name = $("#app_name").val();
                if(valid === true)
                {
                    if(typeof(F_app_name) == "undefined" || F_app_name.length <= 0)
                    {
						valid = false;
						msg = "应用名必须填写";
                    }
                }
                //ajax send
                if(valid === true && typeof(F_pkg) != "undefined" && F_pkg.length > 0)
                {
                    var senddata = new Array();
                    senddata[senddata.length] = "F_app_name="+F_app_name;
                    senddata[senddata.length] = "F_pkg="+F_pkg;
                   
                    $.ajax({
                        type: "POST",
                        url: pkg_modify_url,
                        data: senddata.join("&"),
                        success: function(msg){
                            //success
                            if(typeof(msg.error) != "undefined" && msg.error == 0)
                            {
                                location.href = document.referrer;
                            }
                            else{
                                 //loading end
                                loadingEnd($btn);
                                //show error
                                $("#my-alert-message").html(msg.msg);
                                $('#my-alert').modal('open');
                            }
                        }
                    });
                }
                else{
                    //loading end
                    loadingEnd($btn);
                    //show error
                    $("#my-alert-message").html(msg);
                    $('#my-alert').modal('open');
                }

                return false;
            });
        };

        //return obj
        var obj = {
            init:function(){pkg_modify();pkg_back();}
        };

        //return
        return obj;

    }(jQuery);

    //模块调用
    pkgEditModule.init();

});