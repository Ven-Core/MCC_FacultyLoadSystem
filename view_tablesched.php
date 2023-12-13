<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="admin/img/MCC_LOGO.ico" type="image/x-icon">
    <title>Grid Schedules</title>

    <?php
    include('admin/db_connect.php');
    if(!isset($_SESSION['login_id']))
        header('location:login.php');
    include('./header.php'); 
    ?>

    <!-- Include html2pdf library ni yawa kapoya-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            background-image: url('admin/img/mccbgblur.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .container {
            width: 80%;
            overflow: hidden;
        }

        header {
            background: #028323;
            color: white;
            padding-top: 10px;
            padding-bottom: 10px;
            min-height: 50px;
            border-bottom: #e8491d 4px solid;
            width: 100%;
            box-sizing: border-box;
        }

        header a {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 14px;
            margin-top: 5px;
            display: inline-block;
        }

        header #branding {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header #branding img {
            height: 50px;
            margin-right: 10px;
        }

        button {
            cursor: pointer;
            font-weight: 700;
            font-family: Helvetica, "sans-serif";
            transition: all .2s;
            padding: 8px 16px;
            border-radius: 20px;
            background: #cfef00;
            border: 1px solid transparent;
            display: flex;
            align-items: center;
            font-size: 15px;
        }

        button:hover {
            background: #c4e201;
        }

        button > svg {
            width: 34px;
            margin-left: 10px;
            transition: transform .3s ease-in-out;
        }

        button:hover svg {
            transform: translateX(5px);
        }

        button:active {
            transform: scale(0.95);
        }

        header #branding h1 {
            margin: 0;
            margin-left: -300px;
        }

        header #branding h1 a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: inline-block;
        }

        header #branding h1 a span {
            color: #5383d3;
        }

        table {
            width: 80%;
            background-color: rgba(255, 255, 255, 0.651);
            border-collapse: collapse;
            margin: 20px auto;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
  
        th, td {
            border: 1px solid #000000a4;
            padding: 8px;
            text-align: left;
        }
  
        th {
            background-color: #f2f2f2;
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

        header #branding button {
            margin-right: 5px;
            order: 1;
        }

        button#dashboardBtn {
            margin-left: -300px;
            order: 2;
        }
    </style>

    <script>
        function redirectToDashboard() {
            window.location.href = 'dashboard.php';
        }

        function convertToPDF() {
            var element = document.querySelector('table');

            var options = {
                margin: 10,
                filename: 'schedules.pdf',
                image: { type: 'png', quality: 1000 },
                html2canvas: { scale: 5 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
            };

            html2pdf(element, options);
        }
    </script>
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <img src="admin/img/MCC_LOGO.png" alt="Logo">
                <h1><span>Table</span> Schedules</h1>
                <button id="pdfBtn" onclick="convertToPDF()">
                    Export to PDF
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14M5 12h14"/>
                    </svg>
                </button>
                <button id="dashboardBtn" onclick="redirectToDashboard()">
                    Dashboard
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <?php
    function generateScheduleTable($conn, $userId) {
        $query = "SELECT * FROM schedules WHERE faculty_id = $userId";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<table>
                    <thead>
                        <tr>
                            <th>Subject Name</th>
                            <th>Description</th>
                            <th>Room no.</th>
                            <th>Time Start</th>
                            <th>Time End</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["title"] . "</td>
                        <td>" . $row["description"] . "</td>
                        <td>" . $row["location"] . "</td>
                        <td>" . $row["time_from"] . "</td>
                        <td>" . $row["time_to"] . "</td>
                    </tr>";
            }

            echo "</tbody></table>";
        } else {
            $colspan = 5;
            echo "<table>
                    <thead>
                        <tr>
                            <th>Subject Name</th>
                            <th>Description</th>
                            <th>Room no.</th>
                            <th>Time Start</th>
                            <th>Time End</th>
                        </tr>
                    </thead>
                    <tbody>";
            echo "<tr>
                        <td colspan=\"$colspan\" style=\"text-align: center;\">You don't have any assigned schedule for now</td>
                    </tr>";
        }
    }

    $userId = $_SESSION['login_id'];
    generateScheduleTable($conn, $userId);
    $conn->close();
    ?>
    <footer class="footer">
        <p>Developed By <a href="https://www.facebook.com/xvennnnnn/">Haven Charles Papasin</a></p>
    </footer>
</body>
</html>
