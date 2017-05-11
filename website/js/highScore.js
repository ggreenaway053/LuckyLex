//works for the high score button. Animates three div's to move from left to right - btn disabled after use to stop weird movements


function highScores(){

var firstPlace = $('#firstPlace').offset().left;
var secondPlace = $("#secondPlace").offset().left;
var thirdPlace = $("#thirdPlace").offset().left;


$("#firstPlace").css({right:firstPlace}).animate({"left":"80%"}, "slow");
$("#secondPlace").css({right:secondPlace}).animate({"left":"20%"}, "slow");
$("#thirdPlace").css({right:thirdPlace}).animate({"left" :"50%"}, "slow");
  
  document.getElementById('highscoreBtn').disabled = true;
    }