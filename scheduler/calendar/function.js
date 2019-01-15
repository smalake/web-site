var dayCheck = 0;

$( function() {
    $( "#datepicker" ).datepicker();
} );
$(function(){
    $('#start_hour').spinner({
        max: 24,
        min: 0,
        step: 1
    });
});
$(function(){
    $('#start_minute').spinner({
        max: 59,
        min: 0,
        step: 1
    });
});
$(function(){
    $('#end_hour').spinner({
        max: 24,
        min: 0,
        step: 1
    });
});
$(function(){
    $('#end_minute').spinner({
        max: 59,
        min: 0,
        step: 1
    });
});
function connecttext( textid, ischecked ) {
    if( ischecked == true ) {
        // チェックが入っていたら有効化
        document.getElementById("allday").style.display = "none";
        dayCheck = 1;
    }
    else {
        // チェックが入っていなかったら無効化
        document.getElementById("allday").style.display = "block";
        dayCheck = 0;
    }
}
function not_register() {
    history.back();
}
function db_register(flag){
    if(flag == 0){
        location.href = "schedule.php";
    }
    else{
        var start = ('00' + document.getElementById("start_hour").value).slice(-2) +":"+ ('00' + document.getElementById("start_minute").value).slice(-2);
        var end = ('00' + document.getElementById("end_hour").value).slice(-2) +":"+ ('00' + document.getElementById("end_minute").value).slice(-2);
        var schedule = document.scheduleForm.schedule.value;
        var other = document.scheduleForm.other.value;
        var dvalue = document.getElementById("datepicker").value;

        $.ajax({
            type: "POST",
            url: "db_register.php",
            data: {start: start, end: end, schedule: schedule, other: other,check: dayCheck, dvalue: dvalue},
        });
        alert("登録完了しました！");
        location.href = "http://localhost/teishutsu/scheduler/calendar/";
    }

}