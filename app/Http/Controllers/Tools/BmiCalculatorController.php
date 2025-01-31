<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Base;
use App\Settings\ToolSlugSettings;

class BmiCalculatorController extends Base{

    public function index($tool, $settings, $related){

        $error = false;
        $m_number = false;
        $BMIIndex = null;

        if (request()->input('submit')) {
            $height = request()->input('height');
            $heightUnit = request()->input('heightUnit');
            $weight = request()->input('weight');
            $weightUnit = request()->input('weightUnit');

            if($height == '' || $weight == '' || $heightUnit == '' || $weightUnit == ''){
                $error = true;
            }
            elseif (filter_var($height, FILTER_VALIDATE_FLOAT) === false || filter_var($weight, FILTER_VALIDATE_FLOAT) === false) {
                $m_number = true;
            }
            else{
                /*Calculation begins from here.*/
                /*Convert cm to inch -> foot to inch -> meter to inch */
                $HInches = ($heightUnit=='centimeter')?$height*0.393701:(($heightUnit=='foot')?$height*12:(($heightUnit=='meter')?$height*39.3700787:$height));
                /*Convert kg to pound*/
                $WPound = ($weightUnit=='kilogram')?$weight*2.2:$weight;
                $BMIIndex = round($WPound/($HInches*$HInches)* 703,2);
            }
        }


        return view('modules.tools.bmi-calculator.view', [
            'title'         => $settings->title,
            'description'   => $settings->metaDescription,
            'keywords'      => $settings->metaKeywords,
            'summary'       => $settings->summary,

            'tool'          => $tool,
            'toolSettings'  => $settings,
            'toolSlugs'     => app(ToolSlugSettings::class),
            'related'       => $related,

            'BMIIndex'      => $BMIIndex,
            'error'         => $error,
            'm_number'      => $m_number
        ]);
    }
}
