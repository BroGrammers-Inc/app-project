<!doctype html>
<html>
    <?php
    session_start();
    ?>
    <head><title>Welcome</title></head>
    
    <!--FOR SEARCH BAR AGAIN-->
    
    <body><form action="se1.php" method="post" >
        <input type="text" name="sea" id="sear" placeholder="search here......"  >
        <input type="submit" name="sbut" value="SUBMIT" id="sbut">
    </form>
    </body>
    
    <!-- CODE FOR SEARCH ELEMENT PERSISTENCE -->
    <script src="/jquery-3.1.1.js">
    </script>
    
    <?php
    $SER = (isset($_POST["sea"]))?$_POST["sea"]:'';
    ?>
    
    <script >
        var searc = '<?php echo $SER; ?>';
        $('#sear').val(searc);
    </script>
    
    <!-- MAIN SEARCH HAPPENS HERE -->
    <section>
    <h1>Search results from nearby locations</h1>
        <div> 
            
            <?php
            define('DB_NAME','project');
            define('DB_USER','root');
            define('DB_PASSWORD','');
            define('DB_HOST','localhost');
            $link= new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if(isset($_POST["sea"])){$ser = $_POST["sea"];}
            else{$ser="";}
            if($ser!=""){
             $ser =  mysql_real_escape_string($ser);
            $res = $link->query("select * from LOCATION where Concat(NAME, '', NAME2) like '%$ser%'");    
            if ($res->num_rows > 0) {
                 echo " <table border='2px'>
                            <tr id='hrow'>
                            <td>S.No</td>
                            <td>Name</td>
                            <td>GOTO</td>
                        </tr>";
                while($row = $res->fetch_assoc()) 
                    {
                        echo ' <tr>
                                    <td>'.$row["ID"].'</td>
                                    <td>'.$row["NAME"].' '.$row["NAME2"].'</td>
                                    <td><p>
                                        <form action="mapsdisplay.php">
                                        <input type="submit" value="GOTO" id='.$row["ID"].' >
                                        </p> 
                                    </td>
                                    </tr>';

                    }
            } else
                {echo "0 results";}
            $link->close();
            echo "</table>";
            echo "      <h2 align='right'>
                            <form action='/WEB_APP/modules/maps/maps.html'>
                                  <input type='submit' value='MORE RESULTS'>
                            </form>
                        </h2>";
            }
            else
                {echo "0 results";}
            ?>
            
        </div>
        
    <script>
        
    </script>
        
    </section>
    
    <section>
    <h1>Search results from faculty database</h1>
        <div>
        <?php
            $link= new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if(isset($_POST["sea"])){$ser = $_POST["sea"];}
            else{$ser="";}
            if($ser!=""){
             $ser =  mysql_real_escape_string($ser);
            $res = $link->query("select * from uietdb where Concat(name, '', phone, '', designation, '',department, '',description) like '%$ser%'");    
           
            if ($res->num_rows > 0) {
                 echo " <table border='2px'>
                            <tr id='hrow'>
                            <td>S.No</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Department</td>
                            <td>Designation</td>
                            <td>Description</td>
                        </tr>";
                
                while($row = $res->fetch_assoc()) 
                    {
                        echo ' <tr>
                                    <td>'.$row["ID"].'</td>
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["phone"].'</td>
                                    <td>'.$row["department"].'</td>
                                    <td>'.$row["designation"].'</td>
                                    <td>'.$row["description"].'</td>
                                    </tr>
                        ';
                    }
            } else
                {echo "0 results";}
            $link->close();
            echo "</table>";
            echo "      <h2 align='right'>
                            <form action='/WEB_APP/modules/people/profile.php'>
                                  <input type='submit' value='MORE RESULTS'>
                            </form>
                        </h2>";
            }
            else
                {echo "0 results";}
            ?>
        </div>
        
        
        
    </section>
    
</html>