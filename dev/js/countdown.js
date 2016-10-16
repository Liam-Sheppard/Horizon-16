
  function timeLeft(endtime) {
    var t = Date.parse(eventDate) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
      'total': t,
      'days': days,
      'hours': hours,
      'minutes': minutes,
      'seconds': seconds
    };
  }

  function startCountdown(id, endtime) {
    var clock = $('#countdown');
    var daysSpan = $('#countdownDays');
    var hoursSpan = $('#countdownHours');
    var minutesSpan = $('#countdownMinutes');
    var secondsSpan = $('#countdownSeconds');

    function updateCountdown() {
      var t = timeLeft(eventDate);

      daysSpan.text(t.days);
      hoursSpan.text(('0' + t.hours).slice(-2));
      minutesSpan.text(('0' + t.minutes).slice(-2));
      secondsSpan.text(('0' + t.seconds).slice(-2));

      if (t.total <= 0) {
        clearInterval(timeinterval);
      }
    }

    updateCountdown();
    var timeinterval = setInterval(updateCountdown, 1000);
  }

  var eventDate = 'November 09 2016 18:00:00 GMT+1000';

  var t = Date.parse(eventDate) - Date.parse(new Date());

  startCountdown('countdown', eventDate);
