<?php
    session_start();
    include 'db_connect.php';
    $sql = "SELECT * FROM mcq ORDER BY RAND() LIMIT 11";
    $res = mysqli_query($conn,$sql);

    // if($res == true){
    //     echo "Query Runs <br>";
    // }else{
    //     echo "Query Doesnot Runs <br>";
    // }

    $questions = mysqli_fetch_array($res); // Fetch the results
    // echo var_dump($questions);
    
    $duration = 10;
    $_SESSION["duration"] = $duration;
    $_SESSION["start_time"] = date("Y-m-d H:i:s");
    
    $end_time=$end_time=date("Y-m-d H:i:s",strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));
    $_SESSION["end_time"] = $end_time;
    


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

    <title>Hello Quiz!</title>
</head>

<body>
    <div class="container">
        <div class="alert alert-primary" role="alert">
            <h3 class="text-center">Here is your Quiz, Complete this on time...</h3>
        </div>
        <div class="alert alert-danger" role="alert">
            Keep eye on timer, forms automatically submits when the time will over!
            <div id="response"></div>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Enter your name" aria-label="Username"
                aria-describedby="basic-addon1">
        </div>

        <!-- <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> -->
        <form method="post" id="formId" action="options.php">
            <?php 
                    $num = 1;
                    while ($row = mysqli_fetch_array ($res)) {
                        echo "<b> <br /> Question-".$num." : " .$row['question']. "</b> <br>"; 
                        echo "Options: <br>";
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp A -: ".$row['a']. "<br/>";
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp B -: ".$row['b']. "<br/>";
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp C -: ".$row['c']. "<br/>";
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp D -: ".$row['d']. "<br/>";
                        
                        echo'
                            <select class="form-select" aria-label="Default select example" name="'.$row['sno'].'" >
                                    <option selected>Open this select menu</option>
                                    <option value="1">A</option>
                                    <option value="2">B</option>
                                    <option value="3">C</option>
                                    <option value="4">D</option>
                            </select>
                        ';
                        echo "<br>";
                        $num++;
                    }
                ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script>
    window.setInterval(function() {
        document.getElementById("formId").submit();
    }, 600000);
    </script>

    <script type="text/javascript">
    window.location = "index.php";
    </script>

    <script type="text/javascript">
    setInterval(function() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "response.php", false);
        xmlhttp.send(null);
        document.getElementById("response").innerHTML = xmlhttp.responseText;

    }, 1000)
    </script>


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