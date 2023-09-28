<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>List Product</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
            <th>Nama Product</th>
            <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($product as $p):?>
            <tr>
            <td><?=$p->nama_product?></td>
            <td><?=$p->description?></td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
</body>
</html>