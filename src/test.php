<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Calculate Time</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="modernizr.custom.05819.js"></script>
</head>
<body>
<header>
    <h1> Calculate Time </h1>
</header>
<article align="center">
    <div id="cities">
        // My navigation links here (REMOVED)
    </div>
    <div id="caption">
        Calculate the time elapsed since a date entered.
    </div>
    <div class="box">
        <article>
            <form>
                <fieldset>
                    <label for="dateEntered">
                        Enter a Date
                    </label>
                    <input type="date" id="dateInput" />
                </fieldset>
                <fieldset class="button">
                    <button type="button" id="determineTime">Find Time</button>
                </fieldset>
                <fieldset>
                    <p>Time Elapsed is:</p>
                    <p id="time"></p>
                </fieldset>
            </form>
        </article>
    </div>
    <div id="map"></div>
</article>
<script>
    var input;
    var dateEntered;

    document.getElementById("dateInput").addEventListener("change", function () {
        input = this.value;
        dateEntered = new Date(input);
    });

    /* find and display time elapse */
    function lookUpTime() {
        // More code will go here later.
    }

    // add event listener to Find time button and clear form
    function createEventListener() {
        var submitButton = document.getElementById("determineTime");
        if (submitButton.addEventListener) {
            submitButton.addEventListener("click", lookUpTime, false);
        } else if (submitButton.attachEvent) {
            submitButton.attachEvent("onclick", lookUpTime);
        }
        document.getElementById("dateInput").value = "";
        // clear last starting value on reload
        document.getElementById("time").innerHTML = "";
        // clear previous results on reload
    }

    if (window.addEventListener) {
        window.addEventListener("load", createEventListener, false);
    } else if (window.attachEvent) {
        window.attachEvent("onload", createEventListener);
    }
</script>
<script src="script.js"></script>
</body>
</html>