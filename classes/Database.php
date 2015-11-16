<?php
/*
 * Database for the CSE 308 FreyHallTestingCenter
 */

 class Database {

  /* Defines constants */
  const HOST = "mysql2.cs.stonybrook.edu";
  const USER = "sachin";
  const PASSWORD = "108610059";
  const DATABASE = "sachin";
  const ERR_CONNECTING_TO_SERVER = 'Error connecting to server';
  const TRANSACTION_FAILED = 'Transaction failed';

  /* Instance variables */
  private $handle; // DB Handle
  private $conn; // MySqli Handle

  /* Singleton design pattern */
  private function __construct() {
    $this->conn = new mysqli("mysql2.cs.stonybrook.edu","sachin","108610059","sachin"); //mysqli(self::HOST,self::USER,self::PASSWORD,self::DATABASE);
    if ($this->conn === null) {
      throw new Exception ("Cannot create mysqli connection");
    }
    $this->handle =  new PDO(
      'mysql:host=' . self::HOST . ';dbname=' . self::DATABASE,
      self::USER,
      self::PASSWORD
    );
    if ($this->handle === null){
      throw new Exception ("Cannot create PDO connection");
    }
  }

  // Return singleton
  public static function getDatabase() {
    return new Database();
  }

  public function getMysqli(){
    return $this->conn;
  }


    public function getHandle(){
      return $this->handle;
    }
  /*
   * Close a database connection
   */
  public function closeConnection() {
    if($this->mysqli->close()){
      throw new Exception('Could not close mysqli connection.');
    }
    // Destroy PDO object by setting it to null.
    $handle = null;

  }

  /*
   * Take in classid and return all the email addresses of the people on that class' roster
   */
  public static function mailUsers($classID){
    $handle = self::getDatabase();
    $handle->beginTransaction();
    $emailArray = array();
    // NOTE CLASSID MUST BE A STRING
    // Select all email addresses that are listed in a class roster. Place them into an array, and then return that array.
    $q_getmailinglist = "SELECT email FROM roster r1, user u1 WHERE r1.netID = u1.netID and r1.classID=?";
    $statement = $handle->prepare($q_getmailinglist);
    $statement->execute(array($classID));
    $index = 0;
    while($result = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
      $emailArray[$index] = $result;
      $index++;
    }
    return $emailArray;
  }
}
?>
