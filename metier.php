<?php
class tmatch {
    public $nameMatch;
    public $date;
    public $hour;
    public $location;
    
    public function __construct($nameMatch, $date, $hour, $location) {
        $this->nameMatch = $nameMatch;
        $this->date = $date;
        $this->hour = $hour;
        $this->location = $location;
    }
}

class team {
    public $id;
    public $nameTeam;
    
    public function __construct($id, $nameTeam) {
        $this->id = $id;
        $this->nameTeam = $nameTeam;
    }
}

class infoMatch {
    public $listTeam;
    public $listMatch;
    public $teams = [];
    
    public function getIndexMatchByName($nameMatch) {
        $indexMatch = null;
        if($this->listMatch == null) {
            return;
        }
        foreach ($this->listMatch as $i => $value) {
            if ($value->nameMatch == $nameMatch) {
                $indexMatch = $i;
                break;
            }
        }
        return $indexMatch;
    }
}

