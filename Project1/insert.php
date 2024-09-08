<?php
session_start();
include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
<head>
    <meta charset = "utf-8"/>
    <title>Project 1 - Insert</title>
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
     <h1 style = "text-align: center;"> Project 1 - Insert </h1>
     <?php
     include("includes/menu.php");
     ?>

     <form id="form0" name="form0" method="post" action="doInsert.php">
        <fieldset>
            <legend>Insert into Project 1 table</legend>
            <ul>
                <li>
                    <label title="BookID" for = "BookID">BookID</label>
                    <input name = "BookID" id="BookID" type="text" size="20" maxlength="3" />
                </li>

                <li>
                    <label title="Title" for = "Title">Title</label>
                    <input name = "Title" id="Title" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="Author" for = "Author">Author</label>
                    <input name = "Author" id="Author" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="Topic" for = "Topic">Topic</label>
                    <select name="Topic" id="Topic">
                        <option value="- Topic -">- Topic -</option>
                        <option value="Airplanes">Airplanes</option>
                        <option value="Aliens">Aliens</option>
                        <option value="Animals">Animals</option>
                        <option value="Camping">Camping</option>
                        <option value="Crimes">Crimes</option>
                        <option value="Family">Family</option>
                        <option value="Games">Games</option>
                        <option value="Magic">Magic</option>
                        <option value="Military">Military</option>
                        <option value="Music">Music</option>
                        <option value="Philosophy">Philosophy</option>
                        <option value="Sports">Sports</option>
                        <option value="Science">Science</option>
                        <option value="Trips">Trips</option>
                        <option value="Others">Others</option>
                    </select>
                </li>
                <li>
                    <label title="Genre" for = "Genre">Genre</label>
                    <div>
                        <input name = "Genre" id="Genre" type="radio" value="Comedy"/> Comedy
                        <!-- <input name = "Genre" id="Genre" type="radio" value="Horror"/> Horror -->
                        <input name = "Genre" id="Genre" type="radio" value="Fantasy"/> Fantasy
                        <input name = "Genre" id="Genre" type="radio" value="Mystery"/> Mystery
                        <input name = "Genre" id="Genre" type="radio" value="Romance"/> Romance
                        <input name = "Genre" id="Genre" type="radio" value="War"/> War
                        <input name = "Genre" id="Genre" type="radio" value="Other"/> Other
                    </div>
                </li>
                <li>
                    <label title="ISBN" for = "ISBN">ISBN</label>
                    <input name = "ISBN" id="ISBN" type="text" size="13" maxlength="13" />
                </li>
                <label title="PublishMonth" for="PublishMonth">Published Month</label>
                    <select name = "PublishMonth">
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
                    <label title="PublishYear" for = "PublishYear">Published Year</label>
                    <select name="PublishYear" id="PublishYear">
                        <option value="- Year -">- Year -</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                    </select>
                </li>

                <li>
                    <label title="Hardcover" for = "Hardcover">Hard Cover</label>
                    <div>
                        <input name = "Hardcover" id="Hardcover" type="checkbox" value="Yes"/> Yes
                        <input name = "Hardcover" id="Hardcover" type="checkbox" value="No"/> No
                    </div>
                </li>

                <li>
                    <span><?php echo($_SESSION["errorMessage"]);?></span>
                </li>

                <li>
                    <input type="submit" value="Insert Info" name="submit" id="submit" />
                </li>
            </ul>
        </fieldset>
    </form>

    <?php
        $_SESSION["errorMessage"] = "";
    ?>
    <script type="text/javascript">
        document.getElementById("bookID").focus();
    </script>

</body>
</html>