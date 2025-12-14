<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 Page Expired</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Press+Start+2P");

        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        * {
            font-family: 'Press Start 2P', cursive;
            box-sizing: border-box;
        }

        #app {
            padding: 1rem;
            background: black;
            display: flex;
            height: 100%;
            justify-content: center;
            align-items: center;
            color: #ffffff;
            text-shadow: 0px 0px 10px;
            font-size: 6rem;
            flex-direction: column;
        }

        #app .txt {
            font-size: 1rem;
            margin-top: 10px;
        }

        @keyframes blink {
            0% { opacity: 0; }
            49% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 1; }
        }

        .blink {
            animation: blink 1s infinite;
        }
    </style>
</head>

<body>
    <div id="app">
        <div>419</div>
        <div class="txt">Halaman kadaluarsa</div>
        <div class="txt" id="countdown">
            Anda akan di redirect kembali ke dashboard dalam 5 <span class="blink">_</span>
        </div>
    </div>

    <script>
        let time = 5;
        let countDown = document.getElementById('countdown');

        let interval = setInterval(() => {
            time--;
            countDown.innerHTML = "Anda akan di redirect kembali ke dashboard dalam " + time + " <span class='blink'>_</span>";

            if (time <= 0) {
                clearInterval(interval);
                window.history.back();
            }
        }, 1000);
    </script>

</body>
</html>
