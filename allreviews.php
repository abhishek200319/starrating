<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
 .msg{
    background-color: green;
    color: white;
    display: none;
    text-align: center;
  }

  *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>
</head>
<body>
<div style="width:50%; margin-bottom: 100px;">
  <form action="fivestar.php" method="post" class="my_form">
    <label for="fname"> Name</label>
    <input type="text" id="fname" name="user_name" placeholder="Your name..">
 <input type="hidden" name="rate_value" id="one" value="" ><br><br>
       <div class="rate">
   <input type="radio" id="star5" name="rate" value="5"  />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
</div>
  
    <input type="submit" value="Submit">
  </form>
</div>


<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "phpproject";
    

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if($conn){
  //   echo"connection stablished successfully";
  }else{
     echo"there was an error". mysqli_connect_error();
  }
  $sql="SELECT rate_value,user_name FROM `rating` ";
  $queryy=mysqli_query($conn,$sql);
  if ($queryy) {
    ?>

    <table id="customers" >
    <thead>
      <tr>
    <th>Name</th>
    <th>Reviews</th>
  </tr>
    </thead>
     <tbody>
    <?php
    while ($row=mysqli_fetch_assoc($queryy)) {
      $name=$row['user_name'];
      $rate=$row['rate_value'];
     // echo $rate;
      ?>
    
    <tr><td><?php echo $name; ?></td>
      <td> 
    <div class="rating">
      <span class="fa fa-star <?php echo ($rate== 1) ? 'checked': '' ;?>" value=1></span>
<span class="fa fa-star <?php echo ($rate== 2) ? 'checked': '' ;?>" value=2></span>
<span class="fa fa-star <?php echo ($rate== 3) ? 'checked': '' ;?>" value=3></span>
<span class="fa fa-star <?php echo ($rate== 4) ? 'checked': '' ;?>" value=4></span>
<span class="fa fa-star <?php echo ($rate== 5) ? 'checked': '' ;?>" value=5></span>
    </div>
</td>
</tr>

    <?php

    }
  }

?>
</tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
  $("span.checked").prevAll().css({"color": "orange"});
  });
      $("input[type='radio'][name='rate']").on("click", function(){
 var x= $(this).val();
document.getElementById('one').value= x;
 $(".rate").css("pointer-events","none");
          $("input[type='radio'][name='rate']").attr("disabled",true);
          $("input[type='radio'][name='rate'][value=y]:checked");
 
// if(x>0 && x<=3){
  //  alert("it is just "+x);

 // }else{
 //   var y=x;
  //    $(".msg").css("display", "block");
    //   $(".rate").css("display", "none");
    //      $(".rate").css("pointer-events","none");
    //      $("input[type='radio'][name='rate']").attr("disabled",true);
    //      $("input[type='radio'][name='rate'][value=y]:checked");
       console.log(y);
    //     return y;
  
});

</script>
</body>
</html>
