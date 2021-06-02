<?php 
namespace AtlassianConnectCore\Tests;

trait HandlesArrays
{
    public function assertIsArraySubset(array $subArray, array $masterArray)
    {
        $this->assertTrue(
            $this->isArraySubset($subArray, $masterArray)
        );
    }

    public function isArraySubset(array $subArray, array $masterArray)
    {
        $valid = true;

        foreach($subArray as $subKey => $subValue){
            if(!isset($masterArray[$subKey])){
                $valid = false;
                break;
            }

            if( is_array($subValue) ){
                $valid = is_array($masterArray[$subKey]) && $this->isArraySubset($subValue, $masterArray[$subKey]);
            }else{
                $valid = $masterArray[$subKey] == $subValue;
            }

            if( ! $valid ){
                break;
            }
        }

        return $valid;
    }
}