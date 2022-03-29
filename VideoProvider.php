<?php
class VideoProvider {
  public static function getUpNext($con, $currentVideo){
  }
  
  public static function getEntityVideoForUser($con, $entityId, $username) {
    $query = $con->prepare("SELECT videoId FROM 'videoProgress'
                            INNER JOIN videos
                            ON videoProgress.videoId = videos.id
                            WHERE videos.entityId = :entityId
                            AND videoProgress.username = :username
                            ORDER BY videoProgress.dateModified DESC
                            LIMIT 1");
    $query->bindValue(":entityId", $entityId);
    $query->bindValue(":username", $username);
    $query->execute();
    
    if($query->rowCount() == 0) {
      $query = $con->prepare("SELECT id FROM videos
                              WHERE entityId=:entityId
                              ORDER BY season, episode ASC LIMIT 1");
      $query->bindValue(":entityId", $entityId);
    }
    
    return $query->fetchColumn();
  }
}
?>
