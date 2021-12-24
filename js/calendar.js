document.addEventListener('DOMContentLoaded', function() {
let calendarEl = document.getElementById('calendar');

let calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
    left: 'prev',
    center: 'title',
    right: 'next',
    },
    selectable: true,
    selectMirror: true,
    eventConstraint:{
      start: '00:00', 
      end: '24:00', 
    },
    select: function(arg) {
      if (calendar.getEvents().length >= 1) {
        alert('You can only book for one day. Please remove any other days by clicking on the event in the calendar.');
      } else {
        const title = 'Today';
        calendar.addEvent({
        title: title,
        start: arg.start,
        allDay: arg.allDay,
        })
        calendar.unselect()
      }
    },
    eventClick: function(arg) {
    if (confirm('Are you sure you want to delete this event?')) {
        arg.event.remove()
    }
    },
    editable: true,
    events: [
      {
        title: 'Today',
        start: new Date().toISOString().slice(0, 10),
      }
    ]
});

calendar.render();

$('body').on('click', '.getEvents', function (e) {

  if (calendar.getEvents().length > 1) {
    alert('Please only have one event on the calendar.');
  } else {


  const date = calendar.getEvents()[0].startStr;
  console.log(calendar.getEvents()[0].startStr);
    
    $.ajax({
        method: "POST",
        url: "./ajax/calendar.php",
        dataType: 'json',
        data: {
            date: date
        }
      })
      .done(function(rtnData) {
        console.log(rtnData);
      })
    }
});
});
