<!DOCTYPE html>
<html lang="en">
	
<?php session_start(); ?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="admin/img/MCC_LOGO.ico" type="image/x-icon">
  <title>Dashboard</title>
 	

<?php
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
 include('./header.php'); 
 // include('./auth.php'); 
 ?>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("admin/img/mccbgblur.png");
            background-position: center;
            background-size: cover;
            margin-bottom: 500px;
            overflow: hidden;
            background-attachment: fixed;
        }
        
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        header {
            background: #028323;
            color: white;
            padding-top: 10px;
            padding-bottom: 10px;
            min-height: 50px;
            border-bottom: #e8491d 4px solid;
        }

        header a {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 14px;
        }

        header #branding {
            float: left;
            margin-top: 5px;
        }

        header #branding img
      {
        width: 50px; 
        height: 50px;
        float: left; 
        margin-right: 15px;
      }

        header #branding h1 
        {
            margin: 0;
            display: flex;
            align-items: center;
        }
        
        header #branding h1 img {
            margin-right: 10px; 
        }
        
        header #branding h1 span {
            font-size: 35px;
            margin-right: 5px;
        }

        header a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        header #signout-btn {
            float: right;
            display: inline-block;
            background: #e8491d;
            color: #ffffff;
            padding: 8px 15px;
            margin-top: 10px;
            margin-right: 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .welcome-container {
            text-align: left;
            margin-top: 20px;
            background: #ffffff4d;
            padding: 20px;
            border-radius: 20px; 
        }


        .welcome-text {
            font-size: 24px;
            color: #333;
        }

        .dashboard-button {
            display: inline-block;
            padding: 10px 20px;
            background: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .btn{
        cursor:pointer;
        position:relative;
        padding:10px 20px;
        background:white;
        font-size:14px;
        border-top-right-radius:10px;
        border-bottom-left-radius:10px;
        transition:all 1s;
        &:after,&:before{
          content:" ";
          width:10px;
          height:10px;
          position:absolute;
          border :0px solid #fff;
          transition:all 1s;
          }
        &:after{
          top:-1px;
          left:-1px;
          border-top:5px solid black;
          border-left:5px solid black;
        }
        &:before{
          bottom:-1px;
          right:-1px;
          border-bottom:5px solid black;
          border-right:5px solid black;
        }
        &:hover{
          border-top-right-radius:0px;
        border-bottom-left-radius:0px;
          &:before,&:after{
            
            width:100%;
            height:100%;
          }
        }
      }

      .confirmation-modal {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      padding: 20px;
      text-align: center;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      z-index: 1000;
    }

    .confirmation-modal h2 {
      margin-bottom: 40px;
    }

    .confirmation-modal button {
      padding: 10px 30px;
      margin: 0 10px;
      cursor: pointer;
      border-radius: 5px;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    .confirmation-modal button.yes {
      background-color: #e8491d; 
      color: #fff;
    }

    .confirmation-modal button.no {
      background-color: #808080; 
      color: #fff;
    }

    #confirmationModal.show {
      display: block;
      opacity: 1;
    }

      .vsbtn {
       color: #20bf6b !important;
       text-transform: uppercase;
       background: #ffffff;
       padding: 10px;
       font-size: 16px;
       border: 4px solid #20bf6b !important;
       border-radius: 6px;
       display: inline-block;
       transition: all 0.3s ease 0s;
       }
       .vsbtn:hover {
       color: #494949 !important;
       border-radius: 40px;
       border-color: #494949 !important;
       transition: all 0.3s ease 0s;
      }

      .footer {
          position: fixed;
          bottom: 0;
          width: 100%;
          padding: 10px;
          text-align: center;
          background-color: rgba(255, 255, 255, 0);
          font-style:normal;
          font-size: 12px;
      }
  
      /* Media Screen adjust mode for mobile phone or smaller screen size*/
      @media only screen and (max-width: 600px) 
      {
        header #branding h1 a {
          font-size: 16px;
        }
  
        header #signout-btn {
          margin-right: 10px;
        }
  
        .welcome-text {
          font-size: 18px;
        }
  
        .dashboard-button {
          padding: 8px 16px;
          margin-top: 15px;
        }
      }
    </style>
</head>
<body>
    <header>
      <div class="container">
        <div id="branding">
          <img src="admin/img/MCC_LOGO.png" alt="Logo">
          <h1><span>Your</span> Dashboard</h1>
        </div>
        <a id="signout-btn" class="btn" onclick="showConfirmationModal()">Sign Out</a>
      </div>
    </header>
    <div class="container">
        <div class="welcome-container">
            <div class="welcome-text">Welcome back, <span id="username"><?php echo $_SESSION['login_lastname']; ?>,<?php echo $_SESSION['login_firstname']; ?></span>!</div>
            <a class="vsbtn" href="view_listsched.php">View Calendar Schedules</a>
            <a class="vsbtn" href="view_tablesched.php">View Table Schedules</a>
        </div>
    </div>

    <div class="confirmation-modal" id="confirmationModal">
    <h2>Are you sure you want to log out?<br></h2>
    <button class="yes" onclick="logout()">Yes</button>
    <button class="no" onclick="hideConfirmationModal()">No</button>
  </div>

  <script>
    function showConfirmationModal() {
      var modal = document.getElementById('confirmationModal');
      modal.style.display = 'block';
    }

    function hideConfirmationModal() {
      var modal = document.getElementById('confirmationModal');
      modal.style.display = 'none';
    }

    function logout() {
      // You can add any additional logout logic here
      // For now, redirecting to logout.php
      window.location.href = 'logout.php';
    }
  </script>

<footer class="footer">
        <p>Developed By <a href="https://www.facebook.com/xvennnnnn/">Haven Charles Papasin</a></p>
    </footer>
</body>
</html>
