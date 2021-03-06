﻿$.datepicker.setDefaults({
    dateFormat: 'yy-mm-dd',
    prevText: 'Previous Month',
    nextText: 'Next Month',
    changeYear: true, //콤보박스에서 년 선택 가능
    changeMonth: true, //콤보박스에서 월 선택 가능
    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    monthNamesShort: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    dayNames: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    dayNamesShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    
    /*dayNamesShort: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
    dayNamesMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],*/
    /*dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
    dayNamesShort: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
    dayNamesMin: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],*/
    showMonthAfterYear: true,
    yearSuffix: ' / ',
    yearRange: "1950:2030"
});

$(function() {
    $( "#datepicker1, #datepicker2" ).datepicker();
});
