<?

/**
 * 
 * DB연결  php
 * 
 * @file : dbconn.php
 * @author : ParkSeongHyun
 * @since : 2020-09-17
 * @desc : 
 * 
 */

$conn = mysqli_connect("139.150.79.5", "root", "tjdgus123", "php_shopping_mall", 3306);
if (mysqli_connect_errno()) {
    echo '<p> Error : Could not connect to database. <br />
        Please try again later.</p>';
    exit;
} else {
    // echo "DB connect Success";
    // echo "<br />";
}

?>