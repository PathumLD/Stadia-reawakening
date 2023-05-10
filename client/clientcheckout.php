<script>
$(document).ready(function() {
  var loggedInUserEmail = "<?php echo $_SESSION['email']; ?>";
  var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
      left:'prev,next today',
      center:'title',
      right:'agendaWeek,month'
    },
    defaultView: 'agendaWeek',
    events: 'slotsbadminton1load.php',
    views: {
      month: {
        selectable: false
      },
      agenda: {
        slotDuration: '01:00:00',
        slotLabelInterval: '01:00:00',
        minTime: '07:00:00',
        maxTime: '22:00:00'
      }
    },
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay) {
      var today = moment().startOf('day');
      var now = moment();

      // check if the selected start time is before the current time + 30 minutes
      var threshold = moment().add(30, 'minutes');
      if (start < threshold) {
        alert("Cannot add event for past or current time slots.");
        return;
      }

      // check if the selected start time is within the next 3 months
      var maxDate = moment().add(3, 'months');
      if (start > maxDate) {
        alert("Cannot add event more than 3 months in advance.");
        return;
      }

      var numSlots = parseInt(prompt("Enter the number of consecutive slots you want to book:"));
      if (isNaN(numSlots) || numSlots <= 0) {
        alert("Please enter a valid number of slots.");
        return;
      }

      var title = prompt("Enter Your Name");
      if (!title) {
        return;
      }

      for (var i = 0; i < numSlots; i++) {
        var slotStart = moment(start).add(i, 'hours').startOf('hour');
        var slotEnd = moment(slotStart).add(1, 'hour');

        var slotTitle = title + ' - Slot ' + (i + 1) + ' of ' + numSlots;
        var slotStartDate = $.fullCalendar.formatDate(slotStart, "Y-MM-DD HH:mm:ss");
        var slotEndDate = $.fullCalendar.formatDate(slotEnd, "Y-MM-DD HH:mm:ss");

        $.ajax({
          url:"slotsbadminton1insert.php",
          type:"POST",
          data:{title:slotTitle, start:slotStartDate, end:slotEndDate},
          success:function() {
            calendar.fullCalendar('refetchEvents');
          }
        });
      }

      alert("Slots booked successfully.");
    },

    editable:true,
    eventResize:function(event) {
      if (event.email !== loggedInUserEmail) {
        alert("You are not authorized to edit this event.");
        calendar.fullCalendar('refetchEvents');
        return;
      }

      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.start.add(1, 'hour'), "Y-MM-DD HH:mm:ss");
      var title = event.title;
      var id = event.id;

      // check if the new start time is before the current time + 30 minutes
      var threshold = moment().add(30, 'minutes');
      if (event.start < threshold) {
        alert("Cannot
