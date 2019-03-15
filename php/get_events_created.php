<?php
$sql="SELECT id, name
      FROM events e
      WHERE id_user=:id_user AND is_published=1";

      $stmt=$dbo->prepare($sql);
      $stmt->bindValue(":id_user", $_GET["id"]);
      $stmt->execute();
      $events = $stmt->fetchAll();
 ?>
