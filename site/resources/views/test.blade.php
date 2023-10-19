<html>
    <body>
        <script>
            fetch("/api/exchange-rate/latest/KZT-RUB/10", {
                withCredentials: true
            }).then(async response => {
                console.log(await response.text())
            })
        </script>
    </body>
</html>
