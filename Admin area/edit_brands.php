<?php

  
if (isset($_GET['edit_brands'])) {
    $edit_brand = $_GET['edit_brands'];
    $get_cat = "SELECT * FROM brands WHERE brand_id ='$edit_brand'";
    $result = mysqli_query($conn,$get_cat);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
}

if (isset($_POST['edit_brand'])) {
    $brand_title = $_POST['brand_title'];

    // update query

    $update_brand = "UPDATE brands SET brand_title='$brand_title'  WHERE brand_id ='$edit_brand'";
    $result_brand = mysqli_query($conn,$update_brand);
    if ($result_brand) {
        echo "<script>alert('Brand is been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

?>


<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="POST" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" id="brand_title" value="<?php echo $brand_title ?>" class="form-control" required>
        </div>
        <input type="submit" value="Update Brand" class="btn btn-info px-3 mb-3" name="edit_brand">
    </form>
</div>
