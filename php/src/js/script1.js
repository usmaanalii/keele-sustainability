function ajaxres(res, i) {
    $.post("/php/includes/resources.php", "i=" + res[i], function(data) {
        $("#" + res[i] + "up").html(data);
    });
    $("#" + res[i] + "send").submit(function() {
        event.preventDefault();
        $.post("/php/includes/resources.php", $("#" + res[i]).serialize(), function(data) {
            $("#" + res[i] + "put").html(data);
            $.post("/php/includes/resources.php", "i=" + res[i], function(data) {
                $("#" + res[i] + "up").html(data);
            });
        });
    });
}

function chartmake(nameput, dataput) {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["September",
                "October",
                "November",
                "December",
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August"
            ],
            datasets: [{
                label: nameput,
                data: dataput,
                backgroundColor: "rgba(153,153,51,0.6)"
            }]
        }
    });
}



$('document').ready(function() {
    $.get("/php/login.php", "login", function(data) {
        if (data === 'success') {
            var logged = true;
            $(".expand").show();
            $.get("/php/login.php", "login&name", function(data) {
                var name = data;
                $("#greet").html("Hello " + name + "!");
                $("<form action='/php/logout.php' class='log' id='logf'><input type='submit' value='logout'/></form>").appendTo("#log");
            });
        } else {
            var logged = false;
            $("<button class='log' id='logbut'>login</button>").appendTo("#log");
            $("#logbut").click(function() {
                $(
                    "<form action='/php/includes/login.php' method='post' name='login_form' class='log'> Email: <input class='log' type='text' name='email'/><br> Password: <input class='log' type='password' name='p' id='password'/><br><input class='log' type='submit' value='Login'/></form>"
                ).appendTo("#log");
            });
        }
    });
    var res = ["paper", "metal", "compost", "glass", "plastic", "general"];
    for (i = 0; i < res.length; i++) {
        ajaxres(res, i);
    }
    
    $(".graphopen").click(function() {
        var type = $(this).attr("value");
        $.get("/php/graph.php", "type=" + type + "&y", function(data) {
            $years = JSON.parse(data);
            $.each($years, function(i, value) {
                $("#yearsal").append($("<option>").text((value) - 1).attr("value", value));
                var year = $("#yearsal").val();
                var name = type + " " + (year - 1);
                $.get("/php/graph.php", "type=" + type + "&i=" + year, function(data) {
                    var chartdata = (JSON.parse(data));
                    chartmake(name, chartdata);
                });
            });
            $("#yearsel").change(function() {
                var year = $("#yearsal").val();
                var name = type + " " + (year - 1);
                $.get("/php/graph.php", "type=" + type + "&i=" + year, function(data) {
                    var chartdata = (JSON.parse(data));
                    chartmake(name, chartdata);
                });
            });
        });
    });
    $(".recordopen").click(function() {
        var rectype = $(this).attr("value");
        $.get("/php/records.php", "type=" + rectype, function(data) {
            $(".recordput").html(data);
            $(".recedit").click(function() {
                var rowid = $(this).attr("value");
                var thisrow = $("#row" + rowid).html();
                var inputname = "input" + rowid;
                $("#edithere").html("<tr><th>LogNum</th><th>Weight</th><th>date</th><th>User</th></tr><tr>" + thisrow + "</tr>");
                var original = $("#edithere .recweight").text();
                $("#edithere .recweight").html("<input id='" + inputname + "' type='text' value='" + original + "'>");
                $("#edithere .recedit").html("Confirm");
                $("#edithere .recedit").toggleClass("reconf");
                $("#edithere .recedit").toggleClass("recedit");
                var neweight = $("#" + inputname).val();
                $("#" + inputname).keyup(function() {
                    neweight = $("#" + inputname).val();
                });
                $(".reconf").click(function() {
                    var conrowid = $(this).attr("value");
                    if (confirm("Are you sure you want to replace " + original + " with " + neweight + "?")) {
                        $.post("records.php", {
                            rep: neweight,
                            id: conrowid,
                            rectype: rectype
                        }, function(data) {
                            if (data === 'success') {
                                $("#edithere").html("<p>Record succesfully replaced</p>");
                            } else {
                                $("#edithere").html(data);
                            }
                        });
                    }
                });
            });
            $(".yearly").click(function() {
                $.get("/php/records.php", "type=" + rectype + "&year=2017", function(data) {
                    $(".recordput").html(data);
                });
            });
        });

    });
});
