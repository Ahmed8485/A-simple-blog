<?php
if(isset($_POST['next'])){$curr_page= $_POST['last_page']+1;}
elseif(isset($_POST['previous'])){echo "{REV";
                              $curr_page= $_POST['last_page']-1;
                              }
if(isset($_POST['last_page'])){echo "LAST";
                              
                              }

else {$curr_page = 1;}
var_dump($_POST['last_page']);
var_dump($curr_page);


$bg = "images/bg".rand(1,6).".jpg";

echo "<html style='background: url($bg) no-repeat center center fixed;
-webkit-background-size: cover !important;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover !important;'>" ?>
<head>
<?php 
    include_once('article.php');
    include_once('req_files.php');
    require('db_conn.php');
?>
</head>
<body  >

<?php
//DEFINING VARS
    $query = "SELECT * FROM articles LIMIT 10";
    $result = mysqli_query($db,$query);
    $num_rows = mysqli_num_rows($result);
    $articles = array();
    $rowcount = 1;
    
//READING SQL INTO ARTICLE CLASS
while($row = mysqli_fetch_assoc($result)){
    $articles[$rowcount] = new article;
    $col = 0;
    foreach ($row as $key => $data){
        
       // echo "<br> $key and $data";
        //SETTING KEY VALS IN ARTICLE
        switch($col){
            case 1:
                $articles[$rowcount]->set_date($data);

            break;
             case 2:
                $articles[$rowcount]->set_title($data);
            break;
             case 3:
                $articles[$rowcount]->set_summary($data);
            break;
             case 4:
                $articles[$rowcount]->set_content($data);
            break;
            default:
            
        }
        $col++;
    }   
    $rowcount++;
    //var_dump($rowcount);
}
//var_dump($articles);
mysqli_close($db);

?>
    <?php 
    //DEFINING FUNC TO PRINT

    $items_per_row = 5;
    $remainder = $num_rows % $items_per_row;
    $num_pages = (($num_rows - $remainder) / $items_per_row)+1;
    if($remainder == 0){
		$num_pages--;
		}
    var_dump($num_pages);
    $firt_artcile = ($curr_page-1)*5+1;

    ?>
    

<?php 
echo  "
<br><br><br><br><br><br><br><br>
<div class='demo-blog__posts mdl-grid' >";

for($i=$firt_artcile;$i<$firt_artcile+5;$i++){
    $image = "images/image".$i.".jpg";
    $title = $articles[$i]->title;
    $summary = $articles[$i]->summary;
    $content = $articles[$i]->content;
    $date = $articles[$i]->date;
echo "<div class='mdl-card mdl-cell mdl-cell--12-col card-960' id='card-960'>
   
    <div class='mdl-card__media img '>
        <img src='$image' width='960px' height='200px' border='0'>
        <h3 class='img-text'> $title</h3>
    </div>
    <div class='mdl-card__supporting-text mdl-color-text--grey-600' style='width:97%'>
        $summary
    </div>
        <hr>
        <div class='mdl-card__supporting-text meta mdl-color-text--grey-600' style='width:97%'>
            <strong>$date</strong><br>
            <p>During Ramadan</p>
        </div>
    </div>";
}
echo "</div>";
    
if($curr_page < $num_pages && $curr_page == 1){
    echo "   <form action='main.php' method='post' >
        <div id='wrapper'><input class='mdl-button mdl-js-button mdl-button--                                   raised mdl-js-ripple-effect mybutton'   type='submit' value='NEXT' name='next'/>
        </div>
        <input type='hidden' name='last_page' value='$curr_page'>
    </form>";
}
elseif($curr_page < $num_pages && $curr_page > 1){
    echo "   <form action='main.php' method='post' >
        <div id='wrapper'>
        <input class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mybutton'   style='margin-right: 20px' type='submit' value='PREV' name='previous'/>
        <input class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mybutton'   type='submit' value='NEXT' name='next'/>
        
        </div>
        <input type='hidden' name='last_page' value='$curr_page'>
    </form>";
}
elseif($curr_page == $num_pages && $curr_page != 1){
    echo "   <form action='main.php' method='post' >
        <div id='wrapper'><input class='mdl-button mdl-js-button mdl-button--                                   raised mdl-js-ripple-effect mybutton'   type='submit' value='PREV' name='previous'/>
        </div>
        <input type='hidden' name='last_page' value='$curr_page'>
    </form>";
}
else{

}
?>
</div>
<footer class="mdl-mini-footer">
          <div id="wrapper"><b>Copyright Ahmed Inc</b></div>
         
        </footer>
</body>
</html>
