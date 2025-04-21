<?php
function getNextPos($pos){
        
        //connect with the sql in gamestate
        //have a JSON array and a key for the start position
    
        if($pos == 58){
            $next_pos_Array = array(1);
        }elseif($pos == 42){
            $next_pos_Array = array(7);
        }elseif($pos == 47){
            $next_pos_Array = array(13);
        }elseif($pos == 69){
            $next_pos_Array = array(19);
        }elseif($pos == 13){
            $next_pos_Array = array('pos1' => 48, 'pos2' => 14, 'direction1' => 'up', 'direction2' => 'right' );
        }elseif($pos == 53){
            $next_pos_Array = array('pos1' => 54, 'pos2' => 59, 'direction1' => 'left', 'direction2' => 'right');
        }elseif($pos == 31){
            $next_pos_Array = array('pos1' => 43,'pos2' => 32, 'direction1' => 'up', 'direction2' => 'left');
        }else{
            $next_pos = $pos + 1;
            $next_pos_Array = array($next_pos);
        }
        $next_pos_JSON = json_encode($next_pos_Array);
    
        return $next_pos_JSON;
    }

?>