$(document).ready(function(){          
    $('#calendar').fullCalendar({
        locale:'fr',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        columnFormat:'dddd',
        themeSystem:'bootstrap4',
        events:'./json/all_events_published.json'
    });
});