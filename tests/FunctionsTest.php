<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;



require dirname(__DIR__) . '/phpFunctions.php';




//Unit tests
final class FunctionsTest extends TestCase
{
    public function test_getNestPos_pos1(): void
    {
        //test for when pos is at 1. for when pos += 1
        $this->assertSame(json_encode(array(2)),getNextPos(1));
        
    }
    
    public function test_getNestPos_pos58(): void
    {
        //test for when at pos 58. position is looping back to pos 1
        $this->assertSame(json_encode(array(1)),getNextPos(58));
        
    }
    public function test_getNestPos_pos0(): void
    {   
        //test for when pos is at the invalid pos 0
        $this->assertSame(null,getNextPos(0));
        
    }
    public function test_getNestPos_pos70(): void
    {
        //test for when the pos is at the invalid pos 70
        $this->assertSame(null,getNextPos(70));
        
    }
    //test the resetGame function
    public function test_resetGame(): void
    {
        // get the connection to the sql database for later use
        $connection = mysqli_connect("localhost","root","root","webboardgame") or die("Unable to connect to database");
        //add a row to the gamestate table to make sure the function has something to remove
        //I want to make sure the table wasn't already empty
        mysqli_query($connection, "insert into gamestate(game_PIN) values (NULL)");
        
        //run the function
        resetGame($connection);

        $gamestate = mysqli_query($connection, "select * from gamestate");

        //test to see if the resetGame function fully cleared the gamestate table
        $this->assertSame(null, mysqli_fetch_assoc($gamestate));
        
    }
    public function test_rollDice(): void
    {
        // get the connection to the sql database for later use
        $connection = mysqli_connect("localhost","root","root","webboardgame") or die("Unable to connect to database");
        //I want to make sure there is only one row with a NULL PIN
        mysqli_query($connection, "delete from gamestate where game_PIN = 1" );
        //add a row to the gamestate table 
        //I want to make sure the table wasn't already empty
        //when I insert I also need to get the next_pos to prevent an error
        
        mysqli_query($connection, "insert into gamestate(game_PIN) values (1)");
        $board_data_array = '{"1": "topleftcorner", "2": "red", "3": "blue", "4": "gray", "5": "red", "6": "gray", "7": "middleleftcorner", "8": "blue", "9": "gray", "10": "red", "11": "blue", "12": "gray", "13": "centersplitpath", "14": "blue", "15": "gray", "16": "red", "17": "blue", "18": "gray", "19": "downarrow", "20": "red", "21": "blue", "22": "gray", "23": "red", "24": "gray", "25": "bottomrightcorner", "26": "starSpace", "27": "blue", "28": "red", "29": "gray", "30": "blue", "31": "leftupsplitpath", "32": "gray", "33": "blue", "34": "red", "35": "gray", "36": "blue", "37": "bottomleftcorner", "38": "gray", "39": "red", "40": "gray", "41": "blue", "42": "red", "43": "red", "44": "gray", "45": "red", "46": "gray", "47": "blue", "48": "red", "49": "gray", "50": "red", "51": "gray", "52": "blue", "53": "topsplitpath", "54": "red", "55": "gray", "56": "blue", "57": "red", "58": "gray", "59": "gray", "60": "red", "61": "blue", "62": "gray", "63": "blue", "64": "toprightcorner", "65": "red", "66": "blue", "67": "gray", "68": "red", "69": "gray"}';

        mysqli_query($connection, "UPDATE gamestate SET board_data='$board_data_array' WHERE game_PIN = 1");
        
        $next_pos = getNextPos(1);
        mysqli_query($connection, "UPDATE gamestate SET next_pos='$next_pos' WHERE game_PIN = 1");
        //The function gets the game PIN from the url so I do this
        $_GET['pin'] = 1;
        
        //run the function
        rollDice($connection);

        $gamestate_query = mysqli_query($connection, "select * from gamestate where game_PIN = 1");
        $gamestate = mysqli_fetch_assoc($gamestate_query);
        $roll_num = $gamestate['roll_num'];
        //get the roll_num when the game_pin is null
        //test to see if the rollDice function worked
        $this->assertTrue($roll_num > 0 && $roll_num < 7);
        
    }
}
