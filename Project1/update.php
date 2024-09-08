<?php
session_start();

if(empty($_SESSION["errorMessage"]))
    $_SESSION["errrorMessage"] = "";
$id = $_GET["id"];
include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
<head>
<meta charset = "utf-8">
    <title>Project1 - Update</title>
    <style type = "text/css">
        form{width:500px; margin:0px auto;}
        ul{list-style: none; margin-top:5px;}
        ul li{display:block; float:left; width:100%; height:1%;}
        label{float: left; padding: 7px; }
        span{color: #0000ff; font-weight: bold;}
        span#radios{ color: #000000; font-weight:normal; padding:0px; }
        input, select{float: right; margin-right: 10px; border: 1px solid #000; padding: 3px; width: 240px;}
        input[type="radio"]{float: none;  padding: 4px; width:30px; margin-left: 1px;}
        input[type="checkBox"]{float: none; margin-right: 1px;  width:70px;}
        input#submit{width: 248px;}
        div{width:250px;float: right;}
        /* input:focus{width: 50px;} */
        
        fieldset{padding: 10px; border: 1px solid #000; overflow: auto; margin:10px;}
        legend{color: #00000;  margin: 0 10px 0 0; padding:0 5px; font-size: 11px; font-weight:bold;}
    </style>
</head>
<body>
     <h1 style = "text-align: center;"> Project1 - Update </h1>
     <?php
     include("includes/menu.php");
     ?>

     <?php
        $sql = "SELECT BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover FROM P1Books WHERE BookID=".$id;
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
    ?>

     <form id="form0" name="form0" method="post" action="doUpdate.php">
        <fieldset>
            <legend>Insert into BookID table</legend>
            <ul>
                <li>
                    <label title="BookID" for = "BookID">Book ID</label>
                    <input name = "bookIDdis" id="bookIDdis" type="text" size="20" maxlength="3" disabled="disabled"
                    value = "<?php if($num_results!=0){echo(trim($row["BookID"]));}?>" />
                    <input name = "BookID" id="BookID" type="hidden" 
                    value = "<?php if($num_results!=0){echo(trim($row["BookID"]));}?>" />
                </li>
                <li>
                    <label title="Title" for = "Title">Title</label>
                    <input name = "Title" id="Title" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["Title"]));}  ?>">
                </li>

                <li>
                    <label title="Author" for = "Author">Author</label>
                    <input name = "Author" id="Author" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["Author"]));}  ?>">
                </li>


                <li>
                    <label title="Topic" for = "Topic">Topic</label>
                    <select name="Topic" id="Topic">
                        <option value="- Make -">- Make -</option>
                        <option value="Airplanes" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Airplanes")) ){echo("selected='selected'");} ?>>Airplanes</option>
                        <option value="Aliens" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Aliens")) ){echo("selected='selected'");} ?>>Aliens</option>
                        <option value="Animals" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Animals")) ){echo("selected='selected'");} ?>>Animals</option>
                        <option value="Camping" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Camping")) ){echo("selected='selected'");} ?>>Camping</option>
                        <option value="Crimes" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Crimes")) ){echo("selected='selected'");} ?>>Crimes</option>
                        <option value="Family" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Family")) ){echo("selected='selected'");} ?>>Family</option>
                        <option value="Games" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Games")) ){echo("selected='selected'");} ?>>Games</option>
                        <option value="Magic" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Magic")) ){echo("selected='selected'");} ?>>Magic</option>
                        <option value="Military" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Military")) ){echo("selected='selected'");} ?>>Military</option>
                        <option value="Music" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Music")) ){echo("selected='selected'");} ?>>Music</option>
                        <option value="Philosophy" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Philosophy")) ){echo("selected='selected'");} ?>>Philosophy</option>
                        <option value="Sports" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Sports")) ){echo("selected='selected'");} ?>>Sports</option>
                        <option value="Science" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Science")) ){echo("selected='selected'");} ?>>Science</option>
                        <option value="Trips" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Trips")) ){echo("selected='selected'");} ?>>Trips</option>
                        <option value="Others" <?php if( ($num_results!=0) && (trim($row["Topic"]=="Others")) ){echo("selected='selected'");} ?>>Others</option>
                    </select>
                </li>

                <li>
                    <label title="Genre" for = "Genre">Genre?</label>
                    <div>
                    <input name = "Genre" id="Genre" type="radio" value="Comedy"<?php if( ($num_results!=0) && (trim($row["Genre"]=="Comedy")) ){echo(" checked='checked'");} ?>/> Comedy
                    <input name = "Genre" id="Genre" type="radio" value="Fantasy"<?php if( ($num_results!=0) && (trim($row["Genre"]=="Fantasy")) ){echo(" checked='checked'");} ?>/> Fantasy
                    <input name = "Genre" id="Genre" type="radio" value="Mystery"<?php if( ($num_results!=0) && (trim($row["Genre"]=="Mystery")) ){echo(" checked='checked'");} ?>/> Mystery
                    <input name = "Genre" id="Genre" type="radio" value="Romance"<?php if( ($num_results!=0) && (trim($row["Genre"]=="Romance")) ){echo(" checked='checked'");} ?>/> Romance
                    <input name = "Genre" id="Genre" type="radio" value="War"<?php if( ($num_results!=0) && (trim($row["Genre"]=="War")) ){echo(" checked='checked'");} ?>/> War
                    <input name = "Genre" id="Genre" type="radio" value="Other"<?php if( ($num_results!=0) && (trim($row["Genre"]=="Other")) ){echo(" checked='checked'");} ?>/> Other
    </div>
                </li>


                <li>
                    <label title="ISBN" for = "ISBN">ISBN</label>
                    <input name = "ISBN" id="ISBN" type="text" size="13" maxlength="13" 
                    value = "<?php if($num_results != 0){echo(trim($row["ISBN"]));}  ?>">
                </li>

                <?php
                        if($num_results !=0)
                        {
                            //built in methods: substr, strpos, strlen
                            $PublishMonth = trim(substr($row["DatePublished"], 0, strpos(trim($row["DatePublished"])," ")));
                            $PublishYear   = trim(substr($row["DatePublished"], strpos($row["DatePublished"]," "),strlen(trim($row["DatePublished"])) ));
                        }
                ?>
                <li>
                    <label title="PublishMonth" for="PublishMonth"> Publish Month</label>
                    <select name = "PublishMonth">
                        <option value="-Month -"> - Month - </option>
                        <option value="Jan" <?php if(($num_results!=0) && ($PublishMonth=="Jan")){echo("selected='selected'");}?>>Jan</option>
                        <option value="Feb" <?php if(($num_results!=0) && ($PublishMonth=="Feb")){echo("selected='selected'");}?>>Feb</option>
                        <option value="Mar" <?php if(($num_results!=0) && ($PublishMonth=="Mar")){echo("selected='selected'");}?>>Mar</option>
                        <option value="Apr" <?php if(($num_results!=0) && ($PublishMonth=="Apr")){echo("selected='selected'");}?>>Apr</option>
                        <option value="May" <?php if(($num_results!=0) && ($PublishMonth=="May")){echo("selected='selected'");}?>>May</option>
                        <option value="Jun" <?php if(($num_results!=0) && ($PublishMonth=="Jun")){echo("selected='selected'");}?>>Jun</option>
                        <option value="Jul" <?php if(($num_results!=0) && ($PublishMonth=="Jul")){echo("selected='selected'");}?>>Jul</option>
                        <option value="Aug" <?php if(($num_results!=0) && ($PublishMonth=="Aug")){echo("selected='selected'");}?>>Aug</option>
                        <option value="Sep" <?php if(($num_results!=0) && ($PublishMonth=="Sep")){echo("selected='selected'");}?>>Sep</option>
                        <option value="Oct" <?php if(($num_results!=0) && ($PublishMonth=="Oct")){echo("selected='selected'");}?>>Oct</option>
                        <option value="Nov" <?php if(($num_results!=0) && ($PublishMonth=="Nov")){echo("selected='selected'");}?>>Nov</option>
                        <option value="Dec" <?php if(($num_results!=0) && ($PublishMonth=="Dec")){echo("selected='selected'");}?>>Dec</option>
                    </select>
                </li>


                <li>
                    <label title="PublishYear" for = "PublishYear">Publish Year</label>
                    <select name="PublishYear" id="PublishYear">
                        <option value="- Year -">- Year -</option>
                        <option value="2020"<?php if( ($num_results!=0) && ($PublishYear=="2020") ){echo("selected='selected'");} ?>>2020</option>
                        <option value="2019"<?php if( ($num_results!=0) && ($PublishYear=="2019") ){echo("selected='selected'");} ?>>2019</option>
                        <option value="2018"<?php if( ($num_results!=0) && ($PublishYear=="2018") ){echo("selected='selected'");} ?>>2018</option>
                        <option value="2017"<?php if( ($num_results!=0) && ($PublishYear=="2017") ){echo("selected='selected'");} ?>>2017</option>
                        <option value="2016"<?php if( ($num_results!=0) && ($PublishYear=="2016") ){echo("selected='selected'");} ?>>2016</option>
                        <option value="2015"<?php if( ($num_results!=0) && ($PublishYear=="2015") ){echo("selected='selected'");} ?>>2015</option>
                        <option value="2014"<?php if( ($num_results!=0) && ($PublishYear=="2014") ){echo("selected='selected'");} ?>>2014</option>
                        <option value="2013"<?php if( ($num_results!=0) && ($PublishYear=="2013") ){echo("selected='selected'");} ?>>2013</option>
                        <option value="2012"<?php if( ($num_results!=0) && ($PublishYear=="2012") ){echo("selected='selected'");} ?>>2012</option>
                        <option value="2011"<?php if( ($num_results!=0) && ($PublishYear=="2011") ){echo("selected='selected'");} ?>>2011</option>
                        <option value="2010"<?php if( ($num_results!=0) && ($PublishYear=="2010") ){echo("selected='selected'");} ?>>2010</option>
                        <option value="2009"<?php if( ($num_results!=0) && ($PublishYear=="2009") ){echo("selected='selected'");} ?>>2009</option>
                        <option value="2008"<?php if( ($num_results!=0) && ($PublishYear=="2008") ){echo("selected='selected'");} ?>>2008</option>
                        <option value="2007"<?php if( ($num_results!=0) && ($PublishYear=="2007") ){echo("selected='selected'");} ?>>2007</option>
                        <option value="2006"<?php if( ($num_results!=0) && ($PublishYear=="2006") ){echo("selected='selected'");} ?>>2006</option>
                        <option value="2005"<?php if( ($num_results!=0) && ($PublishYear=="2005") ){echo("selected='selected'");} ?>>2005</option>
                        <option value="2004"<?php if( ($num_results!=0) && ($PublishYear=="2004") ){echo("selected='selected'");} ?>>2004</option>
                        <option value="2003"<?php if( ($num_results!=0) && ($PublishYear=="2003") ){echo("selected='selected'");} ?>>2003</option>
                        <option value="2002"<?php if( ($num_results!=0) && ($PublishYear=="2002") ){echo("selected='selected'");} ?>>2002</option>
                        <option value="2001"<?php if( ($num_results!=0) && ($PublishYear=="2001") ){echo("selected='selected'");} ?>>2001</option>
                        <option value="2000"<?php if( ($num_results!=0) && ($PublishYear=="2000") ){echo("selected='selected'");} ?>>2000</option>
                        <option value="1999"<?php if( ($num_results!=0) && ($PublishYear=="1999") ){echo("selected='selected'");} ?>>1999</option>
                        <option value="1998"<?php if( ($num_results!=0) && ($PublishYear=="1998") ){echo("selected='selected'");} ?>>1998</option>
                        <option value="1997"<?php if( ($num_results!=0) && ($PublishYear=="1997") ){echo("selected='selected'");} ?>>1997</option>
                        <option value="1996"<?php if( ($num_results!=0) && ($PublishYear=="1996") ){echo("selected='selected'");} ?>>1996</option>
                        <option value="1995"<?php if( ($num_results!=0) && ($PublishYear=="1995") ){echo("selected='selected'");} ?>>1995</option>
                        <option value="1994"<?php if( ($num_results!=0) && ($PublishYear=="1994") ){echo("selected='selected'");} ?>>1994</option>
                        <option value="1993"<?php if( ($num_results!=0) && ($PublishYear=="1993") ){echo("selected='selected'");} ?>>1993</option>
                        <option value="1992"<?php if( ($num_results!=0) && ($PublishYear=="1992") ){echo("selected='selected'");} ?>>1992</option>
                        <option value="1991"<?php if( ($num_results!=0) && ($PublishYear=="1991") ){echo("selected='selected'");} ?>>1991</option>
                        <option value="1990"<?php if( ($num_results!=0) && ($PublishYear=="1990") ){echo("selected='selected'");} ?>>1990</option>
                        <option value="1989"<?php if( ($num_results!=0) && ($PublishYear=="1989") ){echo("selected='selected'");} ?>>1989</option>
                        <option value="1988"<?php if( ($num_results!=0) && ($PublishYear=="1988") ){echo("selected='selected'");} ?>>1988</option>
                        <option value="1987"<?php if( ($num_results!=0) && ($PublishYear=="1987") ){echo("selected='selected'");} ?>>1987</option>
                        <option value="1986"<?php if( ($num_results!=0) && ($PublishYear=="1986") ){echo("selected='selected'");} ?>>1986</option>
                        <option value="1985"<?php if( ($num_results!=0) && ($PublishYear=="1985") ){echo("selected='selected'");} ?>>1985</option>
                        <option value="1984"<?php if( ($num_results!=0) && ($PublishYear=="1984") ){echo("selected='selected'");} ?>>1984</option>
                        <option value="1983"<?php if( ($num_results!=0) && ($PublishYear=="1983") ){echo("selected='selected'");} ?>>1983</option>
                        <option value="1982"<?php if( ($num_results!=0) && ($PublishYear=="1982") ){echo("selected='selected'");} ?>>1982</option>
                        <option value="1981"<?php if( ($num_results!=0) && ($PublishYear=="1981") ){echo("selected='selected'");} ?>>1981</option>
                        <option value="1980"<?php if( ($num_results!=0) && ($PublishYear=="1980") ){echo("selected='selected'");} ?>>1980</option>
                        <option value="1979"<?php if( ($num_results!=0) && ($PublishYear=="1979") ){echo("selected='selected'");} ?>>1979</option>
                        <option value="1978"<?php if( ($num_results!=0) && ($PublishYear=="1978") ){echo("selected='selected'");} ?>>1978</option>
                        <option value="1977"<?php if( ($num_results!=0) && ($PublishYear=="1977") ){echo("selected='selected'");} ?>>1977</option>
                        <option value="1976"<?php if( ($num_results!=0) && ($PublishYear=="1976") ){echo("selected='selected'");} ?>>1976</option>
                        <option value="1975"<?php if( ($num_results!=0) && ($PublishYear=="1975") ){echo("selected='selected'");} ?>>1975</option>
                        <option value="1974"<?php if( ($num_results!=0) && ($PublishYear=="1974") ){echo("selected='selected'");} ?>>1974</option>
                        <option value="1973"<?php if( ($num_results!=0) && ($PublishYear=="1973") ){echo("selected='selected'");} ?>>1973</option>
                        <option value="1972"<?php if( ($num_results!=0) && ($PublishYear=="1972") ){echo("selected='selected'");} ?>>1972</option>
                        <option value="1971"<?php if( ($num_results!=0) && ($PublishYear=="1971") ){echo("selected='selected'");} ?>>1971</option>
                        <option value="1970"<?php if( ($num_results!=0) && ($PublishYear=="1970") ){echo("selected='selected'");} ?>>1970</option>
                        <option value="1969"<?php if( ($num_results!=0) && ($PublishYear=="1969") ){echo("selected='selected'");} ?>>1969</option>
                        <option value="1968"<?php if( ($num_results!=0) && ($PublishYear=="1968") ){echo("selected='selected'");} ?>>1968</option>
                        <option value="1967"<?php if( ($num_results!=0) && ($PublishYear=="1967") ){echo("selected='selected'");} ?>>1967</option>
                        <option value="1966"<?php if( ($num_results!=0) && ($PublishYear=="1966") ){echo("selected='selected'");} ?>>1966</option>
                        <option value="1965"<?php if( ($num_results!=0) && ($PublishYear=="1965") ){echo("selected='selected'");} ?>>1965</option>
                        <option value="1964"<?php if( ($num_results!=0) && ($PublishYear=="1964") ){echo("selected='selected'");} ?>>1964</option>
                        <option value="1963"<?php if( ($num_results!=0) && ($PublishYear=="1963") ){echo("selected='selected'");} ?>>1963</option>
                        <option value="1962"<?php if( ($num_results!=0) && ($PublishYear=="1962") ){echo("selected='selected'");} ?>>1962</option>
                        <option value="1961"<?php if( ($num_results!=0) && ($PublishYear=="1961") ){echo("selected='selected'");} ?>>1961</option>
                        <option value="1960"<?php if( ($num_results!=0) && ($PublishYear=="1960") ){echo("selected='selected'");} ?>>1960</option>
                    </select>
                </li>

                <li>
                    <label title="Hardcover" for = "Hardcover">Hard Cover?</label>
                    <div>
                    <input name = "Hardcover" id="Hardcover" type="checkbox" value="Yes"<?php if( ($num_results!=0) && (trim($row["Hardcover"]=="Yes")) ){echo(" checked='checked'");} ?>/> Yes
                    <input name = "Hardcover" id="Hardcover" type="checkbox" value="No"<?php if( ($num_results!=0) && (trim($row["Hardcover"]=="No")) ){echo(" checked='checked'");} ?>/> No
                    </div>
                </li>

                <li>
                    <span><?php echo($_SESSION["errorMessage"]);?></span>
                </li>
                <li>
                    <input type="submit" value="Update Info" name="submit" id="submit" />
                </li>
            </ul>
        </fieldset>
    </form>
    <?php
        $_SESSION["errorMessage"] = "";
    ?>
    <script type="text/javascript">
        document.getElementById("BookID").focus();
    </script>

</body>
</html>