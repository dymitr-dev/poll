<!DOCTYPE html>
<html>

<head>
    <title>China Leader and Putin Meeting Poll</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="poll-container">
        <h2>Will the leader of China come to Putin?</h2>

        <?php require 'result.php' ?>

        <form id="poll-form" method="post" action="vote.php">
            <div id="poll-options">
                <div class="radio">
                    <input id="radio-yes" type="radio" name="vote" value="yes" />
                    <label for="radio-yes">Yes</label>
                </div>
                <div class="radio">
                    <input id="radio-no" type="radio" name="vote" value="no" />
                    <label for="radio-no">No</label>
                </div>
            </div>
            <input style="margin-top: 10px;" type="submit" value="Submit">
        </form>
    </div>

    <footer>
        <div class="container">
            <a href="#" id="btc-link"><img src="https://img.icons8.com/color/24/000000/bitcoin.png" alt="Bitcoin (BTC) donation"></a>
            <a href="#" id="eth-link"><img src="https://img.icons8.com/color/24/000000/ethereum.png" alt="Ethereum (ETH) donation"></a>
            <a href="mailto:contact@dymitr.dev"><img src="https://img.icons8.com/color/24/null/sent--v2.png" alt="Donate via email"></a>
        </div>
    </footer>

    <script>
        // Check if the "voted" cookie is set
        var voted = getCookie("voted");
        if (voted) {
            // If the cookie is set, hide the poll form
            var pollForm = document.getElementById("poll-form");
            if (pollForm) {
                pollForm.style.display = "none";
            }
        }

        // Function to get the value of a cookie by name
        function getCookie(name) {
            var cookieValue = "";
            var cookies = document.cookie.split(";");
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].trim();
                if (cookie.substring(0, name.length + 1) == name + "=") {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
            return cookieValue;
        }

        // get the BTC and ETH link elements
        const btcLink = document.getElementById('btc-link');
        const ethLink = document.getElementById('eth-link');

        // define the BTC and ETH addresses
        const btcAddress = 'bc1qkun7mqcu2d8ut3ghyprqjug4jvmf2kg56e850v';
        const ethAddress = '0xf02F3Fe762A0f7709EFEbf430bC9Ccdd7335Edc1';

        // add click event listeners to the BTC and ETH links
        btcLink.addEventListener('click', () => {
            window.alert("BTC Address: " + btcAddress);
        });

        ethLink.addEventListener('click', () => {
            window.alert("ETH Address: " + ethAddress);
        });
    </script>
</body>

</html>