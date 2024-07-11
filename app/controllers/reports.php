<?php

class Reports extends Controller {

    public function index() {
      $user = $this->model('Reminder');
      $list_of_reminders = $user->getReports();
      
      $this -> view('reports/index', ['reminders' => $list_of_reminders]);
      $user->most_reminders();
    }

    public function totalLogin(){
        $username = $_REQUEST['subject'];
        $user = $this->model('Reminder');
        $user -> total_logins($username);
    }

    public function mostReminders(){
        $user = $this->model('Reminder');
        $user -> most_reminders();
    }
}