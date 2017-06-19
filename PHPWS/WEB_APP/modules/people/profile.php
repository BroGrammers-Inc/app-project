<!doctype html>

<html lang="en">
    <head><title>Faculty Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
        <link  href="../../common/css/nomalise.css" rel="stylesheet">
        <link href="../../common/css/main.css" rel="stylesheet">
        <link  href="./css/style.css" rel="stylesheet">  
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script> 
    </head>
    <body>
      <div class="container">  
        <nav class="clearfix">
            <ul class="clearfix">
                <a href="../home/welcome.php" class="nav-list"><li>Home</li></a>
                <a href="../maps/maps.html" class="nav-list"><li>Maps</li></a>
                <a href="#" class="active nav-list"><li>People</li></a>
                <button type="extras" class="extras"> <img src="./images/menu_button.svg" alt="no menu"></button>
                <ul class = "clearfix menu">
                            <a href="../about/about.html" class="nav-list2"><li>About PU</li></a>
                            <a href="../courses/courses.html" class="nav-list2"><li>Courses</li></a>
                            <a href="../dining/dining.html" class="nav-list2"><li>Dining</li></a>
                            <a href="../libraries/libraries.html" class="nav-list2"><li>Libraries</li></a>
                            <a href="../news/news.html" class="nav-list2"><li>News</li></a>
                            <a href="../events/events.html" class="nav-list2"><li>Events</li></a>
                            <a href="../emergency/emergency.html" class="nav-list2"><li>Emergency</li></a> 
                    </ul>  
            </ul>
        </nav>
        <section>
        <div class="title">
            <br/><br/><br/><br/>    
            <h1>FACULTY PROFILE
                <form action="profile.php" method="post">
                <input type="text" placeholder="Search here...." id="searc"name="sea">
                <input type="submit" name="sbut" value="search">
                    
                </form>
            </h1>
            
        </div>
       </section>
          
        <section>
            <div class="explainer">
        <table border='2px' class="explainer">
            <tr id="hrow">
                <td>S.No</td>
                <td>Name</td>
                <td>Phone</td>
                <td>Department</td>
                <td>Designation</td>
                <td>Description</td>
            </tr>
            <script src="/jquery-3.1.1.js">
            </script>


    <?php 
        
        define('DB_NAME','project');
        define('DB_USER','root');
        define('DB_PASSWORD','');
            define('DB_HOST','localhost');
            $link= new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if(isset($_POST["sea"])){$ser=$_POST["sea"];}
            else{$ser="";}
            if($ser=="")
            {$res = $link->query("select * from uietdb");            }
            else{
             $ser =  mysql_real_escape_string($ser);
            $res = $link->query("select * from uietdb where Concat(name, '', phone, '', designation, '',department, '',description) like '%$ser%'");    
            }
            if ($res->num_rows > 0) {
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
            
            $session_value=(isset($_POST["sea"]))?$_POST["sea"]:''; 
    
    ?>
            
           <script >
                var searc = '<?php echo $session_value; ?>';
                $('#searc').val(searc);
            </script>
            
                    </table>
        <h2 align="right">
        <form action="login.html">
            <input type="submit" value="ADMIN LOGIN">
        </form>
        </h2>
    </div>
    </section>
    </div>      
        
    </body>
</html>