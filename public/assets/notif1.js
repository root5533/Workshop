
function myfunction() {
    document.getElementById('title').innerHTML = Date();
}

function loadDoc() {
    console.log("loadDoc call")
    var x = document.getElementById("notification");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    load_notification("yes");
}

function load_notification(view='') {
    console.log("loading notifications");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
//                console.log(data);
            document.getElementById("notification").innerHTML = data.notification;
            if (data.unseen_notification > 0) {
                document.getElementById("count").innerHTML = data.unseen_notification;
            }
            else{
                document.getElementById("count").innerHTML = '';
            }
        }
    };

    xhttp.open("POST", "/wshop/public/notificationCon/openJob", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("view="+view);


    // summmeeddhhaaaaaaa
    // var data = {'titile' : 'mytitile', 'content' : 'mycontent'};
    //
    // var div = document.createElement('div');
    // var a = document.createElement('a');
    // div.appendChild(a);
    // a.innerHTML = data['content'];
    // a.href = data['title'];
    // ------------------------
}

function test() {
    load_notification();
}

function hideNotif() {
    var x = document.getElementById("notification");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
//        document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
//        document.getElementById("myOverlay").style.display = "none";
}




