<?php

require_once "DataObject.class.php";

class LogEntryUser extends DataObject {

  protected $data = array(
    "userId" => "",
    "pageUrl" => "",
    "numVisits" => "",
    "lastAccess" => ""
  );

  public static function getLogEntriesUsers( $userId ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_ACCESS_LOG_USERS . " WHERE userId = :userId ORDER BY lastAccess DESC";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":userId", $userId, PDO::PARAM_INT );
      $st->execute();
      $logEntriesUsers = array();
      foreach ( $st->fetchAll() as $row ) {
        $logEntriesUsers[] = new LogEntryUser( $row );
      }
      parent::disconnect( $conn );
      return $logEntriesUsers;
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public function record_user() {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_ACCESS_LOG_USERS . " WHERE userId = :userId AND pageUrl = :pageUrl";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":userId", $this->data["userId"], PDO::PARAM_INT );
      $st->bindValue( ":pageUrl", $this->data["pageUrl"], PDO::PARAM_STR );
      $st->execute();

      if ( $st->fetch() ) {
        $sql = "UPDATE " . TBL_ACCESS_LOG_USERS . " SET numVisits = numVisits + 1 WHERE userId = :userId AND pageUrl = :pageUrl";
        $st = $conn->prepare( $sql );
        $st->bindValue( ":userId", $this->data["userId"], PDO::PARAM_INT );
        $st->bindValue( ":pageUrl", $this->data["pageUrl"], PDO::PARAM_STR );
        $st->execute();
      } else {
        $sql = "INSERT INTO " . TBL_ACCESS_LOG_USERS . " ( userId, pageUrl, numVisits ) VALUES ( :userId, :pageUrl, 1 )";
        $st = $conn->prepare( $sql );
        $st->bindValue( ":userId", $this->data["userId"], PDO::PARAM_INT );
        $st->bindValue( ":pageUrl", $this->data["pageUrl"], PDO::PARAM_STR );
        $st->execute();
      }

      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public static function deleteAllForUser( $userId ) {
    $conn = parent::connect();
    $sql = "DELETE FROM " . TBL_ACCESS_LOG_USERS . " WHERE userId = :userId";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":userId", $userId, PDO::PARAM_INT );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

}

?>
