<?php
    function check_login($con){
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $query = "SELECT * FROM users WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($con, $query);
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        //redirect to login
        header("Location: login.php");
        die;
    }

    function user_personal_data($con){
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $query = "SELECT * FROM audytorzy WHERE id_audytora = '$id' LIMIT 1";
            $result = mysqli_query($con, $query);
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
        }
    }
}

    function random_num($length){
        $text = "";
        if($length < 5){
            $length = 5;
        }
        $len = rand(4,$length);

        for($i=0;$i<$len;$i++){
            $text .= rand(0,9);
        }
        return $text;
    }

    function points_for_audit($v1, $v2, $v3){
        $result = min($v1,$v2,$v3);
        return $result;
    }

    function getDzien(){
        $month = date('m');
        $day = date('d');
        $year = date('Y');

        $today = $year . '-' . $month . '-'.$day;
        return $today;
    }


    function reArrayFiles($file_post){
        $file_arry = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for($i=0;$i<$file_count;$i++){
            foreach($file_keys as $key){
                $file_arry[$i][$key] = $file_post[$key][$i];
            }
        }
        return $file_arry;
    }

    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }