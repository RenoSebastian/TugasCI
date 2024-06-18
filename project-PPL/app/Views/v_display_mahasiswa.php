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
        <tr>
            <td >AA</td>
            <td>BB</td>
            <td>CC</td>
        </tr>
        <tr>  
            <td>DD</td>
            <td>EE</td>
            <td>FF</td>
        </tr>
    </table>

    <table border = "1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
        </tr>
        <?php foreach($mahasiswa as $mhs) : ?>
        <tr>  
            <td> <?= $mhs['nim']; ?></td>
            <td> <?= $mhs['nama']; ?></td>
            <td> <?= $mhs['umur']; ?></td>
        </tr>
            <?php endforeach; ?>
    </table>

 
</body>
</html>