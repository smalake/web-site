$(function(){
    $("#table_id td").click (function(){
        var td = $(this)[0];
        var tr = $(this).closest('tr')[0];
        //alert('td:'+ td.cellIndex);
        //alert('tr:'+tr.rowIndex);
        //alert($(this).text());
        //var php = {year: year,month: month,day:$(this).text()}
        if($(this).text() != 0){
            var php = 'year='+year+'&month='+month+'&day='+$(this).text(); 
            location.href = "display.php?"+php;
        }
    });
});