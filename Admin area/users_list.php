<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
   <thead class="bg-info">
    <?php
$query = "SELECT * FROM users_table";
$result = mysqli_query($conn,$query);
$row_count = mysqli_num_rows($result);

if ($row_count == 0) {
    echo "<h2 class='text-center text-danger'>No users yet</h2>";
}else {
    echo " <tr class='text-center'>
    <th>Slno</th>
    <th>Username</th>
    <th>User email</th>
    <th>User image</th>
    <th>User address</th>
    <th>User mobile</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-light'>";
$number = 0;
while ($row_data = mysqli_fetch_assoc($result)) {
    $user_id = $row_data['user_id'];
    $username = $row_data['username'];
    $user_email = $row_data['user_email'];
    $user_image = $row_data['user_image'];
    $user_address = $row_data['user_address'];
    $user_mobile = $row_data['user_mobile'];
    $number++;
    echo "<tr class='text-center'>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../users_area/image/$user_image' alt='$username' class='product_img'/></td>
        <td>$user_address</td>
        <td> $user_mobile</td>
        <td><a href='index.php?delete_user=<?php echo $user_id?>'
        type='button' class='text-light' data-toggle='modal' data-target='#exampleModal'>
       <i class='fa-solid fa-trash'></i></a></td>
</tr>
</tbody>";
}
}

?>
   
  
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?user_list"
         class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete_user=<?php echo $user_id ?>" 
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>



   