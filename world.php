<?php
header("Access-Control-Allow-Origin: *");
$host = 'localhost:3308';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country=  isset($_GET['country']) ? $_GET['country'] : '';
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($results as $row): ?>
        <tr>
            <td><?= $row['name']?> </td>
            <td><?= $row['continent']?></td>
            <td><?= $row['independence_year']?></td>
            <td><?= $row['head_of_state']?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>

</table>


