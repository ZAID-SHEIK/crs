<?php
session_start();
if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>

    <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
  <font face="calibri">
    
  <section>
    <div class="container">
      <div class="row">
        <header>
          <nav class="navbar navbar-default" style="margin-bottom: 0; height: 80px; background-color: white; border-color: transparent;">
            <div class="container-fluid">

              <div class="navbar-header">
                <a class="navbar-brand" style="font-size: 24px; color: #053a5a; line-height: 42px;" href="../index.php">CAMPUS RECRUITMENT SYSTEM</a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                <ul class="nav navbar-nav navbar-right">
                  <li style="padding-right: 25px;"><a href="../logout.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Logout</a></li>
                </ul>
              </div>

            </div>

          </nav>
        </header>
      </div>
    </div>
  </section>

  <div style="background-color: #053a5a; height: 80px;">
    <p style="font-size: 34px; color: white; text-align: center; line-height: 75px;">Dashboard</p>
  </div>

  <br>
  <br>

    <div class="container">
    <?php if(isset($_SESSION['jobPostSuccess'])) { ?>
      <div class="row successMessage" style="text-align: center; color: red; font-size: 28px;">
        <div class="alert alert-success" style="text-align: center; color: red; font-size: 28px;">
          Job Post Created Successfully!
        </div>
      </div>
    <?php unset($_SESSION['jobPostSuccess']); } ?>

    <?php if(isset($_SESSION['jobPostUpdateSuccess'])) { ?>
      <div class="row successMessage" style="text-align: center; color: red; font-size: 28px;">
        <div class="alert alert-success" style="text-align: center; color: red; font-size: 28px;">
          Job Post Updated Successfully!
        </div>
      </div>
    <?php unset($_SESSION['jobPostUpdateSuccess']); } ?>

    <?php if(isset($_SESSION['jobPostDeleteSuccess'])) { ?>
      <div class="row successMessage" style="text-align: center; color: red; font-size: 28px;">
        <div class="alert alert-success" style="text-align: center; color: red; font-size: 28px;">
          Job Post Deleted Successfully!
        </div>
      </div>
    <?php unset($_SESSION['jobPostDeleteSuccess']); } ?>

      <div class="row" align="center">
        <div style="background-color: #00FF00; border: 1px solid black; width: 50%; height: 80px; border-radius: 5px;">
          <a href="create-job-post.php" style="line-height: 75px; color: black; font-size: 26px;">Create Job Post</a>
        </div>
        <br><br>
        <div style="background-color: yellow; border: 1px solid black; width: 50%; height: 80px; border-radius: 5px;">
          <a href="view-job-post.php" style="line-height: 75px; color: black; font-size: 26px;">View Job Post</a>
        </div><br><br>
        <?php 
          $sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_user]' AND status='0'";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            ?>
            <div style="background-color: aqua; border: 1px solid black; width: 50%; height: 80px; border-radius: 5px;">
              <a href="view-job-application.php" style="line-height: 75px; color: black; font-size: 26px;">View Applications <span>(<?php echo $result->num_rows; ?>)</span></a>
            </div>
            <?php 
          }
        ?>
      </div>
    </div>

    <br><br>

<footer id="footer" style="background-color: #053a5a; height: 80px;">

    <p style="color:white; font-size: 20px; line-height: 80px; text-align: center;"> 
      Copyright &copy; 2018-2019 <a href="../index.php" style="color:white;">JobDeck.com </a>
    </p>

    <div align="center" style="background-color: #053a5a; margin-top: -1.4%; height: 55px;">
      <a href="https://www.facebook.com/TataConsultancyServices" target="_blank"><img src="../img/facebook.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
      <a href="https://www.twitter.com/tcs" target="_blank"><img src="../img/twitter.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
      <a href="https://www.youtube.com/channel/UCaHyiyvJp4hhPNhIU7r9uqg" target="_blank"><img src="../img/youtube.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
    </div>

  </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(function(){
        $(".successMessage:visible").fadeOut(5000);
      });
    </script>
  </body>
</html>