<?php 
$db = 'examples';
$host = 'localhost';
$user = 'root';
$pass = '';

//connection to the database
$dbhandle = mysql_connect($host, $user, $pass)
 or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db($db) 
  or die("Could not select examples");

//execute the SQL query and return records
$result = mysql_query("SELECT id, year FROM cars");

//fetch tha data from the database 
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
   echo "ID:".$row["id"]."Year: ". //display the results
   $row{'year'}."<br>";
}
//close the connection
//mysql_close($dbhandle);
?>