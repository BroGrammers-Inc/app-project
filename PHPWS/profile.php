<!doctype html>
<html>
    <head><title>Faculty Profile</title></head>
    <body >
        <h1 align="center">FACULTY PROFILE
        <form  action="login.html"><input type="submit" value="ADMIN LOGIN"></form>
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
            $res = $link->query("select * from uietdb");
    
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
              
                // echo "s.no" . $row["s.no"]. "<br/> Name: " . $row["name"]. "<br/>Phone :" . $row["phone"]. "<br/>department :" . $row["department"] . "<br/>Designation :" . $row["designation"] ."<br/>description :" . $row["description"];
            }
        } else
        {echo "0 results";}

        $link->close();
    ?>
            
                    </table>
    </body>
</html>