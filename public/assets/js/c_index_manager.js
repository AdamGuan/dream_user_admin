$(document).ready(function(){
    //模块定义
    var indexModule = function($){

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

		//checkbox选择
        var pkg_select = function(){
            $("#pkg_select").click( function () {
                var num = $(this).data("num");
                if(typeof(num) == 'undefined' || num == 0)
                {
                    $("input[id^='pkg_check']").prop("checked",true);
                    $(this).data("num",1);
                }
                else
                {
                    $("input[id^='pkg_check']").prop("checked",false);
                    $(this).data("num",0);
                }
            });
        };
		
		//edit
		var edit = function(){
			//编辑
            $("button[id^='pkg_edit']").click( function() {
                //loading start
                var $btn = $(this);
                loadingStart($btn);

                location.href = $btn.attr("url");
                return false;
            });

            //编辑
            $("a[id^='pkg_edit']").click( function() {
                //loading start
                var $btn = $(this);
                loadingStart($btn);

                location.href = $btn.attr("url");
                return false;
            });
		};

        //search
        var search = function(){
            $("#search_btn_search").click(function(){
                //loading start
                var $btn = $(this);
                loadingStart($btn);

                var url = location.href;
                var list = url.split("?");
                var url_pref = list[0];
                var url_parames = new Array();
                if(list.length == 1)
                {
                }
                else if(list.length == 2)
                {

                    if(list[1].length > 0)
                    {
                        var tmp_list = list[1].split("&");
                        var j = 0;
                        for(var i=0;i<tmp_list.length;++i)
                        {
                            var tlist = tmp_list[i].split("=");
                            if(tlist[0] != "search" && tlist[0] != "page")
                            {
                                url_parames[j] = tlist[0]+"="+tlist[1];
                                ++j;
                            }
                        }
                    }
                }

                if(url_parames.length > 0)
                {
                    if($("#search_text").val().length > 0)
                    {
                        url = url_pref+"?"+url_parames.join("&")+"&";
                    }
                    else{
                        url = url_pref+"?"+url_parames.join("&");
                    }
                }
                else{
                    if($("#search_text").val().length > 0)
                    {
                        url = url_pref+"?";
                    }else{
                        url = url_pref;
                    }
                }
                if($("#search_text").val().length > 0)
                {
                    url += "search="+$("#search_text").val();
                }
                location.href= url;
                return false;

            });
        };

		var pkg_delete = function(){
			//删除
            $("#pkgs_delete").click( function() {
                var $btn = $(this);
                $("#my-confirm-msg").html("确定删除?");
                $('#my-confirm').modal({
                    relatedTarget: this,
                    onConfirm: function(options) {
                         //loading start
                        loadingStart($btn);
                        //get pkgs
                        var pkg_list = new Array();
                        var obj = $("input[id^='pkg_check']:checked");
                        for(var i=0;i<obj.length;++i)
                        {
                            pkg_list[i] = $(obj[i]).attr("F_pkg");
                        }
                        var pkgs = pkg_list.join(",");

                        $.ajax({
                            type: "GET",
                            url: pkg_delete_uri,
                            data: "F_pkg="+pkgs,
                            success: function(msg){
                                msg = eval(msg);
                                if(typeof(msg.result) != "undefined" && msg.result)
                                {
                                    location.reload();
                                }
                                else{
                                    location.reload();
                                }
                            }
                        });
                    },
                    onCancel: function() {
                    }
                });
                return false;
            });
		};

		var pkg_add = function(){
			//添加
            $("#pkg_add").click( function() {
                location.href = $(this).attr("url");
                return false;
            });
		};

        //return obj
        var obj = {
            init:function(){edit();pkg_select();search();pkg_delete();pkg_add();}
        };

        //return
        return obj;

    }(jQuery);

    //模块调用
    indexModule.init();
});