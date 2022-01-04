function game() {
    const playerTitle = document.querySelector(".playerTitle");
    const rematchBtn = document.querySelector(".rematch");
    const items = document.querySelectorAll(".item");
    const gridArray = Array.from(items);
    let tracking = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    let currentPlayer = "playerX";

    items.forEach((item) =>
      item.addEventListener("click", (e) => {
      
        const index = gridArray.indexOf(e.target);
        if (
          items[index].classList.contains("playerX") ||
          items[index].classList.contains("computer")
        ) {
          return;
        }
  
        items[index].classList.add("playerX");
        const s = tracking.indexOf(index + 1);
        
        tracking.splice(s, 1);
  
        if (winCheck("playerX", items)) { 
          playerTitle.innerHTML = "You Win!!"; 
          document.body.classList.add("over");
          setTimeout(function (){location.href="scorewin.php";}, 800);  
        
          return;
        }
 
        if (tracking.length === 0) {
          playerTitle.innerHTML = "It's Draw";
          document.body.classList.add("over");
          setTimeout(function (){location.href="tplayed.php";}, 800);  
          return;
        }
  
        console.log("computer move");
        const random = Math.floor(Math.random() * tracking.length);
        const computerIndex = tracking[random];
        items[computerIndex - 1].classList.add("computer");

        tracking.splice(random, 1);
        if (winCheck("computer", items)) {
          playerTitle.innerHTML = "You loss!!";
          document.body.classList.add("over");
          setTimeout(function (){location.href = "tplayed.php";}, 800);
        //location.href = "tplayed.php";
          return;
        }
      })
    ); 
    rematchBtn.addEventListener("click", () => {
      location.reload();
    });
  }

  function winCheck(player, items) {
    
    function check(pos1, pos2, pos3) {
      console.log(items);
      if (
        items[pos1].classList.contains(player) &
        items[pos2].classList.contains(player) &
        items[pos3].classList.contains(player)
      ) {
        return true;
      } else {
        return false;
      }
    }
  
    if (check(0, 3, 6)) return true;
    else if (check(1, 4, 7)) return true;
    else if (check(2, 5, 8)) return true;
    else if (check(0, 1, 2)) return true;
    else if (check(3, 4, 5)) return true;
    else if (check(6, 7, 8)) return true;
    else if (check(0, 4, 8)) return true;
    else if (check(2, 4, 6)) return true;
  }
  function count(count){
    return count++;
  }

  game();
  