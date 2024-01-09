<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Document</title>
  <link rel="stylesheet" href="welcome.css">
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Search Box</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="welcome.php">Contact List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addcontact.php">Add Contact</a>
        </li>
      </ul>



    </div>
  </nav>


  <form action="GET" style="margin-top: 60px; margin-bottom: 60px;">
    <div id="input">
      <input type="text" placeholder="Search table by Name" required value="<?php if (isset($_GET['search'])) {
                                                                              echo $_GET['search'];
                                                                            } ?>">
      <div>
        <button type="button">Search</button>
      </div>
    </div>
  </form>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name of Person</th>
        <th>Contact Number</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("localhost", "root", "", "login");

      if (isset($_GET['search'])) {
        $filtervalues = $_GET['search'];
        $query = "SELECT * FROM numbers WHERE CONCAT(nameofperson,mobilenumber) LIKE '%$filtervalues%' ";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $items) {
      ?>
            <tr>
              <td><?= $items['id']; ?></td>
              <td><?= $items['nameofperson']; ?></td>
              <td><?= $items['mobilenumber']; ?></td>
            </tr>
          <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="4">No Record Found</td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>

</body>

</html>