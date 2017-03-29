<?php

class heartRateCalculator
{

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

        foreach($percentages as $intensity){
            $values = $this->calculateRates($intensity, $heartRate, $age);
            $output['intensity'] = $intensity;
            $output['idealRate'] = $values;
        }

        return $output;
    }

    public function calculateRates($intensity, $heartRate, $age){
        $target = (((220 - $age) - $heartRate) * $intensity) + $heartRate;

        return $target;
    }
}