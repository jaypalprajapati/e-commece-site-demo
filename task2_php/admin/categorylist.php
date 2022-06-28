<?php
session_start();
include 'connection.php';
@$email = $_SESSION['email1'];
@$user = $_SESSION['user1'];
echo "$user";
// echo "$email"; 
// if (!$user == 1 || !$user == 2) {
//     header("Location:login.php");
// }

  
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/Category_CSS.css" type="text/css" />
    <title>Category List Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="../js/ajaxdelete_category.js"></script>
    <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
</head>

<body>
<?php include 'layout.php'; ?>
    <span id="txtmsg"></span>
    <div class="container">
        <div class="row" style="margin-top: 5rem;">
        <div id="msg">
        <?php
    if (isset($_GET['msg'])) {
      # code...
      $msg = $_GET['msg'];
    ?>
      <h3 style="color:red;text-align: center;"><?php echo "<p>('$msg')</p>"; ?></h3>
    <?php
    } else {
      $msg = "";
    }
    ?>
        </div>
            <div class="col-lg-12 margin-tb">
                <?php
                if ($user == "1" || $user == "2") { ?>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="addcategory.php"> Add Category</a>
                        <a class="btn btn-info" href="index.php"> Home</a>

                    </div>
                <?php } ?>

            </div>
        </div>
        <center>
            <h2>Category List</h2>
        </center>
        <table class="table table-bordered">
            <thead>
                <tr id="Productlist" style="background-color:navy !important;">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Active</th>
                    <?php
                    if ($user == "1" || $user == "2") { ?>
                        <th width="280px">Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <?php
 if (!isset($_GET['pageno'])) {
    # code...
   $pageno=1;
  }
  else{
   $pageno=$_GET['pageno'];
  }
 
   $qry="SELECT * FROM category ORDER BY id DESC";
  // $qry="SELECT user1.*,city.city_name,area.area_name FROM user1 INNER JOIN city ON user1.city_name = city.city_id INNER JOIN area ON user1.area_name = area.area_id  WHERE user1. AND  user1.utype=3";
   $rs=mysqli_query($conn,$qry);
 
   $total_rows=mysqli_num_rows($rs);
 
   $no_rec_pp=3 ; //no of record show
   
   $total_pages=ceil($total_rows/$no_rec_pp);
 
   $no2=$pageno+1;
 
   $no3=$pageno-1;
 
   $this_page_first_result=($pageno-1)*$no_rec_pp;
 
   $qry1= "SELECT * FROM category ORDER BY id DESC LIMIT ".$this_page_first_result.','.$no_rec_pp;
 
  // $qry1="SELECT * FROM user1 LIMIT ".$this_page_first_result.','.$no_rec_pp AND user1.*,city.city_name,area.area_name FROM user1 INNER JOIN city ON user1.city_name = city.city_id INNER JOIN area ON user1.area_name = area.area_id  WHERE user1.isactive!=2 AND  user1.utype=3;
   $rs1=mysqli_query($conn,$qry1);


            // $qry = "SELECT * FROM category ORDER BY id DESC";
            // $result = mysqli_query($conn, $qry);
            if (mysqli_num_rows($rs1) > 0) {
                while ($row = mysqli_fetch_assoc($rs1)) {
            ?>
                    <tbody id="productbody">
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['cname'] ?></td>
                            <td><?= $row['active'] ?></td>
                            <?php
                            if ($user == "1" || $user == "2") { ?>
                                <td><a href='editcategory.php?id=<?= $row['id'] ?>' class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger" onclick="deleterow(<?= $row['id'] ?>);">Delete</button>
                                </td>
                            <?php } ?>
                        </tr>
                <?php }
            } ?>
            </tbody>
        </table>
        <div class="pagination-wrap card-footer clearfix">
                           <!-- start pagination -->
                           <nav aria-label="Page navigation">
                              <ul class="pagination pagination-sm m-0 float-right">
                                 <li class="page-item">
                                    <?php if ($pageno>1) {
                                       # code...
                                       echo '<a class="page-link fa fa-angle-double-left" href="categorylist.php?pageno='.$no3.'">    
                                       </a>'; } ?>
                                 </li>
                                 <?php  
                                    for ($pageno=1; $pageno <= $total_pages ; $pageno++) { 
                                      # code...
                                      ?>
                                 <li class="page-item">
                                    <?php
                                       # code...
                                       echo '<a class="page-link" href="categorylist.php?pageno='.$pageno.'">
                                       '.$pageno.'
                                       </a>' ?>
                                 </li>
                                 <?php
                                    }
                                    
                                    ?>
                                 <li class="page-item">
                                    <?php if ($no2<=$total_pages) {
                                       # code...
                                       echo '<a class="page-link fa fa-angle-double-right" href="categorylist.php?pageno='.$no2.'">
                                       </a>'; } ?>
                                 </li>
                              </ul>
                           </nav>
                        </div>
    </div>
    <script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
      <script>
         $(function () {
           $(document).on('click', '[data-toggle="lightbox"]', function(event) {
             event.preventDefault();
             $(this).ekkoLightbox({
               alwaysShowClose: true
             });
           });
           $('.filter-container').filterizr({gutterPixels: 3});
           $('.btn[data-filter]').on('click', function() {
             $('.btn[data-filter]').removeClass('active');
             $(this).addClass('active');
           });
         })
      </script>
</body>

</html>