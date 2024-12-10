<style>
.img{
    max-width: 30px;
    max-height: 30px;
    padding: 5px;
}
.container{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    just
}
.gameBox{
    width:60%;
    height:60%;
}
</style>
<div class="container">
    <button type="click" onclick="clickMeButton()">Start Game</button>
    <h2 id="timer"></h2>
    <h2 id="bruhh"></h2>
    <div class="gameBox" id="gameBox">
    </div>
</div>


       
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    var inputs = [];
    var score;

    function clickMeButton(){
        var timeLeft = 5;
        var elem = document.getElementById('some_div');
        var timerId = setInterval(countdown, 1000);
        
        CreateInput();
        function countdown() {
          if (timeLeft < 0) {
            clearTimeout(timerId);
            GetAllInput();
            window.location.href = "ajax?score="+score;
        } else {
            document.getElementById("timer").innerHTML = Math.floor(timeLeft) + ' seconds remaining';
            timeLeft = timeLeft - 1;
          }
        }
    }

    function CreateInput(){
        var image;

        for(var i = 1; i <= 364; i++){
            var random = Math.floor(Math.random() * 5) + 1;
            switch(random){
                case 1:
                    inputs.push("up");
                    image = "../img/up.png";
                    break;
                case 2:
                    inputs.push("down");
                    image = "../img/down.png";
                    break;
                case 3:
                    inputs.push("left");
                    image = "../img/left.png";
                    break;
                case 4:
                    inputs.push("right");
                    image = "../img/right.png";
                    break;
                case 5:
                    inputs.push("pressed");
                    image = "../img/pressed.png";
                    break; 
            }
            var img = document.createElement('img');
            img.src = image;
            img.setAttribute("class", "img");
            document.getElementById('gameBox').appendChild(img);
        }
    }

    function GetAllInput(){
        $.ajax({
            method: "GET",
            url: "getdata",
            async : false,
            success: function (response) {
                score = CalculateScore(response.input);
            }
        });
    }

    function CalculateScore(playerInputs){
        var score = 0;
        for(var i = 0; i < inputs.length; i++){
            if(playerInputs[i] == null){
                break;
            }
            else{
                if(playerInputs[i].inputName == inputs[i]){
                    score = score + 1;
                }
            }
        }
        return score;
    }
</script>