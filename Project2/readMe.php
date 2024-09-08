
<?php
session_start();
include("includes/OpenDbConn.php");

?>

<!doctype html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Project2 Home</title>
    <style type = "text/css">
        html, body, h1 {
        margin: 0;
        padding: 0;
        } 
        body {
    padding-top: 130px; /* Adjust this value based on the height of your header */
    margin: 0; /* Reset default margin */
}
ul li{display:block; float:left; width:100%; height:1%;}

#header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 130px;
    background-color: pink;
    margin: 0;
    padding: 0;
    z-index: 1000;
}

h1 {
    padding-top: 20px;
    text-align: center;
}
content{text-align:center;}
    </style>
</head>
<body>
    <div id="header">
        <h1 style="text-align:center">Project 2 - ReadMe</h1>
        <?php
            include("includes/menu.php");
        ?>
    </div>

    <div id="content">
    Hello, I made this.
	</div>	

    <div id="footer">CGT 356 Project 2 Junsu Yoon</div>
</body>
</html>