$(function(){


	// The new year is here! Count towards something else.
	// Notice the *1000 at the end - time must be in milliseconds
	$.get('gettime.php',function (data) {
        var data1 = eval('(' + data + ')');
        if(data1.state=="ok"){
            var time = data1.time;
            var now = new Date();
            var st = new Date(time.starttime);
            var et = new Date(time.endtime);
            if(now<st){
                $("#timeflag").html("距离TSCTF2018初赛开始还有");
                $('#countdown').countdown({
                    timestamp	: st,
                    callback	: function(days, hours, minutes, seconds){
                    }
                });
            }
            else{
                $("#timeflag").html("距离TSCTF2018初赛结束还有");
                $('#countdown').countdown({
                    timestamp	: et,
                    callback	: function(days, hours, minutes, seconds){
                    }
                });
            }

        }
    })
});
