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
            0.55,
            0.60,
            0.65,
            0.70,
            0.75,
            0.80,
            0.85,
            0.90,
            0.95
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
            $target = 220;
            $target = (($target - $age - $heartRate) * $intensity) + $heartRate;
        }

        return $target;
    }
}