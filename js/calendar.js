document.addEventListener('DOMContentLoaded', function() {
let calendarEl = document.getElementById('calendar');

let calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    navLinks: true,
    selectable: true,
    selectMirror: true,
    eventLimit: true,

    select: function(arg) {
        const title = 'Hire period';
        calendar.addEvent({
        title: title,
        start: arg.start,
        end: arg.end,
        allDay: arg.allDay,
        })
        calendar.unselect()
    },
    eventClick: function(arg) {
    if (confirm('Are you sure you want to delete this event?')) {
        arg.event.remove()
    }
    },
    editable: true,
    events: []
});

calendar.render();



$('body').on('click', '.getEvents', function (e) {
    
    const getDates = ((startDate, endDate) => {
        const dates = [];
        let currentDate = startDate;
        const addDays = function (days) {
          const date = new Date(this.valueOf());
          date.setDate(date.getDate() + days);
          return date;
        }
        while (currentDate < endDate) {
          dates.push(currentDate.toISOString().split('T')[0]);
          currentDate = addDays.call(currentDate, 1);
        }
        return dates;
    });
    
    const startDate = calendar.getEvents()[0]['start'];
    const endDate = new Date(calendar.getEvents()[0]['end']);

    const selectedDates = getDates(startDate, endDate);

    $.ajax({
        method: "POST",
        url: "./ajax/calendar.php",
        dataType: 'json',
        data: {
            selectedDates: selectedDates
        }
      })
      .done(function(rtnData) {
        console.log(rtnData);
      })
});
});
