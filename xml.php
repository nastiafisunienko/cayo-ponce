<?php
require "host.php";


header("Content-type: text/xml");
header('Content-Disposition:attachment; filename="users.xml"');
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<users>\n";

$sql_users = "SELECT * FROM user_login";

$users = mysqli_query($conn, $sql_users);

if (!$users) {
    die("Error in connect with database ".mysqli_error($conn));
    exit();
}

while($row = mysqli_fetch_assoc($users)) {

    echo "\t<user>\n";

    echo "\t\t<id>".$row['id']."</id>\n";
    echo "\t\t<username>".$row['username']."</username>\n";
    echo "\t\t<password>".$row['password']."</password>\n";

    echo "\t</user>\n";
}

echo "</users>";



?>