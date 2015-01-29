$(document).ready(function(){
    //模块定义
    var pkgAddModule = function($){

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
            $("#pkg_add_back").click(function(){
                //loading start
                var $btn = $(this);
                loadingStart($btn);

                location.href = document.referrer;
                return false;
            });
        };

        //添加pkg
        var pkg_add = function(){
			$("#pkg_add_submit").click(function(){
				//loading start
				var $btn = $(this);
				loadingStart($btn);
				//验证
				var valid = true;
				var msg = "";
				//check pkg_name
				var F_pkg = $("#pkg_name").val();
				if(valid === true)
				{
					if(typeof(F_pkg) == "undefined" || F_pkg.length <= 0)
					{
						valid = false;
						msg = "包名必须填写";
					}
				}
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
				if(valid === true)
				{
					var senddata = new Array();
					senddata[senddata.length] = "F_pkg="+F_pkg;
					senddata[senddata.length] = "F_app_name="+F_app_name;
					$.ajax({
						type: "POST",
						url: pkg_add_url,
						data: senddata.join("&"),
						success: function(msg){
							//success
							if(typeof(msg.error) != "undefined" && msg.error == 0)
							{
								top.location.href  = list_url;
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
			});
        };

        //return obj
        var obj = {
            init:function(){pkg_add();pkg_back();}
        };

        //return
        return obj;

    }(jQuery);

    //模块调用
    pkgAddModule.init();

});