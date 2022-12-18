<input id="timer" value="<?php echo $timer;?>" hidden>
<div class="w-full bg-gray-400 fixed mt-20 sm:mt-24 h-full">
    <h1 class="pt-4 text-center bg-gray-600 text-3xl text-white mt-5 font-semibold underline p-5">Tableau des scores</h1>
    <div class="flex pt-5 ">
        <p class="text-white mx-5 text-2xl">Temps restant : </p>
    <p class="text-white text-3xl" id="timerDisplay"></p>
    </div>
    <div class="mt-8 w-auto mx-5">
    <table class="table-fixed bg-red-500 mx-auto w-full">
  <thead class="h-16 bg-gray-900">
  <th class="text-center text-white">
                    Position
                </th>
                <th class="text-white">
                  Nom d'équipe
                </th>
                <th class="text-white">
                  Badge
                </th>
                <th class="text-white">
                    Scores
                </th>
  </thead>
  <tbody class="tabScore shadow-lg">
    
  </tbody>
</table>
    </div>

</div>
<script src="js/ajax.js"></script>

<script>
    var seconds = $('#timer').val();

    startTimer(seconds);

    function startTimer(duration) {
  var timer = duration, days, hours, minutes, seconds;
  setInterval(function () {
      hours = parseInt((timer % (60 * 60 * 24)) / (60 * 60), 10);
      minutes = parseInt((timer % (60 * 60)) / 60, 10);
      seconds = parseInt(timer % 60, 10);

      hours = hours < 10 ? "0" + hours : hours;
      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      $('#timerDisplay').html( hours + ":" + minutes + ":" + seconds);

      if (--timer < 0) {
          console.log("Finished!");
          timer = duration;
      }
  }, 1000);


}
</script>
