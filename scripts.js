function changeText(id){ 
    var weight = document.getElementById('weight-input').value;
    var reps = document.getElementById('reps-input').value;
    var time = document.getElementById('time-input').value;
     
     document.getElementById(id).value = ((reps*weight)/time);
}

function login(){
    
    var user = document.getElementById('user').value;
    var password= document.getElementById('password').value;
    var loginBox = document.getElementById('login-name-area');

    function clearBoxes(){
        document.getElementById('user').value = "";
        document.getElementById('password').value = "";
    }

    if ((user == "") && (password == "")){
        loginBox.value = "towdie";
        
       
    }
    else if ((user !== "")||(password !== "")){
        loginBox.value = "not recoginsed";
        
    }
    clearBoxes();
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}




// function ajax_post(){
//     // Create our XMLHttpRequest object
//     var hr = new XMLHttpRequest();
//     // Create some variables we need to send to our PHP file
//     var url = "my_parse_file.php";
//     var fn = document.getElementById("first_name").value;
//     var ln = document.getElementById("last_name").value;
//     var vars = "firstname="+fn+"&lastname="+ln;
//     hr.open("POST", url, true);
//     // Set content type header information for sending url encoded variables in the request
//     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     // Access the onreadystatechange event for the XMLHttpRequest object
//     hr.onreadystatechange = function() {
// 	    if(hr.readyState == 4 && hr.status == 200) {
// 		    var return_data = hr.responseText;
// 			document.getElementById("status").innerHTML = return_data;
// 	    }
//     }
//     // Send the data to PHP now... and wait for response to update the status div
//     hr.send(vars); // Actually execute the request
//     document.getElementById("status").innerHTML = "processing...";
// }
