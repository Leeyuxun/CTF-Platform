function submitflag(id){
    var flag=$("#flag"+id).val();
    var qid=$("#qid"+id).val();
    var flagCode=$("#capcha"+id).val();
    $.post("checkflag.php", { "flag": flag,"qid": qid, "flagCode": flagCode},
       function(data){
            var data1=eval('(' + data + ')');
            if(data1.state=="nologin"){
                window.sessionStorage.username = "";
                alert("请先登录");
                window.location.href = "index.html";
                return false;
            }
            if(data1.state=="noteam"){
                alert("请先创建或加入一个队伍");
                window.location.href = "setteam.html";
                return false;
            }
            if(data1.state=="ok"){
                if(data1.check=="1"){
                    alert("一不小心被您答出来了");
                    window.location.href="question.html";
                }else{
                    alert("Flag错误");
                    window.location.href="question.html";
                }
            }else{
                alert(data1.state);
                $("#code"+id).attr("src","code.php?action=flag&num="+id+"&d="+Math.random());
            }
       });
}

$(function() {

    $.ajaxSetup({
        async : false
    });

    var questiondata;
    var questionnum;

    if(window.localStorage){
        var username=window.sessionStorage.getItem("username");
        if(username=="" || username==undefined){
            $("#username").html("你好，旅行者");
            alert("请先登录");
            window.location.href = "login.html";
            return false;
        }else{
            $("#username").html("你好，"+username);
        }
    }

    $('body').on('click', '#logout', function() {
        if(window.confirm('确定要注销登录吗T-T')){
            $.post("logout.php", function(data) {
                if (window.localStorage) {
                    window.sessionStorage.username = "";
                    window.location.href = "index.html";
                };

            });
        }});

    $.post("question.php",async=false,
        function(data) {
            var data1 = eval('(' + data + ')');
            if(data1.state=="nologin"){
                window.sessionStorage.username = "";
                alert("请先登录");
                window.location.href = "index.html";
                return false;
            }

            if (data1.state=="ok") {
                questiondata = data1.question;
                var $qstage = $("#qstage");
                var $question = $("#question");
                var questioninfo = data1.question;
                var web_count = 0;
                var pwn_count = 0;
                var mis_count = 0;
                var rev_count = 0;
                var cod_count = 0;
                questionnum = questioninfo.length;
                for (var i=0; i < questioninfo.length; i++)
                {
                    var color = "black";
                    var icon = "black";


                    if(questioninfo[i].type == "web"){
                        color = "orange";
                        icon = "web";
                        web_count += 1;
                    }else if(questioninfo[i].type == "pwn"){
                        color = "purple";
                        icon = "bug_report";
                        pwn_count += 1;
                    }else if(questioninfo[i].type == "rev"){
                        color = "blue";
                        icon = "adb";
                        rev_count += 1;
                    }else if(questioninfo[i].type == "misc"){
                        color = "red";
                        icon = "extension";
                        mis_count += 1;
                    }else if(questioninfo[i].type == "coding"){
                        color = "green";
                        icon = "code";
                        cod_count += 1;
                    }

                    $("#select_web").html("WEB "+"( "+web_count+" )");
                    $("#select_pwn").html("PWN "+"( "+pwn_count+" )");
                    $("#select_mis").html("MISC "+"( "+mis_count+" )");
                    $("#select_cod").html("CODING "+"( "+cod_count+" )");
                    $("#select_rev").html("REVERSE "+"( "+rev_count+" )");
                    $("#select_all").html("ALL "+"( "+(web_count+rev_count+mis_count+pwn_count+cod_count)+" )");

                    var qdone = "";

                    if(questioninfo[i].qdone == "1"){
                        qdone = " data-background-color='"+color+"'";
                        icon = "check";
                    }else{
                        qdone = "";
                    }

                    var $qsingle = $("<div id='card"+i+"' class='col-lg-3 col-md-6 col-sm-6'><div class='card card-stats'><div class='card-header' data-background-color='"+color+"' ><i class='material-icons'>"+icon+"</i></div><div class='card-content'"+qdone+"><h4 class='title'>"+questioninfo[i].name+"</h4><button class='btn btn-primary' data-toggle='modal' data-target='#q"+questioninfo[i].id+"' data-background-color='"+color+"'>查看</button></div><div class='card-footer'><div class='stats'><div class='col-lg-12 col-md-12 text-center'></div><div class='col-lg-12 col-md-12'><h4>分值：<a class='text-muted'><b>"+questioninfo[i].points+"</b></a>&#12288;&#12288;完成数：<a class='text-muted'><b>"+questioninfo[i].done+"</b></a></h4></div></div></div></div></div>");
                    $qstage.append($qsingle);

                    var qmodel = "<div class='modal fade' id='q"+questioninfo[i].id+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title text-center' id='myModalLabel'>"+questioninfo[i].name+"</h4></div><div class='modal-body text-center'><p>"+questioninfo[i].description+"</p><p class='catagory'><a href='"+questioninfo[i].attach+"'>"+questioninfo[i].attach+"</a></p><div class='col-lg-2 col-md-2 col-sm-2'></div><div class='col-lg-8 col-md-8 col-sm-8'><form class='form'><input type='hidden' value='"+questioninfo[i].id+"' class='form-control' id='qid"+questioninfo[i].id+"' style='display:none' /><div class='input-group'><span class='input-group-addon'><i class='material-icons'>flag</i></span><input type='text' placeholder='Flag' class='form-control' id='flag"+questioninfo[i].id+"' /></div><div class='input-group'><span class='input-group-addon'><i class='material-icons'>fingerprint</i></span><input type='text' class='form-control' placeholder='验证码' id='capcha"+questioninfo[i].id+"' /><span class='input-group-addon'><img src='' class='code img-raised' id='code"+questioninfo[i].id+"' style='width:60px;height:35px;'></span></div></div><div class='col-lg-2 col-md-2 col-sm-2'></div></div><div class='modal-footer'><div class='col-lg-12 col-md-12 col-sm-12 text-center'><br><button type='button' id='flagsubmit' class='btn btn-danger btn-simple' onclick='javascript:submitflag("+questioninfo[i].id+")'>提交</button></div></div></form></div></div></div>"
                    $("#question").append(qmodel);

                }
                for (var j=0; j < questioninfo.length; j++)
                {
                    $("#code"+questioninfo[j].id).attr("src","code.php?action=flag&num="+questioninfo[j].id+"&d="+Math.random());
                    $("#code"+questioninfo[j].id).click(function(){
                        $(this).attr("src","code.php?action=flag&num="+questioninfo[j].id+"&d="+Math.random());
                    });
                }

            } else {
                alert("会话过期或获取详细信息出错，请重新登录");
                if (window.localStorage) {
                    window.sessionStorage.username = "";
                    window.location.href = "login.html";
                    return false;
                };
            }
    });

    $("#select_web").click(function(){
        for (var i=0; i < questiondata.length; i++)
        {
            if(questiondata[i].type == "web"){
                hidename = "#card"+i;
                $(hidename).show();
            }else{
                hidename = "#card"+i;
                $(hidename).hide();
            }
        }
    });

    $("#select_pwn").click(function(){
        for (var i=0; i < questiondata.length; i++)
        {
            if(questiondata[i].type == "pwn"){
                hidename = "#card"+i;
                $(hidename).show();
            }else{
                hidename = "#card"+i;
                $(hidename).hide();
            }
        }
    });

    $("#select_rev").click(function(){
        for (var i=0; i < questiondata.length; i++)
        {
            if(questiondata[i].type == "rev"){
                hidename = "#card"+i;
                $(hidename).show();
            }else{
                hidename = "#card"+i;
                $(hidename).hide();
            }
        }
    });

    $("#select_mis").click(function(){
        for (var i=0; i < questiondata.length; i++)
        {
            if(questiondata[i].type == "misc"){
                hidename = "#card"+i;
                $(hidename).show();
            }else{
                hidename = "#card"+i;
                $(hidename).hide();
            }
        }
    });

    $("#select_cod").click(function(){
        for (var i=0; i < questiondata.length; i++)
        {
            if(questiondata[i].type == "coding"){
                hidename = "#card"+i;
                $(hidename).show();
            }else{
                hidename = "#card"+i;
                $(hidename).hide();
            }
        }
    });


    $("#select_all").click(function(){
        for (var i=0; i < questiondata.length; i++)
        {
            hidename = "#card"+i;
            $(hidename).show();
        }
    });

});
