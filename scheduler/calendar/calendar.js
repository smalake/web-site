
var date = new Date();

var year = date.getFullYear();
var month = date.getMonth() + 1;
var weekStr = [ "日", "月", "火", "水", "木", "金", "土" ];


//今月の1日の曜日を出力
//alert(weekStr[getDate.getDay()]);

function calendar(){
    var setDate = year + "/" + month + "/" + "1";
    var getDate = new Date(setDate);
    var endDay = 31;
    //月末が何日か確認
    if((month == 4) || (month == 6) || (month == 9) || (month == 11)){
        endDay = 30;
    }
    else if(month == 2){
        if(year % 4 == 0){
            endDay = 29;
        }
        else{
            endDay = 28;
        }
    }
    $.ajax({
        type: "POST",
        url: "schedule_on.php",
        data: {year: year, month: month},
    });
    var week = 0;
    var today = 1;
    var table = document.getElementById("table_id"); 
    for(var i = 1; i<7; i++){
        for(var j = 0; j<7; j++){
            if(today <= endDay){
                if((today != 1) || (today == 1 && week == getDate.getDay())){
                    table.rows[i].cells[j].innerHTML = today;
                    today++;
                }
                else{
                    table.rows[i].cells[j].innerHTML = "";
                    if(week == 6){
                        week = 0;
                    }
                    else{
                        week++;
                    }
                }
            }
            else{
                table.rows[i].cells[j].innerHTML = "";
            }
        }

    }
    var year_month = '&nbsp;'+String(year) + '年' + ('00' + String(month)).slice(-2) + '月&nbsp;';
    var calendar_top = document.getElementById("top_year");
    calendar_top.innerHTML = year_month;
}

$(function(){
    $("#before").click(function(){
        if(month == 1){
            month = 12;
            year -= 1;
        }
        else{
            month -= 1;
        }
        calendar();
    });
});

$(function(){
    $("#next").click(function(){
        if(month == 12){
            month = 1;
            year += 1;
        }
        else{
            month += 1;
        }
        calendar();
    });
});

function schedule_on(dayCheck){
    var table = document.getElementById("table_id");
        for(var i=1; i<7; i++){
            for(var j=0; j<7; j++){
                if(table.rows[i].cells[j].value == dayCheck){
                    alert(dayCheck);
                    table.rows[i].cells[j].classList.add("schedule_on");
                    break;
                   }
            }
        }
}