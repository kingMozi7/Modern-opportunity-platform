<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <style >
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html,body{
            width: 100%;
            height: 100%;
        }
        body{
            padding-top: 10px;
        }
        #page1{
            width: 100%;
            height: 100%;
        }
        body{
            background-color: #F3E6D8;
        }
    </style>
</head>
<body>
<div id="part1">
    <div class="container">
    <div class="row">

<form action="add_rate.php" method="post">

    <div>
        <h3>Review</h3>
    </div>

    <div>
         <label>Name</label><br>
        <input type="text" name="name"><br>
        <label>Review</label><br>
        <textarea name="review"></textarea>
    </div>

         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>

    <span class='result'>0</span>
    <input type="hidden" name="rating">

    </div>

    <div><input class="btn btn-success" type="submit" name="add"> </div>

</form>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>
</body>

</html>
<?php
$db = mysqli_connect("localhost", "root", "", "talent-tide");

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $review = $_POST["review"];
    $rating = $_POST["rating"];

    // Prepare an insert statement
    $stmt = mysqli_prepare($db, "INSERT INTO ratee_sek (name, review, rating) VALUES (?, ?, ?)");

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sss", $name, $review, $rating);

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt))
    {
        echo "New Rate added successfully";
    }
    else
    {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($db);
}
?>

