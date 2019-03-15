<?php

$sql="SELECT id, name
      FROM events e
      INNER JOIN events_participants p
      ON e.id=p.id_event
      WHERE id_users=:id_users";

      $stmt=$dbo->prepare($sql);
      $stmt->bindValue(":id_users", $_GET["id"]);
      $stmt->execute();
      $events = $stmt->fetchAll();

?>