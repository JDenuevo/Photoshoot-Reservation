<style scoped>
  #calendar {
    max-width: 100%;
    margin: 0 auto;
  }
</style>

</head>

<body>

  <div id='calendar'></div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var today = moment().format('YYYY-MM-DD'); // Get current date in YYYY-MM-DD format

      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialDate: today, // Set initial date to current date
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function(arg) {
          var title = prompt('Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          calendar.unselect()
        },
        eventClick: function(arg) {
          if (confirm('Are you sure you want to delete this event?')) {
            arg.event.remove()
          }
        },
        editable: true,
        dayMaxEvents: true,
        events: []
      });

      calendar.render();

      // Override the text of the "month view" button with an icon
      var monthButton = calendarEl.querySelector('.fc-dayGridMonth-button');
      monthButton.innerHTML = '<i class="ti ti-table"></i> View in Table ';

      // Override the text of the "week view" button with an icon
      var weekButton = calendarEl.querySelector('.fc-timeGridWeek-button');
      weekButton.innerHTML = '<i class="ti ti-calendar-event"></i> View in Calendar ';
    });
  </script>

</body>


</html>
