<style>
.page{
   height:80vh;

}

</style>
<div class="page">
<h2>Javascriipt Button</h2>
<button type="click" onclick="clickMeButton()">click me</button>

<h2 id="timer"></h2>
<h2 id="bruhh"></h2>
<img src="../img/up.png" alt="" id="up" style="visibility: hidden">
<img src="../img/down.png" alt="" id="down" style="visibility: hidden">
<img src="../img/left.png" alt="" id="left" style="visibility: hidden">
<img src="../img/right.png" alt="" id="right" style="visibility: hidden">
<img src="../img/pressed.png" alt="" id="pressed" style="visibility: hidden">
</div>   
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    function clickMeButton(){
        var timeLeft = 30;
        var elem = document.getElementById('some_div');
        var timerId = setInterval(countdown, 250);
        
        function countdown() {
          if (timeLeft < 0) {
            clearTimeout(timerId);
        } else {
            s allo = LastInput();
            document.getElementById("timer").innerHTML = Math.floor(timeLeft) + ' seconds remaining';
            document.getElementById("bruhh").innerHTML = 1;
            doSomething();
            timeLeft = timeLeft - 0.25;
          }
        }
    }

    function setVisibility(up, down, left, right, pressed){
        document.querySelector("#up").style.visibility = up;
        document.querySelector("#down").style.visibility = down;
        document.querySelector("#left").style.visibility = left;
        document.querySelector("#right").style.visibility = right;
        document.querySelector("#pressed").style.visibility = pressed;
    }

    function doSomething(){
        var random = Math.floor(Math.random() * 5) + 1;
        var up = "hidden", down = "hidden", left = "hidden", right = "hidden", pressed = "hidden";

        switch(random){
            case 1:
                up = "visible";
                break;
            case 2:
                down = "visible";
                break;
            case 3:
                left = "visible";
                break;
            case 4:
                right = "visible";
                break;
            case 5:
                pressed = "visible";
                break; 
        }
        setVisibility(up, down, left, right, pressed);
    }
</script>
<?php



function LastInput(){
    $db = \Config\Database::connect();
    $input = $db->query('SELECT inputName, used FROM input ORDER BY id DESC LIMIT 1');
    $row = $input->getRow();

    if($row->used == 0)
        return $row->inputName;
    else
        return "used";
}
?>
