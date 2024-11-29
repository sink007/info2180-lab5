<?php
header("Access-Control-Allow-Origin: *");
$host = 'localhost:3308';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country=  isset($_GET['country']) ? $_GET['country'] : '';
$lookup= $_GET['lookup'];
if ($lookup == "countries") {
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<table>
      <thead>
          <tr>
              <th>Name</th>
              <th>Continent</th>
              <th>Independence</th>
              <th>Head of State</th>
          </tr>
      </thead>
      <tbody>";

  foreach ($results as $row) {
      echo "<tr>
              <td>{$row['name']}</td>
              <td>{$row['continent']}</td>
              <td>{$row['independence_year']}</td>
              <td>{$row['head_of_state']}</td>
          </tr>";
  }

  echo "</tbody></table>";
} 

else {
  if ($lookup == "cities") {
      $stmt = $conn->query("SELECT * FROM countries as co JOIN cities as ci ON co.code = ci.country_code WHERE co.name LIKE '%$country%';");
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo "<table>
          <thead>
              <tr>
                  <th>Name</th>
                  <th>District</th>
                  <th>Population</th>
              </tr>
          </thead>
          <tbody>";
      foreach ($results as $row) {
          echo "<tr>
                  <td>{$row['name']}</td>
                  <td>{$row['district']}</td>
                  <td>{$row['population']}</td>
              </tr>";
      }
      echo "</tbody></table>";
  }
}


