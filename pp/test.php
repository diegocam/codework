<?php

class PP {

    private $players = array();
    private $games_played = array();

    public function __construct($players_arr = null) {
        $this->players = $players_arr;
    }

    private function serve($player) {
        $prob = rand(1, 100); //sets probability range from 1-100

        // That player's `serve_accuracy` statistic is the chance, as a percentage, that their serve will be in-bounds.
        return ($prob <= $player['serve_accuracy']);
    }

    private function return_hit($player) {
        $prob = rand(1, 100); //sets probability range from 1-100

        //Their `return_skill` statistic is the chance, as a percentage, that they will successfully return the ball
        $returned = ($prob <= $player['return_skill']);
        //their `return_accuracy` statistic is the chance, as a percentage, that their return will be in-bounds
        $return_in_bounds = ($prob <= $player['return_accuracy']);
        return ($returned && $return_in_bounds);
    }

    /*
     * $players is an array holding two players
     */
    private function match($players) {
        //initialize random serving player
        $rand = array_rand($players);

        $serving_p = $players[$rand];
        $other_p = $players[!$rand];

        $max_score = 11;

        $serving_p['points'] = 0;
        $other_p['points'] = 0;

        $serving_p['serve'] = 0;
        $other_p['serve'] = 0;

        echo "<div style='text-decoration: underline'>GAME: {$serving_p['name']} VS. {$other_p['name']}</div>";

        $serving_times = 0;

        while (($serving_p['points'] < $max_score) && ($other_p['points'] < $max_score)) {
            //The serving player serves the ball.
            $serving_p['serve']++;
            $good_serve = $this->serve($serving_p);
            echo("{$serving_p['name']} serves to {$serving_p['name']} ... ");
            if (!$good_serve) {
                echo("the serve is OUT-OF-BOUNDS<br>");
                echo "{$other_p['name']} gets a point!!!<br><br>";
                $other_p['points']++;
            } else {
                echo("the serve is GOOD<br>");
                $playing = true;

                $p1 = $serving_p;
                $p2 = $other_p;

                while ($playing) {
                    echo("{$p2['name']} returns the hit ... ");

                    $good_return = $this->return_hit($p2);

                    //If the receiving player does not return the ball, or if their return is not in-bounds, the other player scores a point, and the point ends.
                    if (!$good_return) {
                        echo "the return FAILS<br>";
                        echo "{$p1['name']} gets a point!!!<br><br>";
                        $p1['points']++;
                        $playing = false;
                    } else {
                        echo "the return is good<br>";
                        //If the receiving player returns the ball,
                        //the other player now becomes the receiving player,
                        // and this process continues until one player fails to successfully return the ball.
                        $p2_clone = $p2;
                        $p2 = $p1;
                        $p1 = $p2_clone;
                    }
                }

                var_dump($p1['serve']);
                var_dump($p2['serve']);

                if ($p1['serve'] < 2) {
                    $p2['serve'] = 0;
                    $serving_p = $p1;
                    $other_p = $p2;
                } else {
                    $p1['serve'] = 0;
                    $serving_p = $p2;
                    $other_p = $p1;
                }


            }
        }
        var_dump($serving_p['points']);
        var_dump($other_p['points']);
        var_dump("---");
    }

    public function begin() {
        foreach ($this->players as $k1 => $p1) {
            unset($this->players[$k1]);
            foreach ($this->players as $k2 => $p2) {

                $this->match(array($p1, $p2));

            }
        }

    }

    public function results() {
        var_dump($this->games_played);
    }

}


// get data from csv file, and turn it into array for easier iterations
$rows = array_map('str_getcsv', file('data.csv'));
$header = array_shift($rows);
$players = array();
foreach ($rows as $row) {
    $players[] = array_combine($header, $row);
}

$game = new PP($players);
$game->begin();
$game->results();

?>
