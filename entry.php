
  <?php
      include_once('article.php');
      include_once('req_files.php');
      require('db_conn.php');
      //DATABSE READING
//        var_dump($db);
          $article_no = $_GET['article_no'];
          $calling_page = $_GET['calling_page'];
            var_dump($calling_page);
//          $calling_page = 2;
//$article_no = 4;
//
          $query =  "SELECT title,content,publicationDate FROM articles WHERE id=$article_no";
          $result = mysqli_query($db,$query);
          $num_rows = mysqli_num_rows($result);
          if($num_rows==0 || !$num_rows){
             header('Location: /main.php');
          }
          $bg = "images/bg".rand(1,8).".jpg";

echo "<html style='background: url($bg) no-repeat center center fixed;
-webkit-background-size: cover !important;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover !important;'>";
          echo "<head>";
  ?>
</head>
<body>




<br><br><br><br><br><br><br><br>

<?php
//READING DB
while($row = mysqli_fetch_assoc($result)){
    $col = 1;
foreach($row as $key => $value){
//    print $key. " = $value <br>";
    
    switch($col){
            case 1:
                $title = $value;
                break;
            break;
             case 2:
                $content = $value;
                break;
            break;
             case 3:
             $date = $value;
            break;
             
            default:
            
        }
        $col++;
    
}

}

?>
<div class='demo-blog__posts mdl-grid' >
    <div class='mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col' id='card-960'>

    <div class='mdl-card__media mdl-color-text--grey-50 img '>
        <img src='images/image1.jpg' width='960px' height='200px' border='0'>
        <h3 class='img-text'> <?php echo $title ?></h3>
    </div>
        <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              <div class="minilogo"></div>
              <div>
                <?php echo $content ?>

              </div>

          

            </div>

        <hr>
        <div class='mdl-card__supporting-text meta mdl-color-text--grey-600' style='width:97%'>
            <strong><?php echo $date ?></strong><br>
            
        </div>
<!--
        <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
              <form>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-upgraded" data-upgraded=",MaterialTextfield">
                  <textarea rows="1" class="mdl-textfield__input" id="comment"></textarea>
                  <label for="comment" class="mdl-textfield__label">Join the discussion</label>
                </div>
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" data-upgraded=",MaterialButton,MaterialRipple">
                  <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
                <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
              </form>
              <div class="comment mdl-color-text--grey-700">
                <header class="comment__header">
                  <img src="images/anon.jpg" class="comment__avatar" style="height:20px;width:20px">
                  <div class="comment__author">
                    <strong>James Splayd</strong>
                    <span>2 days ago</span>
                  </div>
                </header>
                <div class="comment__text">
                  In in culpa nulla elit esse. Ex cillum enim aliquip sit sit ullamco ex eiusmod fugiat. Cupidatat ad minim officia mollit laborum magna dolor tempor cupidatat mollit. Est velit sit ad aliqua ullamco laborum excepteur dolore proident incididunt in labore elit.
                </div>

                <div class="comment__answers">
                  <div class="comment">
                    <header class="comment__header">
                      <img src="images/anon.jpg" class="comment__avatar" style="height:20px;width:20px">
                      <div class="comment__author">
                        <strong>John Dufry</strong>
                        <span>2 days ago</span>
                      </div>
                    </header>
                    <div class="comment__text">
                      Yep, agree!
                    </div>

                  </div>
                </div>
              </div>
            </div>
-->
    </div>





    </div>   <form action='main.php' method='post' >
        <div id='wrapper'><input class='mdl-button mdl-js-button mdl-button--                                   raised mdl-js-ripple-effect mybutton'   type='submit' value='BACK' name='back'/>
        </div>
        <input type='hidden' name='last_page' value='<?php echo $calling_page ?>'>
    </form></div>
<br><br><br><br><br><br>
<footer class="mdl-mini-footer">
          <div id="wrapper"><b>Copyright Ahmed Inc</b></div>

        </footer>
</body>
</html>
