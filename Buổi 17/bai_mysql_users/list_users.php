<?php

include "db.php";


$sql = "SELECT * FROM users";


$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách users</title>

    <style>
    body {
        font-family: Arial;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin: 30px auto;
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }

    th {
        background: #007bff;
        color: white;
    }

    h2 {
        text-align: center;
    }
    </style>
</head>

<body>

    <h2>DANH SÁCH NGƯỜI DÙNG</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Ngày tạo</th>
        </tr>

        <?php

        if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td>" . $row["full_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["created_at"] . "</td>";
                echo "</tr>";
            }
        } else {

            echo "<tr>";
            echo "<td colspan='6'>Không có dữ liệu</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>

</html>