/*
GAME RULES:

- The game has 2 players, playing in rounds
- In each turn, a player rolls a dice as many times as he whishes. Each result get added to his ROUND score
- BUT, if the player rolls a 1, all his ROUND score gets lost. After that, it's the next player's turn
- The player can choose to 'Hold', which means that his ROUND score gets added to his GLBAL score. After that, it's the next player's turn
- The first player to reach 100 points on GLOBAL score wins the game

*/
let scores,
  roundScore,
  activePlayer,
  gamePlaying,
  scoreHistory1,
  scoreHistory2,
  deleteScore;

init();

document.querySelector(".btn-roll").addEventListener("click", function() {
  if (gamePlaying) {
    //1. generate random number
    let dice = Math.floor(Math.random() * 6) + 1;
    let dice2 = Math.floor(Math.random() * 6) + 1;

    scoreHistory1.unshift(dice);
    scoreHistory2.unshift(dice2);

    console.log(scoreHistory1);
    console.log(scoreHistory2);

    if (
      (scoreHistory1[0] === 6 && scoreHistory1[1] === 6) &&
      (scoreHistory2[0] === 6 && scoreHistory2[1] === 6)
    ) {
      console.log("deletescore");
      deleteScore = "deletescore";
    }

    //2. Display the result
    let diceDOM = document.querySelector(".dice");
    let diceDOM2 = document.querySelector(".dice2");

    diceDOM.style.display = "block";
    diceDOM2.style.display = "block";
    diceDOM.src = "dice-" + dice + ".png";
    diceDOM2.src = "dice-" + dice2 + ".png";

    //3. Update the roundscore if the rolled

    if (dice > 1 && dice2 > 1 && deleteScore !== "deletescore") {
      //add score
      diceT = dice + dice2;
      roundScore += diceT;
      document.querySelector(
        "#current-" + activePlayer
      ).textContent = roundScore;
    } else if (deleteScore === "deletescore") {
      scores[activePlayer] = 0;
      document.querySelector("#score-" + activePlayer).textContent =
        scores[activePlayer];
      //next player
      nextPlayer();
    } else {
      //next player
      nextPlayer();
    }
  }
});

document.querySelector(".btn-hold").addEventListener("click", function() {
  if (gamePlaying) {
    // add current score to global score
    scores[activePlayer] += roundScore;

    // update the UI
    document.querySelector("#score-" + activePlayer).textContent =
      scores[activePlayer];

    //check if player won the game
    if (scores[activePlayer] >= winningGameScore) {
      document.querySelector("#name-" + activePlayer).textContent = "Winner!";
      document.querySelector(".dice").style.display = "none";
      document.querySelector(".dice2").style.display = "none";
      document
        .querySelector(".player-" + activePlayer + "-panel")
        .classList.add("winner");
      document
        .querySelector(".player-" + activePlayer + "-panel")
        .classList.remove("active");
      gamePlaying = false;
    } else {
      //next player
      nextPlayer();
    }
  }
});

function nextPlayer() {
  activePlayer === 0 ? (activePlayer = 1) : (activePlayer = 0);
  roundScore = 0;
  document.getElementById("current-0").textContent = "0";
  document.getElementById("current-1").textContent = "0";
  document.querySelector(".player-0-panel").classList.toggle("active");
  document.querySelector(".player-1-panel").classList.toggle("active");
  document.querySelector(".dice").style.display = "none";
  document.querySelector(".dice2").style.display = "none";
  scoreHistory1 = [];
  scoreHistory2 = [];
  deleteScore = "";
}

document.querySelector(".btn-new").addEventListener("click", init);

function init() {
  scores = [0, 0];
  activePlayer = 0;
  roundScore = 0;
  gamePlaying = true;
  if (document.getElementById("winninggamescore").value) {
    winningGameScore = document.getElementById("winninggamescore").value;
  } else {
    winningGameScore = 100;
  }

  scoreHistory1 = [];
  scoreHistory2 = [];
  deleteScore = "";
  document.querySelector(".dice").style.display = "none";
  document.querySelector(".dice2").style.display = "none";
  document.getElementById("score-0").textContent = "0";
  document.getElementById("current-0").textContent = "0";
  document.getElementById("score-1").textContent = "0";
  document.getElementById("current-1").textContent = "0";
  document.querySelector("#name-" + 0).textContent = "Player 1";
  document.querySelector("#name-" + 1).textContent = "Player 2";
  document.querySelector(".player-0-panel").classList.remove("winner");
  document.querySelector(".player-1-panel").classList.remove("winner");
  document.querySelector(".player-0-panel").classList.remove("active");
  document.querySelector(".player-1-panel").classList.remove("active");
  document.querySelector(".player-0-panel").classList.add("active");
}
