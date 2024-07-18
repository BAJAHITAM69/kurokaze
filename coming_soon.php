<?php
// Set the countdown target date: 50 days, 17 hours, 15 minutes, and 30 seconds from now
$targetDate = new DateTime();
$targetDate->modify('+00 days +00 hours +00 minutes +10 seconds');
$targetTimestamp = $targetDate->getTimestamp();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #282c34;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .countdown {
            display: flex;
            justify-content: center;
            font-size: 24px;
        }
        .time-block {
            margin: 0 15px;
        }
        .label {
            display: block;
            font-size: 16px;
            color: #ccc;
        }
        .message {
            margin-top: 30px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <audio autoplay loop>
        <source src="rin.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <div class="container">
        <h1>Coming Soon</h1>
        <div id="countdown" class="countdown">
            <div class="time-block">
                <span class="days" id="days">50</span>
                <span class="label">Days</span>
            </div>
            <div class="time-block">
                <span class="hours" id="hours">17</span>
                <span class="label">Hours</span>
            </div>
            <div class="time-block">
                <span class="minutes" id="minutes">15</span>
                <span class="label">Minutes</span>
            </div>
            <div class="time-block">
                <span class="seconds" id="seconds">30</span>
                <span class="label">Seconds</span>
            </div>
        </div>
        <p class="message">Stay tuned for something awesome!</p>
    </div>
    <script>
        // Set the countdown target timestamp from PHP
        const targetTimestamp = <?php echo $targetTimestamp; ?> * 1000;

        // Update the countdown every second
        const countdownFunction = setInterval(() => {
            const now = new Date().getTime();
            const distance = targetTimestamp - now;

            // Calculate time components
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the HTML
            document.getElementById("days").innerText = days;
            document.getElementById("hours").innerText = hours;
            document.getElementById("minutes").innerText = minutes;
            document.getElementById("seconds").innerText = seconds;

            // If the countdown is over, display a message
            if (distance < 0) {
                clearInterval(countdownFunction);
                document.getElementById("countdown").innerHTML = "<h2>Time's up!</h2>";
            }
        }, 1000);
    </script>
</body>
</html>
