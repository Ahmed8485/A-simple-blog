<?php
/**
 * Created by PhpStorm.
 * User: Rana Ahmed
 * Date: 7/30/2015
 * Time: 9:03 AM
 */
include_once('req_files.php');
$infile = ('w/bg2.jpg');
$outfile =('w/bc.jpg');
$image = new Imagick($infile);
$image->cropImage(400,200,30,10);
$image->writeImage($outfile);

?>
<body>

</body>
</html>