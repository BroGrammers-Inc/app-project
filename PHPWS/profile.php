<!doctype html>
<html>
    <head><title>Faculty Profile</title></head>
    <body >
        <h1 align="center">FACULTY PROFILE
        <form action="profile.php" method="post">
            <input type="text" placeholder="Search here...." name="sear">
            <input type="submit" name="sbut" value="search">
        </form>
        </h1>
       
        <table border='2px'align="center">
            <tr id="hrow">
                <td>S.No</td>
                <td>Name</td>
                <td>Phone</td>
                <td>Department</td>
                <td>Designation</td>
                <td>Description</td>
            </tr>
            <script src="jquery-3.1.1.js">
            </script>

    <?php 
        define('DB_NAME','project');
        define('DB_USER','root');
        define('DB_PASSWORD','');
            define('DB_HOST','localhost');
            $link= new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if(isset($_POST["sear"])){$ser = $_POST["sear"];}
            else{$ser="";}
            if($ser=="")
            {$res = $link->query("select * from uietdb");            }
            else{
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

    
    ?>
            
                    </table>
        <h2 align="right">
        <form action="login.html">
            <input type="submit" value="ADMIN LOGIN">
        </form>
        </h2>
    </body>
</html>