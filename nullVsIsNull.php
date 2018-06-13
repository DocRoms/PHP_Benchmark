<?php
function nullVsIsNull()
{
    static $var;
    $runs = 1000000;
    $rounds = 10;
    printf("Iterations: %d  (%d Runs)\n", $runs, $rounds);
    printf(" #  | NULL     | rel %%  | is_null() | rel %%  \n");
    printf("----+----------+--------+-----------+--------\n");
    for ($b = 0; $b < $rounds; $b++) {
        $start = microtime(true);
        for ($i = 0; is_null($var), $i < $runs; $i++) ;
        $timea = microtime(true) - $start;
        $start = microtime(true);
        for ($i = 0; null === $var, $i < $runs; $i++) ;
        $timeb = microtime(true) - $start;
        printf(
            " %2d |  %01.5f | %4.1f %% |   %01.5f | %6.1f%%\n",
            $b + 1,
            $timeb,
            ($timeb / $timea) * 100,
            $timea,
            ($timea / $timeb) * 100
        );
    }
}

nullVsIsNull();
