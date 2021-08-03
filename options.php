<?php
    include 'db_connect.php';


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach($_POST as $field => $value) {
                $fields[] = $field;
                $values[] = $value;
            }
            //print_r($fields);
            //print_r($values);
            $ans_key = array();

            foreach ($fields as $field) { 
                $num = $field;
                $sql = "SELECT ans FROM mcq WHERE sno =".$num;
                $res = mysqli_query($conn,$sql);
                $temp = mysqli_fetch_array($res);
                $res = $temp[0];
                array_push($ans_key,$res);
            
            }
            //print_r($ans_key);
            $result=array_diff($values,$ans_key);
            $incorrect = sizeof($result);
            $correct = 10-$incorrect;
            
            //echo $correct;
        } 
        
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Quiz Result</title>

</head>

<body>

   



    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Results!</h4>
        <p> Heyyy you scored <b> <?php echo $correct; ?></b> out of <b> 10.</b> </p>
        <p> Thank you for taking the test </p>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>