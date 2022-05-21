<?php

namespace CountMnmsSolution\Services;

use CountMnmsSolution\Exceptions\EmptyBagException;

class MnmsCounter
{
    public function sort(array $bagOfMnms): array
    {
        if (0 === count($bagOfMnms)) {
            throw new EmptyBagException('The bag is empty', 500);
        }

        $numberOfRedMnms = 0;
        $numberOfBlueMnms = 0;
        $numberOfYellowMnms = 0;
        $numberOfGreenMnms = 0;

        for ($i = 0; $i < count($bagOfMnms); $i++) {
            switch ($bagOfMnms[$i]) {
                case 'red':
                    $numberOfRedMnms++;
                break;
                case 'blue':
                    $numberOfBlueMnms++;
                break;
                case 'yellow':
                    $numberOfYellowMnms++;
                break;
                default:
                    $numberOfGreenMnms++;
            }
        }

        return [
            'number of red M&M\'s' => $numberOfRedMnms,
            'number of blue M&M\'s' => $numberOfBlueMnms,
            'number of yellow M&M\'s' => $numberOfYellowMnms,
            'number of green M&M\'s' => $numberOfGreenMnms,
        ];
    }
}
