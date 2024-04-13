<?php
$host="host=127.0.0.1";
$port="port=5432";
$dbname= "dbname=bcs";
$credentials="user=bcs password=bcs123";
$tno=$_GET['n'];
$db = pg_connect("$host $port $dbname $credentials");
if(!$db)
{
   echo "Error: Unable to open database\n";
}
else{
   echo"Opened database successfully\n";
}
$sql = "SELECT tname,qual,sal from teacher where tno=$tno";
echo "<table border='4'>";
echo "<th>ID</th><th>Name</th><th>Qualification</th><th>Salary</th>";

$rs = pg_query($db, $sql) or die("Cannot execute query");
if(!$rs){
echo pg_last_error($db);
exit;
}
while ($row = pg_fetch_row($rs)) {
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "</tr>";
}
echo "</table>";
pg_close($db);
?>

