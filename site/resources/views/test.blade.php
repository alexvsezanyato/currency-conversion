<html>
    <body>
        <script>
            fetch("/api/convert/100/KZT/RUB/", {
                withCredentials: true
            }).then(async response => {
                console.log(await response.text())
            })
        </script>
    </body>
</html>
