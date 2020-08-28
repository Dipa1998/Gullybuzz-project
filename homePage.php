 <?php  
        session_start();
        error_reporting(0);
       include "Db/connection.php";
?>


<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="#" class="navbar-brand">GullyBuzz</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active">Home</a>
            <a href="#" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link">Products</a>
            <?php
            $userId=$_SESSION['userEmail'];
             if($userId==''){
               echo "<a href=\"userReg/userLogin.php\" class=\"nav-item nav-link\">Login</a>";
             }else{
                ?>
                    <a href="hostPage.php" class="nav-item nav-link">Host</a>
                <?php
                $sql = "SELECT * FROM `usertable` WHERE `userEmail` ='$userId'";
                $res = $db->query($sql);
                while($row = $res->fetch_array()) {
                    ?>
                   <a class="text-success nav-item nav-link" href="userReg/logOut.php">Logout <?php echo $row['userName'];?></a>
                   <?php
                }

             }

            ?>
             
        </div>
        <form class="form-inline ml-auto">
            <input type="text" class="form-control mr-sm-2" placeholder="Search">
            <button type="submit" class="btn btn-outline-light">Search</button>
        </form>
    </div>
   </nav>

    <div class="container" style="width: 800px; background-color: red; margin-top: 10px; padding: 5px; ">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title" style="text-align: center; font-size: 25px;">Benipur vs Kandi</h5>
            <table class="table" style="width: 100%; text-align: center; font-size: 20px;">
                <tr>
                    <td style="font-weight: bold;">Total Score: 78</td>
                    <td style="font-weight: bold;">Over: 6.2</td>
                    <td style="font-weight: bold;">Wicket: 01</td>
                    <td style="font-weight: bold;">Extra: 05</td>
                    <td style="font-weight: bold;">Target: 1st ING</td>
                </tr>
            </table>
            <table class="table">
                <tr style="text-align: center;">
                    <td>Batting</td>
                     <td>Bowlling</td>
                      <td>Upcoming B-Men</td>
                       <td>Dismiss</td>
                </tr>
                <tr style="height: 200px;">
                    <td>
                        <p style="font-weight: bold; color: green; font-size: 20px;">Atabur Sk 30/2.5</p>
                        <p style="font-weight: bold; font-size: 20px;">Kitabur Sk 23/1.3</p>
                    </td>
                     <td style="font-weight: bold;">
                        <p style="color: blue">Hardik 17/1.2 W-0</p>
                        <p>Raina 09/1 W-0</p>
                        <p>Ashis 33/2 W-0</p>
                        <p>Rahane 17/2 W-1</p>
                     </td>
                      <td>
                          <div style="height: 190px; overflow-y: scroll;">
                              <p>Faruk</p>
                              <p>ashik</p>
                              <p>Rahul</p>
                              <p>Fasu</p>
                              <p>Toufik</p>
                              <p>Safik</p>
                              <p>Yeadul</p>
                              <p>Pintu</p>
                          </div>
                      </td>
                       <td>
                           <div style="height: 198px; overflow-y: scroll;">
                              <p>Bapi 20/2.0</p>
                              
                          </div>
                       </td>
                </tr>
                
            </table>
          </div>
        </div>
        
    </div>
    

</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/ rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
