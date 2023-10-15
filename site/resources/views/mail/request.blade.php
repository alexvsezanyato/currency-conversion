<html>
    <head>
        <title>Новая заявка</title>
    </head>

    <body>
        <table>
            <tr>
                <td style="border-top-left-radius:10px;padding: 10px;border:1px solid #ddd"><b>Имя</b></td>
                <td style="border-top-right-radius:10px;padding: 10px;border:1px solid #ddd">{{ $name }}</td>
            </tr>

            <tr>
                <td style="padding: 10px;border:1px solid #ddd"><b>Почта</b></td>
                <td style="padding: 10px;border:1px solid #ddd">{{ $email }}</td>
            </tr>

            <tr>
                <td style="border-bottom-left-radius:10px;padding: 10px;border:1px solid #ddd"><b>Телефон</b></td>
                <td style="border-bottom-right-radius:10px;padding: 10px;border:1px solid #ddd">{{ $phone }}</td>
            </tr>
        </table>
    </body>
</html>
