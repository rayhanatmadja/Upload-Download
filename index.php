<?php include './connection.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Siswa</h1>
    <p>Data Siswa</p>
    <a href="./create-siswa.php">Create siswa</a>

    <hr>

    <?php
    $sql = 'select * from students';
    $result = mysqli_query($conn, $sql);
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Addres</th>
                <th>Action</th>
                <th>Journal</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['address'] ?></td>
                    <td><?php echo $data['kehadiran'] === date('Y-m-d') ? '✅' : '❌' ?></td>

                    <?php if (!$data['jurnal']) { ?>
                        <td><a href="upload-journal.php?id=<?php echo $data['id'] ?>">Upload</a></td>
                    <?php } else { ?>
                        <td><a href="<?php echo $data['jurnal'] ?>" target="_blank">Download</a></td>
                    <?php } ?>
                    <td>
                        <a href="edit-siswa.php?id=<?php echo $data['id'] ?>">Edit</a>
                        <a href="check-in.php?id=<?php echo $data['id'] ?>">Check In</a>
                        <a href="check-out.php?id=<?php echo $data['id'] ?>">Check Out</a>
                        <a href="delete-siswa.post.php?id=<?php echo $data['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>