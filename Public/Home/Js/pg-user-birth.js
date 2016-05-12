//  年月日三级联动 start
$(function () {
    var  month = $("#month"),
        year = $("#year");
    var currentYear = $("input[name='currentYear']").val(),
        currentMonth = $("input[name='currentMonth']").val(),
        currentDay = $("input[name='currentDay']").val();
		
		 if(currentYear==1970 && currentMonth==01 && currentDay== 01){
		 currentYear='';
		 currentMonth='';
		 currentDay='';
	 }
	
    //初始化年
    var dDate = new Date(),
        tYeare = dDate.getFullYear(),
        str_y = "<option value='请选择' selected=true>请选择</option>";
			var dCurYear = currentYear == ''?'':currentYear;
			
	
    for (var i = tYeare-99; i < tYeare + 1; i++) {
        if (i == dCurYear) {
            str_y += "<option value=" + i + " selected=true>" + i + "</option>";
        } else {
            str_y += "<option value=" + i + ">" + i + "</option>";
        }
        
    }
	
	year.append(str_y);
	 str_m = "<option value='请选择' selected=true>请选择</option>";
	
    //初始化月
    for (var i = 1; i <= 12; i++) {
        var dMonth = currentMonth =='' ? '' :currentMonth;
        if (i == dMonth) {
            str_m += "<option value=" + i + " selected=true>" + i + "</option>";
        } else {
            str_m += "<option value=" + i + ">" + i + "</option>";
        }
        
    }
	month.append(str_m);
    //调用函数出始化日
    TUpdateCal(year.val(), month.val());
    $("#year,#month").bind("change", function(){
        TUpdateCal(year.val(),month.val());
    });
   //根据年月获取当月最大天数
    function TGetDaysInMonth(iMonth, iYear) {
        var dPrevDate = new Date(iYear, iMonth, 0);
        return dPrevDate.getDate();
    }
    function TUpdateCal(iYear, iMonth) {
        var dDate = new Date(),
            dDay,
            daysInMonth = TGetDaysInMonth(iMonth, iYear),
            str_d = "<option value='请选择' selected=true>请选择</option>";
        dDay = currentDay == '' ? '' :currentDay;
        $("#day").empty();
        for (var d = 1; d <= parseInt(daysInMonth); d++) {
            if (d == dDay) {
                str_d += "<option value=" + d + " selected=true>" + d + "</option>";
            } else {
                str_d += "<option value=" + d + ">" + d + "</option>";
            }
           
        }
		 $("#day").append(str_d);
    }
    //  年月日三级联动 end
});