<?php
    session_start();
?>
<!doctype html>
<html>
    <body><form action="se1.php" method="post" >
        <input type="text" name="sea" id="sear" placeholder="search here......"  >
        <input type="submit" name="sbut" value="SUBMIT" id="sbut">
        </form>
    </body>

<?php
    echo $_SESSION["idet"];
?>

</html>