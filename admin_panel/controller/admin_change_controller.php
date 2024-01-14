<?php

class admin_change_controller {

private $id;

public function setId($id): void {
$this->id = $id;
}

public function getId() {
return $this->id;
}


public function insert_change_question($array , $id) : bool{
    if(update_question($array,$id)){
        return true;
    }
     return false;
}

public function getQuestion() {
if ($this->id >= 0) {
$question = get_question_by_id($this->id);
return $question;
}

return null;
}
}


