<h1>Заявка на звонок</h1>

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

<table style="
    border-collapse: separate;
    border-spacing: 0 15px;
    font-size: 14px;
">
    <tr>
        <td style="padding-right: 30px"><b>ID</b></td>
        <td style="padding-right: 30px"><b>Название товара</b></td>
        <td style="padding-right: 30px"><b>Количество</b></td>
        <td style="padding-right: 30px"><b>Стоимость</b></td>
        <td style="padding-right: 30px"><b>Цена</b></td>
    </tr>
    @foreach ($data["products"] as $product)
    <tr>
        <td style="padding-right: 30px">{{ $product["id"] }}</td>
        <td style="padding-right: 30px">{{ $product["name"] }}</td>
        <td style="padding-right: 30px">{{ $product["amount"] }}</td>
        <td style="padding-right: 30px">{{ $product["cost"] }}</td>
        <td style="padding-right: 30px">{{ $product["price"] }}</td>
    </tr>
    @endforeach
</table>
