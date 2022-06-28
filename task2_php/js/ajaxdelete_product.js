function deleterow(str) {
    if (confirm('Are you sure want to delete?')) {
        if (str.length == 0) {
            document.getElementById("txtmsg").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1) {
                        document.getElementById("txtmsg").innerHTML = " ";
                        setInterval('window.location.reload()', 1000);
                    } else {
                        document.getElementById("txtmsg").innerHTML = this.responseText;
                    }
                }
            }
        };
        xmlhttp.open("GET", "../admin/deleteproduct.php?id=" + str, true);
        xmlhttp.send();
    }
}