<?php
/**
 * @file
 * show_all_members.php
 * This is a view, loaded by /admin/customers.php and used to display all
 * members from the members table in an HTML table for easy searching and
 * viewing.
 *
 * Links are provided here to edit each customer (aka: member) <--just pissing
 * on any sort of naming convention... I know... Who built that?!
 */


$sql = "
SELECT
    m.member_id,
    m.firstname,
    m.lastname,
    m.email, 
    m.password,
    m.username,
    m.phone,
    m.date_added
FROM members as m;";

DB::query($sql);
?>     
<table  class="sortandsearch dataTable">
  <thead>
    <tr>
      <th>User ID</th>
      <th>Username</hh>
      <th>First Name</th> 
      <th>Last Name</th> 
      <th>Password</th>
      <th>Phone number</th>
      <th>E-mail</th>
      <th>Date Created</th>
    </tr>
  </thead>
  <tbody>
<?php
while ($row = DB::fetch_assoc()) :
  print '
    <tr>
      <td>' . $row["member_id"] . '</td>
      <td><a href="customers.php?id=' .$row["member_id"] . '">' . $row["username"] . '</a></td>
      <td>' . $row["firstname"] . '</td>
      <td>' . $row["lastname"] . '</td>
      <td>' . $row["password"] . '</td>
      <td>' . $row["phone"] . '</td>
      <td>' . $row["email"] . '</td>     
      <td>' . $row["date_added"] . '</td>     
    </tr>';
  endwhile;
?>
  </tbody>
</table>