<?php

class Reports extends Controller {

    public function index() {
      $user = $this->model('Reminder');
      $list_of_reminders = $user->getReports();
      $this -> view('reports/index', ['reminders' => $list_of_reminders]);
    }

    public function totalLogin($username){
        $user = $this->model('Reminder');
        $this -> total_logins($username);
    }
}