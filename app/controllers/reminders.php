<?php

class Reminders extends Controller {


  public function index() {
    
    $reminder = $this->model('Reminder');
    $list_of_reminders = $reminder->get_all_reminders($_SESSION['userid']);
    $this -> view('reminders/index', ['reminders' => $list_of_reminders]);
    
  }
  
  public function create(){
    $subject = $_REQUEST['subject'];
    
    $reminder = $this->model('Reminder');
    $reminder->create_reminder($subject);
  }

  public function delete(){
    $reminder_id = $_REQUEST['reminder_id'];
    
    $reminder = $this->model('Reminder');
    $reminder->delete_reminder($reminder_id);
  }
  
  public function update(){
    $reminder_id = $_REQUEST['reminder_id'];
    $subject = $_REQUEST['subject'];

    $reminder = $this->model('Reminder');
    $reminder->update_reminder($reminder_id, $subject);
  }
}