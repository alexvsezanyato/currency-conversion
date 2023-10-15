<h1>Заявка на звонок</h1>

<p style="font-size: 16px">Уважаемый {{ $data["name"] }}, ваша заявка принята и находится в обработке</p>

<table style="
    border-collapse: separate;
    border-spacing: 0 15px;
    font-size: 14px;
">
    <tr>
        <td style="padding-right: 10px"><b>Email</b></td>
        <td>{{ $data["email"] }}</td>
    </tr>

    <tr>
        <td style="padding-right: 10px"><b>Phone</b></td>
        <td>{{ $data["phone"] }}</td>
    </tr>

    <tr>
        <td style="padding-right: 10px"><b>Name</b></td>
        <td>{{ $data["name"] }}</td>
    </tr>
</table>
