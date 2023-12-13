<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="admin/img/MCC_LOGO.ico" type="image/x-icon">
    <title>Mandaue City College</title>
    <style>
        body 
        {
            margin: 0;
            padding: 0;
            font-family: 'Raleway', sans-serif;
            background: url('admin/img/mcbgblur.png') center/cover no-repeat;
            background-color: rgba(0, 0, 0, 0.7);
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            overflow: hidden;
        }
        
        @media only screen and (max-width: 600px) {
            .sweet-title {
                font-size: clamp(1.5rem, 5vw, 2rem);
            }
        
            .description {
                font-size: 18px;
            }
        
            .navbar {
                top: 10px;
                right: 10px;
            }
        
            .dropdown {
                display: block;
                margin-bottom: 10px;
            }
        
            .dropbtn {
                width: 100%;
            }
        
            .footer {
                font-size: 10px;
            }
        }

        .fancy {
            font-family: "Arial Black", sans-serif;
            font-size: 30px;
            text-transform: uppercase;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            display: inline;
        }
        
        .description {
            font-size: 25px;
            color: rgb(7, 7, 7);
            margin-top: 1px;
        }

        .navbar {
            position: absolute;
            top: 20px;
            right: 50px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            position: relative;
            text-decoration: none;
            font-size: 14px; 
            text-transform: uppercase;
            letter-spacing: 5px;
            line-height: 30px; 
            width: 125px;
            font-weight: bold;
            height: 40px; 
            -webkit-box-reflect: bottom 1px linear-gradient(transparent, #0004);
            background: none;
            border: none;
            overflow: hidden;
            cursor: pointer;
            z-index: 0;
        }

        .dropbtn span {
            position: absolute;
            display: flex;
            justify-content: center;
            top: 4px;
            right: 4px;
            bottom: 4px;
            left: 4px;
            text-align: center;
            background: #2E2E2E;
            color: rgba(255, 255, 255, 0.781);
            transition: 0.5s;
            z-index: 1;
        }

        .dropbtn:hover span {
            color: rgba(255,255,255,1);
        }

        .dropbtn::before,
        .dropbtn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-size: 400%;
            opacity: 0;
            transition: 0.5s;
            background: linear-gradient(45deg,#91155d,#525296,#0f0,#ff0,#fb0094,#00f,#0f0,#ff0);
            animation: animate123 20% linear infinite;
            z-index: -1;
        }

        .dropbtn:hover::before,
        .dropbtn:hover::after {
            opacity: 1;
        }

        @keyframes animate123 {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 300% 0;
            }

            100% {
                background-position: 0 0;
            }
        }

        .dropbtn span::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: rgba(255,255,255,0.1);
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f99c;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f18a;
        }

        .dropdown:hover .dropdown-content {
            display: block;
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
    </style>
</head>
<body>
    <div class="fancy">Welcome to MCC</div>
    <div class="fancy">Faculty Loading System</div>
    <div class="description">Browse through our services and log in for more advantages.</div>
    <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn"><span>Sign In</span></button>
            <div class="dropdown-content">
                <a href="login.php">Instructor Login</a>
                <a href="admin/login.php">Dean Login</a>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>Developed By <a href="https://www.facebook.com/xvennnnnn/">Haven Charles Papasin</a></p>
    </footer>
</body>
</html>