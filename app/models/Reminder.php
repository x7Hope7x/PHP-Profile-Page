<?php

class Reminder {
    


    public function __construct() {

    }

    public function getReports () {
        // gets the list of all reminders from the database.
        $db = db_connect();
        $statement = $db->prepare("SELECT users.username, reminders.subject, reminders.created_at 
FROM users 
INNER JOIN reminders ON users.id = reminders.user_id;
");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
    
    public function get_all_reminders ($userid) {
        // gets the list of all reminders from the database.
        $db = db_connect();
        $statement = $db->prepare("select * from reminders WHERE user_id = :userid");
        $statement->bindValue( ':userid', $userid);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }

    public function update_reminder ($reminder_id, $subject) {
        // takes Reminder_ID and Subject as args to update the reminder in the database.
        $db = db_connect();
        $sql = "UPDATE reminders SET subject = :subject WHERE id = :id";
        $statement = $db -> prepare($sql);
        $statement->bindValue(":subject", $subject);
        $statement->bindValue(":id", $reminder_id);
        $statement->execute();
        header('Location: /reminders');
        
    }
    
    public function create_reminder ($subject) {
        // creates a new Subject reminder in the database.
        $db = db_connect();
        $sql = "INSERT INTO reminders (user_id,subject) VALUES (?,?)";
        $statement = $db->prepare($sql);
        $statement->execute([$_SESSION['userid'],$subject]);
        header('Location: /reminders ');
    }
    
    public function delete_reminder ($reminder_id) {
        // delete a reminder based on its reminder_ID
        $db = db_connect();
        $sql = "DELETE FROM reminders WHERE id = :id;";
        $statement = $db->prepare($sql);
        $statement->bindValue( ':id', $reminder_id);
        $statement->execute();

        header('Location: /reminders ');
        
        
    }
    public function getUser($user_id){
        $db = db_connect();
        $sql = "SELECT * FROM reminders JOIN users WHERE user_id = :user_id";
        $statement = $db->prepare($sql);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }
    
}
?>