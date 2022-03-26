$video = new Video($con, $_GET["id]);
$video->incrementViews();

$upNextVideo = VideoProvider::getUpNExt($con, $video);
?>
<div class="videoControls watchNav">
  <button onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
  <h1><?php echo $video->getTitle(); ?></h1>
</div>

<div class="videoControls upNext">
  <button><i class="fas fa-redo"></i></button>
