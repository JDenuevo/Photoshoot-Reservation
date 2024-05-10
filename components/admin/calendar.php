
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
  var eventsData = []; // Define empty array to hold event data

  // Fetch reservation data from API
  $.ajax({
    url: '../api/reservation/getDateTimeReservation.php',
    type: 'GET',
    success: function(response) {
      // Update eventsData with fetched reservation data
      eventsData = response.datetimeOccupied;
      // Render calendar after fetching data
      renderCalendar();
    },
    error: function(xhr, status, error) {
      console.error('Error fetching data:', error);
    }
  });

  // Function to render FullCalendar with fetched data
// Function to render FullCalendar with fetched data
function renderCalendar() {
  var calendar = new FullCalendar.Calendar(calendarEl, {
    eventDisplay: 'block', // Display the event as a block element, showing the title, start time, and end time
  eventTimeFormat: { hour: 'numeric', minute: '2-digit', omitZeroMinute: false },
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    initialDate: today,
    navLinks: true,
    selectable: true,
    selectMirror: true,
    dayMaxEvents: true,
    events: eventsData.map(function(event) { // Map eventsData to include both start and end times
      return {
 title :'reserve',
    start: event.start, // Start time
    end: event.end, // End time
};

    })
  });

  calendar.render();

  // Override the text of the "month view" button with an icon
  var monthButton = calendarEl.querySelector('.fc-dayGridMonth-button');
  monthButton.innerHTML = '<i class="ti ti-table"></i> View in Table ';

  // Override the text of the "week view" button with an icon
  var weekButton = calendarEl.querySelector('.fc-timeGridWeek-button');
  weekButton.innerHTML = '<i class="ti ti-calendar-event"></i> View in Calendar ';
}

});
</script>


</body>


</html>
