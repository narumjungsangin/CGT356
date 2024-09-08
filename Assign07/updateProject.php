<?php
session_start();
if(empty($_SESSION["errorMessage"]))
    $_SESSION["errorMessage"] = "";

include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
<head>
    <meta charset = "utf-8"/>
    <title>Assign07 - Update</title>
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
     <h1 style = "text-align: center;"> Assign07 - Update </h1>
     <?php
     include("includes/menu.php");
    //prepare my sql statement
    $sql = "SELECT * FROM Assign06Projects WHERE ProjectID=46"; //46에 고정
    $result = mysqli_query($db, $sql);

    if(empty($result))
    {
        $num_results = 0;
    }

    else
    {
        $num_results = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
    }
        if($num_results == 0)
            $_SESSION["errorMessage"] = "You must enter 46";
     ?>

     <form id="form0" name="form0" method="post" action="doUpdateProject.php">
        <fieldset>
            <legend>Update projects table</legend>
            <ul>
                <li>
                    <label title="ProjectID" for = "projectIDdis">ProjectID</label>

                    <input name = "projectIDdis" id="projectIDdis" type="text" size="20" maxlength="3" disabled="disabled"
                    value = "<?php if($num_results!=0){echo($row["ProjectID"]);}?>" />

                    <input name = "projectID" id="projectID" type="hidden" 
                    value = "<?php if($num_results!=0){echo($row["ProjectID"]);}?>" />
                </li>

                <li>
                    <label title="ProjName" for = "projName">Project Name</label>                    <!-- Ask professor about Capitalization!! -->
                    <input name = "projName" id="projName" type="text" size="20" maxlength="30"
                    value="<?php if($num_results !=0){echo($row["ProjName"]);}?>" />
                </li>



                <li>
                    <label title="ProjCategory" for = "projCategory">Project Catgory</label>
                    <select name="projCategory">
                        <option value = "- Category -">- Category -</option>
                        <option value = "Commercial"<?php if(($num_results != 0) && ($row["ProjCategory"])== "Commercial"){echo("selected ='selected'");}  ?>>Commercial</option>
                        <option value = "Residential"<?php if(($num_results != 0) && ($row["ProjCategory"])== "Residential"){echo("selected ='selected'");}  ?>>Residential</option>
                    </select>
                </li>

                <li>
                    <label title="ProjDescription" for = "projDesc">Project Description</label>
                    <input name = "projDesc" id="projDesc" type="text" size="20" maxlength="30"
                    value="<?php if($num_results !=0){echo($row["ProjDesc"]);}?>" />
                </li>

                <?php
                if($num_results !=0)
                {
                    //built in methods: substr, strpos, strlen
                    $startMonth = trim(substr($row["StartDate"], 0, strpos(trim($row["StartDate"])," ")));
                    $startDay   = trim(substr($row["StartDate"], strpos($row["StartDate"]," "),strlen(trim($row["StartDate"])) ));
                    $endMonth = trim(substr($row["EndDate"], 0, strpos(trim($row["EndDate"])," ")));
                    $endDay   = trim(substr($row["EndDate"], strpos($row["EndDate"]," "),strlen(trim($row["EndDate"])) ));
                }
                ?>
                
                <li>
                    <label title="StartMonth" for="startMonth"> Start Month</label>
                    <select name = "startMonth">
                        <option value="-Month -">- Month -</option>
                        <option value="Jan" <?php if(($num_results!=0) && ($startMonth=="Jan")){echo("selected='selected'");}?>>Jan</option>
                        <option value="Feb" <?php if(($num_results!=0) && ($startMonth=="Feb")){echo("selected='selected'");}?>>Feb</option>
                        <option value="Mar" <?php if(($num_results!=0) && ($startMonth=="Mar")){echo("selected='selected'");}?>>Mar</option>
                        <option value="Apr" <?php if(($num_results!=0) && ($startMonth=="Apr")){echo("selected='selected'");}?>>Apr</option>
                        <option value="May" <?php if(($num_results!=0) && ($startMonth=="May")){echo("selected='selected'");}?>>May</option>
                        <option value="Jun" <?php if(($num_results!=0) && ($startMonth=="Jun")){echo("selected='selected'");}?>>Jun</option>
                        <option value="Jul" <?php if(($num_results!=0) && ($startMonth=="Jul")){echo("selected='selected'");}?>>Jul</option>
                        <option value="Aug" <?php if(($num_results!=0) && ($startMonth=="Aug")){echo("selected='selected'");}?>>Aug</option>
                        <option value="Sep" <?php if(($num_results!=0) && ($startMonth=="Sep")){echo("selected='selected'");}?>>Sep</option>
                        <option value="Oct" <?php if(($num_results!=0) && ($startMonth=="Oct")){echo("selected='selected'");}?>>Oct</option>
                        <option value="Nov" <?php if(($num_results!=0) && ($startMonth=="Nov")){echo("selected='selected'");}?>>Nov</option>
                        <option value="Dec" <?php if(($num_results!=0) && ($startMonth=="Dec")){echo("selected='selected'");}?>>Dec</option>
                    </select>
                </li>

                <li>
                    <label title="StartDay" for="startDay"> Start Day</label>
                    <select name = "startDay">
                        <option value="-Day -">- Day -</option>
                        <option value="01"<?php if( ($num_results!=0) && ($startDay=="01")){echo("selected='selected'");} ?>>01</option>
                        <option value="02"<?php if( ($num_results!=0) && ($startDay=="02")){echo("selected='selected'");} ?>>02</option>
                        <option value="03"<?php if( ($num_results!=0) && ($startDay=="03")){echo("selected='selected'");} ?>>03</option>
                        <option value="04"<?php if( ($num_results!=0) && ($startDay=="04")){echo("selected='selected'");} ?>>04</option>
                        <option value="05"<?php if( ($num_results!=0) && ($startDay=="05")){echo("selected='selected'");} ?>>05</option>
                        <option value="06"<?php if( ($num_results!=0) && ($startDay=="06")){echo("selected='selected'");} ?>>06</option>
                        <option value="07"<?php if( ($num_results!=0) && ($startDay=="07")){echo("selected='selected'");} ?>>07</option>
                        <option value="08"<?php if( ($num_results!=0) && ($startDay=="08")){echo("selected='selected'");} ?>>08</option>
                        <option value="09"<?php if( ($num_results!=0) && ($startDay=="09")){echo("selected='selected'");} ?>>09</option>
                        <option value="10"<?php if( ($num_results!=0) && ($startDay=="10")){echo("selected='selected'");} ?>>10</option>
                        <option value="11"<?php if( ($num_results!=0) && ($startDay=="11")){echo("selected='selected'");} ?>>11</option>
                        <option value="12"<?php if( ($num_results!=0) && ($startDay=="12")){echo("selected='selected'");} ?>>12</option>
                        <option value="13"<?php if( ($num_results!=0) && ($startDay=="13")){echo("selected='selected'");} ?>>13</option>
                        <option value="14"<?php if( ($num_results!=0) && ($startDay=="14")){echo("selected='selected'");} ?>>14</option>
                        <option value="15"<?php if( ($num_results!=0) && ($startDay=="15")){echo("selected='selected'");} ?>>15</option>
                        <option value="16"<?php if( ($num_results!=0) && ($startDay=="16")){echo("selected='selected'");} ?>>16</option>
                        <option value="17"<?php if( ($num_results!=0) && ($startDay=="17")){echo("selected='selected'");} ?>>17</option>
                        <option value="18"<?php if( ($num_results!=0) && ($startDay=="18")){echo("selected='selected'");} ?>>18</option>
                        <option value="19"<?php if( ($num_results!=0) && ($startDay=="19")){echo("selected='selected'");} ?>>19</option>
                        <option value="20"<?php if( ($num_results!=0) && ($startDay=="20")){echo("selected='selected'");} ?>>20</option>
                        <option value="21"<?php if( ($num_results!=0) && ($startDay=="21")){echo("selected='selected'");} ?>>21</option>
                        <option value="22"<?php if( ($num_results!=0) && ($startDay=="22")){echo("selected='selected'");} ?>>22</option>
                        <option value="23"<?php if( ($num_results!=0) && ($startDay=="23")){echo("selected='selected'");} ?>>23</option>
                        <option value="24"<?php if( ($num_results!=0) && ($startDay=="24")){echo("selected='selected'");} ?>>24</option>
                        <option value="25"<?php if( ($num_results!=0) && ($startDay=="25")){echo("selected='selected'");} ?>>25</option>
                        <option value="26"<?php if( ($num_results!=0) && ($startDay=="26")){echo("selected='selected'");} ?>>26</option>
                        <option value="27"<?php if( ($num_results!=0) && ($startDay=="27")){echo("selected='selected'");} ?>>27</option>
                        <option value="28"<?php if( ($num_results!=0) && ($startDay=="28")){echo("selected='selected'");} ?>>28</option>
                        <option value="29"<?php if( ($num_results!=0) && ($startDay=="29")){echo("selected='selected'");} ?>>29</option>
                        <option value="30"<?php if( ($num_results!=0) && ($startDay=="30")){echo("selected='selected'");} ?>>30</option>
                        <option value="31"<?php if( ($num_results!=0) && ($startDay=="31")){echo("selected='selected'");} ?>>31</option>
                        </select>
                </li>

                <li>
                    <label title="EndMonth" for="endMonth"> End Month</label>
                    <select name = "endMonth">
                        <option value="-Month -">- Month -</option>
                        <option value="Jan"<?php if( ($num_results!=0) && ($endMonth=="Jan")){echo("selected='selected'");} ?>>Jan</option>
                        <option value="Feb"<?php if( ($num_results!=0) && ($endMonth=="Feb")){echo("selected='selected'");} ?>>Feb</option>
                        <option value="Mar"<?php if( ($num_results!=0) && ($endMonth=="Mar")){echo("selected='selected'");} ?>>Mar</option>
                        <option value="Apr"<?php if( ($num_results!=0) && ($endMonth=="Apr")){echo("selected='selected'");} ?>>Apr</option>
                        <option value="May"<?php if( ($num_results!=0) && ($endMonth=="May")){echo("selected='selected'");} ?>>May</option>
                        <option value="Jun"<?php if( ($num_results!=0) && ($endMonth=="Jun")){echo("selected='selected'");} ?>>Jun</option>
                        <option value="Jul"<?php if( ($num_results!=0) && ($endMonth=="Jul")){echo("selected='selected'");} ?>>Jul</option>
                        <option value="Aug"<?php if( ($num_results!=0) && ($endMonth=="Aug")){echo("selected='selected'");} ?>>Aug</option>
                        <option value="Sep"<?php if( ($num_results!=0) && ($endMonth=="Sep")){echo("selected='selected'");} ?>>Sep</option>
                        <option value="Oct"<?php if( ($num_results!=0) && ($endMonth=="Oct")){echo("selected='selected'");} ?>>Oct</option>
                        <option value="Nov"<?php if( ($num_results!=0) && ($endMonth=="Nov")){echo("selected='selected'");} ?>>Nov</option>
                        <option value="Dec"<?php if( ($num_results!=0) && ($endMonth=="Dec")){echo("selected='selected'");} ?>>Dec</option>
                    </select>
                </li>

                <li>
                    <label title="EndDay" for="endDay"> End Day</label>
                    <select name = "endDay">
                        <option value="-Day -">- Day -</option>
                        <option value="01"<?php if( ($num_results!=0) && ($endDay=="01")){echo("selected='selected'");} ?>>01</option>
                        <option value="02"<?php if( ($num_results!=0) && ($endDay=="02")){echo("selected='selected'");} ?>>02</option>
                        <option value="03"<?php if( ($num_results!=0) && ($endDay=="03")){echo("selected='selected'");} ?>>03</option>
                        <option value="04"<?php if( ($num_results!=0) && ($endDay=="04")){echo("selected='selected'");} ?>>04</option>
                        <option value="05"<?php if( ($num_results!=0) && ($endDay=="05")){echo("selected='selected'");} ?>>05</option>
                        <option value="06"<?php if( ($num_results!=0) && ($endDay=="06")){echo("selected='selected'");} ?>>06</option>
                        <option value="07"<?php if( ($num_results!=0) && ($endDay=="07")){echo("selected='selected'");} ?>>07</option>
                        <option value="08"<?php if( ($num_results!=0) && ($endDay=="08")){echo("selected='selected'");} ?>>08</option>
                        <option value="09"<?php if( ($num_results!=0) && ($endDay=="09")){echo("selected='selected'");} ?>>09</option>
                        <option value="10"<?php if( ($num_results!=0) && ($endDay=="10")){echo("selected='selected'");} ?>>10</option>
                        <option value="11"<?php if( ($num_results!=0) && ($endDay=="11")){echo("selected='selected'");} ?>>11</option>
                        <option value="12"<?php if( ($num_results!=0) && ($endDay=="12")){echo("selected='selected'");} ?>>12</option>
                        <option value="13"<?php if( ($num_results!=0) && ($endDay=="13")){echo("selected='selected'");} ?>>13</option>
                        <option value="14"<?php if( ($num_results!=0) && ($endDay=="14")){echo("selected='selected'");} ?>>14</option>
                        <option value="15"<?php if( ($num_results!=0) && ($endDay=="15")){echo("selected='selected'");} ?>>15</option>
                        <option value="16"<?php if( ($num_results!=0) && ($endDay=="16")){echo("selected='selected'");} ?>>16</option>
                        <option value="17"<?php if( ($num_results!=0) && ($endDay=="17")){echo("selected='selected'");} ?>>17</option>
                        <option value="18"<?php if( ($num_results!=0) && ($endDay=="18")){echo("selected='selected'");} ?>>18</option>
                        <option value="19"<?php if( ($num_results!=0) && ($endDay=="19")){echo("selected='selected'");} ?>>19</option>
                        <option value="20"<?php if( ($num_results!=0) && ($endDay=="20")){echo("selected='selected'");} ?>>20</option>
                        <option value="21"<?php if( ($num_results!=0) && ($endDay=="21")){echo("selected='selected'");} ?>>21</option>
                        <option value="22"<?php if( ($num_results!=0) && ($endDay=="22")){echo("selected='selected'");} ?>>22</option>
                        <option value="23"<?php if( ($num_results!=0) && ($endDay=="23")){echo("selected='selected'");} ?>>23</option>
                        <option value="24"<?php if( ($num_results!=0) && ($endDay=="24")){echo("selected='selected'");} ?>>24</option>
                        <option value="25"<?php if( ($num_results!=0) && ($endDay=="25")){echo("selected='selected'");} ?>>25</option>
                        <option value="26"<?php if( ($num_results!=0) && ($endDay=="26")){echo("selected='selected'");} ?>>26</option>
                        <option value="27"<?php if( ($num_results!=0) && ($endDay=="27")){echo("selected='selected'");} ?>>27</option>
                        <option value="28"<?php if( ($num_results!=0) && ($endDay=="28")){echo("selected='selected'");} ?>>28</option>
                        <option value="29"<?php if( ($num_results!=0) && ($endDay=="29")){echo("selected='selected'");} ?>>29</option>
                        <option value="30"<?php if( ($num_results!=0) && ($endDay=="30")){echo("selected='selected'");} ?>>30</option>
                        <option value="31"<?php if( ($num_results!=0) && ($endDay=="31")){echo("selected='selected'");} ?>>31</option>
                        </select>
                </li>


                <li>
                    <span><?php echo($_SESSION["errorMessage"]);?></span>
                </li>

                <li>
                    <input type="submit" value="Update Project" name="submit" id="submit" />
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