<?php
session_start();
include("db.php");
if(!isset($_SESSION['user']))
{
    $_SESSION['user'] = session_id();
}
$uid = $_SESSION['user'];  // set your user id settings

if($_POST)  // AJAX request received section
{
    $pid    = mysqli_real_escape_string($connection,$_POST['pid']);  // product id
    $op     = mysqli_real_escape_string($connection,$_POST['op']);  // like or unlike op
    

    if($op == "like")
    {
        $gofor = "like";
    }
    elseif($op == "unlike")
    {
        $gofor = "unlike";
    }
    else
    {
        exit;
    }
    // check if alredy liked or not query
    $query = mysqli_query($connection,"SELECT * from `likes` WHERE pid='".$pid."' and uid='".$uid."'");
    $num_rows = mysqli_num_rows($query);

    if($num_rows>0) // check if alredy liked or not condition
    {
        $likeORunlike = mysqli_fetch_array($query);
    
        if($likeORunlike['like'] == 1)  // if alredy liked set unlike for alredy liked product
        {
            mysqli_query($connection,"update `likes` set `unlike`=1,`like`=0 where id='".$likeORunlike['id']."' and uid='".$uid."'");
            echo 2;
        }
        elseif($likeORunlike['unlike'] == 1) // if alredy unliked set like for alredy unliked product
        {
            mysqli_query($connection,"update `likes` set `like`=1,`unlike`=0 where id='".$likeORunlike['id']."' and uid='".$uid."'");
            echo 2;
        }
    }
    else  // New Like
    {
       mysqli_query($connection,"INSERT INTO `likes` (`pid`,`uid`, `$gofor`) VALUES ('$pid','$uid','1')");
       echo 1;
    }
    exit;
}


$query  = "SELECT * FROM  `products`"; // products list
$res    = mysqli_query($connection,$query);
$HTML = "";
while($row=mysqli_fetch_array($res))
{
    // get likes and dislikes of a product
    $query = mysqli_query($connection,"select sum(`like`) as `like`,sum(`unlike`) as `unlike` from `likes` where pid = ".$row['id']);
    $rowCount = mysqli_fetch_array($query);
    if($rowCount['like'] == "")
        $rowCount['like'] = 0;
        
    if($rowCount['unlike'] == "")
        $rowCount['unlike'] = 0;
        
    if($uid == "") // if user not loggedin then show login link on like button click
    {
        $like = '
            <input onclick="location.href = \'login.php\';" type="button" value="'.$rowCount['like'].'" rel="'.$row['id'].'" data-toggle="tooltip"  data-placement="top" title="Login to Like" class="button_like" />
            <input onclick="location.href = \'login.php\';" type="button" value="'.$rowCount['unlike'].'" rel="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Login to Unlike" class="button_unlike" />';
    }
    else
    {
        $query = mysqli_query($connection,"SELECT * from `likes` WHERE pid='".$row['id']."' and uid='".$uid."'");
        if(mysqli_num_rows($query)>0){ //if already liked od disliked a product
            $likeORunlike = mysqli_fetch_array($query);
            // clear values of variables
            $liked = '';
            $unliked = '';
            $disable_like = '';
            $disable_unlike = '';
            
            if($likeORunlike['like'] == 1) // if alredy liked then disable like button
            {
                $liked = 'disabled="disabled"';
                $disable_unlike = "button_disable";
            }
            elseif($likeORunlike['unlike'] == 1) // if alredy dislike the disable unlike button
            {
                $unliked = 'disabled="disabled"';
                $disable_like = "button_disable";
            }
            
            $like = '
            <input '.$liked.' type="button" value="'.$rowCount['like'].'" rel="'.$row['id'].'" data-toggle="tooltip"  data-placement="top" title="Like" class="button_like '.$disable_like.'" id="linkeBtn_'.$row['id'].'" />
            <input '.$unliked.' type="button" value="'.$rowCount['unlike'].'" rel="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Un-Like" class="button_unlike '.$disable_unlike.'" id="unlinkeBtn_'.$row['id'].'" />
            ';
        }
        else{ //not liked and disliked product
            $like = '
            <input  type="button" value="'.$rowCount['like'].'" rel="'.$row['id'].'" data-toggle="tooltip"  data-placement="top" title="Like" class="button_like" id="linkeBtn_'.$row['id'].'" />
            <input  type="button" value="'.$rowCount['unlike'].'" rel="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Un-Like" class="button_unlike" id="unlinkeBtn_'.$row['id'].'" />
            ';
        }
    }
        
    $HTML.='
        <li>
            <h4 class="">'.$row['product_name'].'</h4>
            <div class="product-price">
                
            </div>
            
            <div class="grid">
                '.$like.'
            </div>
        </li>';
}

?>


 <!--
 <html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="" type="image/x-icon">
    <meta name="author" content="Rajasekar G">
    <meta name="description" content="Create Like & Unlike code like FB uisng PHP, MySQL and jQuery - Rating system is very useful for every web project. can track the visitors">
    <meta name="keywords" content="Like & Unlike code, like code for php, unlike button code, code like fb uisng php. like and unlike code mysql, like and unlike jquery, like code fb, like and unlike code ">
    <meta name="title" content="How to Create Like & Unlike code like FB using PHP, MySQL and jQuery">
 -->


    <title>The Home-Bar will go over here</title>

    <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/font-awesome.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
   

<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body style="zoom: 1;">
        
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

    </div>
</div>
  
  
<div class="container mainbody">
  <div class="page-header">
    <h1>Need to implement a new db and together we need to connect them to the pictures we have</h1>
  </div>
  <div class="clearfix"></div>
  <div class="col-lg-12" style="margin:0 auto;padding:20px 0; clear:both;">
  




<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-8674029121851968"
     data-ad-slot="6107382139"></ins>


<!-- End here -->

</div>
<div class="clearfix"></div>

  <div class="table-responsive1">
  
  
  <!-- Content here -->
 <h1>Developerdesks Book store</h1>
        <div class="col-sm-12 col-md-12">
            <ul class="thumbnail-list">
            <?php echo $HTML; ?>
            </ul>
        </div>


<!-- content end here -->
  


<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8674029121851968"
     data-ad-slot="9858193339"
     data-ad-format="auto"></ins>

</div></div> </div>

        </div>
    </div>
</footer>
    


<script src="./css/jquery-1.9.0.min.js"></script>

<script src="../css/bootstrap.min.js"></script>

</body></html>