function not_register() {
    location.href = "http://localhost/teishutsu/scheduler/calendar/";
}
function db_register(flag){
    if(flag == 0){
        location.href = "schedule.php";
    }
    else{
        alert("error");
    }
}
