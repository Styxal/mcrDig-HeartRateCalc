<?php

class heartRateCalculator
{
    /**
     * @param $heartRate
     * @param $age
     * @return array
     */
    public function getRates($heartRate, $age){
        $percentages = array(
            55,
            60,
            65,
            70,
            75,
            80,
            85,
            90,
            95
        );
        $output = array();

        $count=0;

        foreach($percentages as $intensity){
//            $values = $this->calculateRates($intensity, $heartRate, $age);
            $output[$count]['intensity'] = $intensity;
            $output[$count]['idealRate'] = $this->calculateRates($intensity, $heartRate, $age);
            $count++;
        }

        return $output;
    }

    /**
     * @param $intensity
     * @param $heartRate
     * @param $age
     * @return int
     */
    public function calculateRates($intensity, $heartRate, $age){
        if ($age+$heartRate == 220){
            $target = 'error';
        } else {
            $intensity /= 100;
            $target = 220;
            $target = (int)(($target - $age - $heartRate) * $intensity) + $heartRate;
        }

        return $target;
    }
}