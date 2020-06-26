/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




            var xmlHttp;
            function showprogram(str) {
                if (typeof XMLHttpRequest !== "undefined") {
                    xmlHttp = new XMLHttpRequest();
                } else if (window.ActiveXObject) {
                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                if (xmlHttp === null) {
                    alert("Browser does not support XMLHTTP Request");
                    return;
                }
                var url = "program.jsp";
                url += "?department=" + str;
                xmlHttp.onreadystatechange = stateChange;
                xmlHttp.open("GET", url, true);
                xmlHttp.send(null);
            }

            function stateChange() {
                if (xmlHttp.readyState === 4 || xmlHttp.readyState === "complete") {
                    document.getElementById("program").innerHTML = xmlHttp.responseText;
                }
            }
        