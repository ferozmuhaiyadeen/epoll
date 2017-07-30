		
	

<?php

include 'Poll.php';
$poll = new Poll;


if(isset($_POST['voteSubmit'])){
    $voteData = array(
        'poll_id' => $_POST['pollID'],
        'poll_option_id' => $_POST['voteOpt']
    );
    
    $voteSubmit = $poll->vote($voteData);
    if($voteSubmit){ 
        
        setcookie($_POST['pollID'], 1, time()+60*60*24*365);
        $statusMsg = 'Your vote has been submitted successfully.';
    }else{
        $statusMsg = 'Your vote already had submitted.';
    }
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Login Page</title>
		<meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
		<meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-skin-boxes.css" />
		<script src="js/modernizr.custom.js"></script>
<meta charset="UTF-8" />
<style type="text/css">
h3 {
  margin-left: 20px;
}
.answerOuter {
            border: 1px solid #f4f4f4;
            border-radius: 5px;
            height: 60px;
            background: #f4f4f4;
  margin-left: 20px
        }
        .answerOuter .option {
            float: left;
            margin: 0;
        }
        .answerOuter .option .inner {
            width: 150px;
            color: #666;
            float: left;
            margin-bottom: 0;
            font-size: 24px;
            font-weight: bold;
            height: 60px;
            position: relative;
            text-align: center;
            line-height: 60px;
            border-radius: 5px;
            border: 1px solid transparent;
        }
        .answerOuter .option input:checked + .inner,
        .answerOuter .option:hover .inner {
            color: #fff;
            line-height: 80px;
            margin-top: -10px;
            height: 80px;
            border: 1px solid #1e5799;
            background: #1e5799; /* Old browsers */
            background: -moz-linear-gradient(top, #1e5799 0%, #207cca 100%, #7db9e8 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1e5799), color-stop(100%,#207cca), color-stop(100%,#7db9e8)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #1e5799 0%,#207cca 100%,#7db9e8 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, #1e5799 0%,#207cca 100%,#7db9e8 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top, #1e5799 0%,#207cca 100%,#7db9e8 100%); /* IE10+ */
            background: linear-gradient(to bottom, #1e5799 0%,#207cca 100%,#7db9e8 100%); /* W3C */
        }
        .option input[type="radio"] {
            position: absolute;
            opacity: 0;
            filter:alpha(opacity=0)
        }


#container { text-align: center; margin: 20px; }
.pollContent{
    float: center;
    width: 100%;
}
.pollContent h3 {
    align:center;
	font-size: 18px;
    color: #333;
    text-align: center;
    float: center;
    border-bottom: 2px solid #333;
    width: 100%;
    margin: 0 auto;
    padding-bottom: 10px;
}
.pollContent ul{
    list-style: none;
    float: center;
    width: 100%;
    padding: none;
	align:center;
}
.pollContent input[type="submit"], .pollContent a{
    border: none;
    font-size: 16px;
    color: #fff;
    border-radius: 3px;
    padding: 10px 15px 10px 15px; 
    background-color: #34a853;
    text-decoration: none;
    cursor: pointer;
}
.stmsg{font-size: 16px;color:#FBBC05;}
</style>
</head>
<body>
<div id="container">
    <?php
        
        $pollData = $poll->getPolls();
    ?>
    <div class="pollContent">
        
		<?php echo !empty($statusMsg)?'<font color="white" size="40"><p class="stmsg">'.$statusMsg.'</p></font>':''; ?>
        		<form action="" method="post" name="pollFrm">
        <h1><?php echo $pollData['poll']['subject']; ?></h1>
        <ul>
            <?php foreach($pollData['options'] as $opt){
                echo '<h2><li><input type="radio" name="voteOpt" value="'.$opt['id'].'" >'.$opt['name'].'</li></h2>';
            } ?>
        </ul>
        <input type="hidden" name="pollID" value="<?php echo $pollData['poll']['id']; ?>">
        <input type="submit" name="voteSubmit" class="button" value="Vote">
        <a href="results.php?pollID=<?php echo $pollData['poll']['id']; ?>">Results</a>
        <a href="logout.php">Logout</a>
		</form>
    </div>
</div>
</body>
</html>