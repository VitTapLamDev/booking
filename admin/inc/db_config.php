<?php 

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'booking_web';

    $con = mysqli_connect($hostname, $username, $password, $database);

    if(!$con) {
        die(" Cannot Connect to Database".mysqli_connect_error());
    }

    /**
     * Summary of filteration
     * @param mixed $data
     * @return mixed
     */
    function filteration($data){
        foreach($data as $key => $value){
            $data[$key] = trim($value);
            $data[$key] = stripcslashes($value);
            $data[$key] = htmlspecialchars($value);
            $data[$key] = strip_tags($value);
        }
        return $data;
    }

    function select($sql, $value, $datatype){
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, $datatype, ...$value);
            if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Select");
            }
        }else{
            die("Query cannot be prepared - Select");
        }
    }
?>