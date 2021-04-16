<?php

// Model for Tasks table
class Task {
    var $id;
    var $title;

    public function __construct($id, $title) {
        $this->id = $id;
        $this->title = $title;
    }
}


// Tasks repository
class TaskRepository {
    var $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $tasks = array();
        $result = $this->pdo->query("SELECT * FROM tasks");
        while($row = $result->fetch()) {
            $task = new Task($row['id'], $row['title']);
            $tasks[] = $task;
        }
        return $tasks;
    }

    public function addNew($title) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO tasks (title) VALUES (?)");
            $stmt->execute([$title]);
            return true;
        }
        catch(PDOException $e) {
            return false;
        }
    }
}

// Tasks API
class TaskAPI {
    var $pdo;
    var $repository;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->repository = new TaskRepository($pdo);
    }

    public function all() {
        $tasks = $this->repository->all();
        return json_encode($tasks);
    }

    public function addNew($title) {
        if($this->repository->addNew($title)) {
            return json_encode(['result' => 'success']);
        }
        else {
            return json_encode(['result' => 'failure']);
        }
    }
}
