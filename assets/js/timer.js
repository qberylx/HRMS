let timer, currSeconds = 0;
  
function resetTimer() {

    /* Clear the previous interval */
    clearInterval(timer);

    /* Reset the seconds of the timer */
    currSeconds = 0;

    /* Set a new interval */
    timer = 
        setInterval(startIdleTimer, 1000);
    
    /*close moadl*/
    $('#modal-danger').modal('hide')
}

// Define the events that
// would reset the timer
window.onload = resetTimer;
window.onmousemove = resetTimer;
window.onmousedown = resetTimer;
window.ontouchstart = resetTimer;
window.onclick = resetTimer;
window.onkeypress = resetTimer;

function startIdleTimer() {
        
    /* Increment the
        timer seconds */
    currSeconds++;

    if (currSeconds == 1140) {
        $('#modal-danger').modal('show')
        //window.location.href = base_url+"/login/logout";
    }

    if (currSeconds >= 1140) {
        $("#modalExpiredSec").html(1200-currSeconds)
        if (currSeconds == 1200) {
            window.location.href = "../login/logout";
        }
    }
}