<?php
session_start();
include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
<head>
    <meta charset = "utf-8"/>
    <title>Assign07 - Insert Project</title>
    <style type = "text/css">
        form{width:450px margin:0px auto;}
        ul{list-style: none; margin-top:5px}
        ul li{display:block; float:left; width:100%; height:1%;}
        label{float: left; padding-left:-30px;}
        span{color: #ff0000; font-weight: bold;}
        input, select{float: right; margin: 10px; border: 1px solid #00000; padding: 3px; width: 240px;}
        #submit{width: 248px;}
        input:focus{border: 1px solid #999999;}
        fieldset{padding: 10px; border: 1px solid #000000; width: 450px; overflow: auto; margin:10px;}
        legend{color: #00000;  margin: 0 10px 0 0; padding:0 5px; font-size: 11px; font-weight:bold;}
    </style>
</head>

<body>
     <h1 style = "text-align: center;"> Assign07 - Insert Project</h1>
     <?php
     include("includes/menu.php");
     ?>

     <form id="form0" name="form0" method="post" action="doInsertProject.php">
        <fieldset>
            <legend>Insert into projects table</legend>
            <ul>
                <li>
                    <label title="ProjectID" for = "ProjectID">ProjectID</label>
                    <input name = "ProjectID" id="ProjectID" type="text" size="20" maxlength="3" />
                </li>

                <li>
                    <label title="ProjName" for = "ProjName">Project Name</label>
                    <input name = "ProjName" id="ProjName" type="text" size="20" maxlength="20" />
                </li>

                
                <li>
                    <label title="ProjCategory" for = "ProjCategory">Category</label>
                    <select name= "ProjCategory">
                        <option value = "- Category -">- Category -</option>
                        <option value = "Commercial">Commercial</option>
                        <option value = "Residential">Residential</option>
                    </select>

                </li>


                <li>
                    <label title="ProjDesc" for = "ProjDesc">Project Description</label>
                    <input name = "ProjDesc" id="ProjDesc" type="text" size="20" maxlength="20" />
                </li>


                <li>
                    <label title="StartMonth" for="StartMonth"> Start Month</label>
                    <select name = "StartMonth">
                        <option value="-Month -"> - Month - </option>
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                    </select>
                </li>

                <li>
                    <label title="StartDay" for="StartDay"> Start Day</label>
                    <select name = "StartDay">
                        <option value="-Day -"> - Day - </option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        </select>
                </li>

                <li>
                    <label title="EndMonth" for="EndMonth"> End Month</label>
                    <select name = "EndMonth">
                        <option value="-Month -"> - Month - </option>
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                    </select>
                </li>

                <li>
                    <label title="EndDay" for="EndDay"> End Day</label>
                    <select name = "EndDay">
                        <option value="-Day -"> - Day - </option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        </select>
                </li>

                <li>
                    <span><?php echo($_SESSION["errorMessage"]);?></span>
                </li>

                <li>
                    <input type="submit" value="Insert Project" name="submit" id="submit" />
                </li>
            </ul>
        </fieldset>
    </form>

    <?php
        $_SESSION["errorMessage"] = "";
    ?>
    <script type="text/javascript">
        document.getElementById("ProjectID").focus();
    </script>

</body>
</html>