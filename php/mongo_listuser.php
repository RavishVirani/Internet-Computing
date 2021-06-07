<html>

<head>
    <title>Hello world in PHP</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1>PHP & MongoDB</h1>

    <table>
        <tr>
            <td>Name</td>
            <td>Role</td>
        </tr>

        <?php
        include_once 'MDBManager.php';

        $dbname = 'cp476';
        $collection = 'users';

        $dbm = new MDBManager();
        $conn = $dbm->getConnection();

        // get all
        $filter = [];
        $option = [];
        $read = new MongoDB\Driver\Query($filter, $option);
        $all = $conn->executeQuery("$dbname.$collection", $read);

        foreach ($all as $user) {
            echo nl2br('<tr><td>' . $user->name . '</td><td>' . $user->role . "</td></tr>\n");
        }

        ?>

    </table>

</body>

</html>