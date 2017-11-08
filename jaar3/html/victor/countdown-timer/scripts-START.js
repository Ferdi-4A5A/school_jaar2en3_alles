var elements = document.querySelectorAll("[data-time]");
var x = 0;

for (var i = 0; i < elements.length; i++) {
    if (elements[i].getAttribute('data-time') != 'manual') {
        elements[i].addEventListener("click", function () {
            if (x === 1) {
                clearInterval(timeLeftInterval);
            }
            if (this.getAttribute('data-time') < 60) {
                minutes = 0;
                seconds = this.getAttribute('data-time');
            } else {
                minutes = this.getAttribute('data-time') / 60;
                seconds = 0;
            }
            countTime(minutes, seconds);
            x = 1;
        });
    } else if (elements[i].getAttribute('data-time') == 'manual') {
        elements[i].addEventListener("keypress", function(event) {
            if (x === 1) {
                clearInterval(timeLeftInterval);
            }
            if(event.keyCode === 13){
                event.preventDefault();
                minutes = elements[5].value;
                seconds = 0;
                countTime(minutes, seconds);
                x = 1;
            }
        });
    }
}

function countTime(minutes, seconds) {
    var timeLeft = document.querySelector(".display__time-left");
    var timeEnd = document.querySelector(".display__end-time");
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();

    // Time end control
    m += parseInt(minutes, 10);
    s += parseInt(seconds, 10);

    while (s >= 60) {
        s -= 60;
        m += 1;
        if (m >= 60) {
            m -= 60;
            h += 1;
            if (h >= 24) {
                h -= 24;
            }
        }
    }

    while (m >= 60) {
        m -= 60;
        h += 1;
        if (h >= 24) {
            h -= 24;
        }
    }

    // Time output pre-interval with fixed zero's (example: 1:4 -> 01:04)
    if (minutes > 99) {
        timeLeft.innerHTML = minutes + ":" + ('0' + seconds).slice(-2);
    } else if (minutes < 100) {
        timeLeft.innerHTML = ('0' + minutes).slice(-2) + ":" + ('0' + seconds).slice(-2);
    }
    timeEnd.innerHTML = ('0' + h).slice(-2) + ":" + ('0' + m).slice(-2) + ":" + ('0' + s).slice(-2);

    timeLeftInterval = setInterval(function(){
        // Time countdown control
        if (minutes !== 0 || seconds !== 0) {
            seconds--;
        }
        if (seconds === -1 && minutes !== 0) {
            seconds = 59;
            minutes--;
        }

        // Time left output
        if (minutes > 99) {
            timeLeft.innerHTML = minutes + ":" + ('0' + seconds).slice(-2);
        } else if (minutes < 100) {
            timeLeft.innerHTML = ('0' + minutes).slice(-2) + ":" + ('0' + seconds).slice(-2);
        }

        // Time stop
        if (seconds === 0 && minutes === 0) {
            clearInterval(timeLeftInterval);
        }
    }, 1000);
}