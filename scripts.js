function calculatePf() {
    var results = document.getElementById('pfresult');
    var weight = parseInt(document.getElementById('weight-input').value);
    var reps = parseInt(document.getElementById('reps-input').value);
    var time = parseInt(document.getElementById('time-input').value);

    if ((isNaN(weight)) || (isNaN(reps)) || (isNaN(time))) {
        alert('you are missing a number..');
        return;
    } else {
        results.value = Math.round((reps * weight) / time);
    }
}

function getText(file, id) {
    var xhr = new XMLHttpRequest();
    var element = document.getElementById(id);
    xhr.open('GET', file, true);
    xhr.onload = function () {
        if (this.status === 200) {
            element.innerHTML = xhr.responseText;
        } else {
            element.innerHTML = "couldn't get the text";
        }
    };
    xhr.send();
}

function showEventMessage(message) {
    var messageArea = document.getElementById('event-message');
    messageArea.innerHTML = message;
    setTimeout(function () {
        messageArea.innerHTML = "";
    }, 4000);
}

function clearBoxes() {
    document.getElementById('user').value = "";
    document.getElementById('password').value = "";
    document.getElementById('userreg').value = "";
    document.getElementById('passwordreg').value = "";
    document.getElementById('passwordreg2').value = "";
}

function ajaxlogin(event) {
    event.preventDefault();

    var user = document.getElementById('user').value;
    var eventMessage = document.getElementById('event-message');
    var password = document.getElementById('password').value;
    var loginBox = document.getElementById('login-name-area');
    var loginBoxTwo = document.getElementById('login-name-area-two');
    var params = "user=" + user + "&password=" + password;
    var xhr = new XMLHttpRequest();

    if (user == "") {
        alert('You need to enter a username and password...');
        return;
    }

<<<<<<< HEAD
    xhr.open('POST', 'setsession.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.status === 200) {

            loginBox.value = xhr.responseText;
            loginBoxTwo.value = xhr.responseText;
            eventMessage.innerHTML = xhr.responseText;
            setTimeout(function () {
                eventMessage.innerHTML = "";
            }, 3000);
            clearBoxes();
        }
    };
    xhr.send(params);
}

function ajaxSaveResultsToDatabase(event) {
    event.preventDefault();

    var userLoginArea = document.getElementById('login-name-area');
    var user = document.getElementById('login-name-area').value;
    var pfresult = document.getElementById('pfresult').value;
    var date = document.getElementById('date-selector').value;
    var workout = document.getElementById('workout-type').value;
    var weight = document.getElementById('weight-input').value;
    var reps = document.getElementById('reps-input').value;
    var time = document.getElementById('time-input').value;
    var params = "user=" + user + "&pfresult=" + pfresult + "&date=" + date + "&workout=" + workout + "&weight=" + weight + "&reps=" + reps + "&time=" + time;

    if ((weight == "") || (reps == "") || (time == "")) {
        alert('you are missing a number..');
        return;
    }

    if (pfresult == "") {
        alert('You need to calculate your PF before saving results...');
        return;
    }

    if (!date) {
        alert('You need to choose a date');
        return;



    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'insertdata.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.status === 200) {

            alert(xhr.responseText);
        }
    };
    xhr.send(params);
}

function ajaxLogOut() {

    var loginBox = document.getElementById('login-name-area');
    var loginBoxTwo = document.getElementById('login-name-area-two');

    if (loginBox.value == "") {
        alert('Nobody is logged in..');
        return;
    } else {
        if (confirm('Are you sure you want to log out?')) {
            var xhr = new XMLHttpRequest();

            xhr.open('POST', 'unsetsession.php', true);
            xhr.onload = function () {
                if (this.status == 200) {
                    loginBox.value = "";
                    loginBoxTwo.value = "";
                    // document.getElementById('login-message-area').value = "";
                    document.getElementById('event-message').innerHTML = "";
                }
            };
            xhr.send();
        } else {
            return;
        }
    }
}

function showSession(id, id2) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'viewsessiondata.php', true);
    xhr.onload = function () {
        if (this.status === 200) {
            document.getElementById(id).value = xhr.responseText;

            if (id2 != undefined) {
                document.getElementById(id2).value = xhr.responseText;
            }
        }

    };
    xhr.send();
}

function getCookie(cookiename) {

    var name = cookiename + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieArray = decodedCookie.split(';');

    for (var i = 0; i < cookieArray.length; i++) {
        var cookie = cookieArray[i];
        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name) == 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }
    return "";
}

function ajaxGetPreviousResults(event) {
    event.preventDefault();

    var workout = document.getElementById('workout-old').value;
    var user = document.getElementById('login-name-area-two').value;
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'recoverdata.php?workout-old=' + workout + '&login-name-area-two=' + user, true);
    xhr.onload = function () {
        if (this.status === 200) {
            document.getElementById('previous-results').innerHTML = xhr.responseText;
        }
    };
    xhr.send();

}

function clearList() {

    document.getElementById('previous-results').innerHTML = "";

}

function ajaxRegisterUser(event) {
    event.preventDefault();

    var regMessage = document.getElementById('event-message');
    var user = document.getElementById('userreg').value;
    var password = document.getElementById('passwordreg').value;
    var password2 = document.getElementById('passwordreg2').value;

    if (password === password2) {
        var params = "user=" + user + "&password=" + password;
        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'registeruser.php', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (this.status === 200) {

<<<<<<< HEAD
                showEventMessage(xhr.responseText);
            }
        };
        xhr.send(params);
        clearBoxes();
    } else {
        alert('passwords do not match');
    }

}

function startStopCountdown(arg) {
    var button = document.getElementById('timer-button');
    var time = document.getElementById('countdown-duration').value;
    var timer = document.getElementById('timer-display');



    var ticker = setInterval(function () {
        time = time - 1;
        timer.innerHTML = time;
        if (timer.innerHTML == 0) {
            clearInterval(x);
            button.removeAttribute('onclick', "startStopCountdown('stop')");
            button.setAttribute('onclick', "startStopCountdown('start')");
            button.removeAttribute('class', 'stop-button');
            button.setAttribute('class', 'btn btn-primary btn-block');
        button.innerHTML = "Start Timer";
            
        }
    }, 1000);


    if (arg == 'start') {
        button.removeAttribute('onclick', "startStopCountdown('start')");
        button.setAttribute('onclick', "startStopCountdown('stop')");
        button.setAttribute('class', 'btn btn-block stop-button');
        button.innerHTML = "Stop Timer";
        timer.innerHTML = time;





    } else {
        for (i = 0; i < 100; i++) {
            window.clearInterval(i);
        }
        timer.innerHTML = 0;
        button.removeAttribute('onclick', "startStopCountdown('stop')");
        button.setAttribute('onclick', "startStopCountdown('start')");
        button.removeAttribute('class', 'stop-button');
        button.setAttribute('class', 'btn btn-primary btn-block');
        button.innerHTML = "Start Timer";
        
    }
}


