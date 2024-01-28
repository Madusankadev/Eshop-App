function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();

    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("m", mobile.value);
    form.append("g", gender.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if(request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            
            if (response == "success") {
                document.getElementById("msg").innerHTML = "Reistration Success.";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);
}

function signIn() {
    var email = document.getElementById("email2");
    var password2 = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var form = new FormData();

    form.append("e", email.value);
    form.append("p", password2.value);
    form.append("r", rememberme.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                document.getElementById("msg1").innerHTML = "Reistration Success.";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgdiv1").className = "d-block";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgdiv1").className = "d-block";
            }
        }
    }

    request.open("POST", "signInProcess.php", true);
    request.send(form);
}