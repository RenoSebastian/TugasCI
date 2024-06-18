<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border = "1">
        <?php foreach($mahasiswa as $mhs) : ?>
        <tr>  
            <td> <?= $mhs['NIM']; ?></td>
            <td> <?= $mhs['Nama']; ?></td>
            <td> <?= $mhs['Umur']; ?></td>
        </tr>
            <?php endforeach; ?>
    </table>

 
</body>
</html>