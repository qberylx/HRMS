let timer, currSeconds = 0;
  
function resetTimer() {

    /* Hide the timer text */
    document.querySelector(".timertext")
            .style.display = 'none';

    /* Clear the previous interval */
    clearInterval(timer);

    /* Reset the seconds of the timer */
    currSeconds = 0;

    /* Set a new interval */
    timer = 
        setInterval(startIdleTimer, 1000);
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

    /* Set the timer text
        to the new value */
    document.querySelector(".secs")
        .textContent = currSeconds;

    /* Display the timer text */
    document.querySelector(".timertext")
        .style.display = 'block';

    if (currSeconds == 1200) {
        $('#modal-danger').modal('show')
        //window.location.href = base_url+"/login/logout";
    }
}