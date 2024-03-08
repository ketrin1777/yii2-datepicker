<?php

namespace ketrin1777\datepicker;

use DateTime;
use Yii;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * This is just an example.
 */
class DateFramepicker extends InputWidget
{

    private $_assetBundle;

    public function init()
    {
        parent::init();
        $this->registerAssetBundle();
    }

    public function run()
    {
        $html = '<div class="date_time_pick_wrap">';

        if ($this->value == null) {
            $this->value = Yii::$app->formatter->asTimestamp(date('U'));
        }


        $dateValue = Yii::$app->formatter->asDate($this->value, 'php:Y-m-d');
  
        $dateMinValue = new DateTime($dateValue);
        $dateMaxValue = new DateTime($dateValue);
       
        $dateMinValue->modify("- 100 year");
        $dateMaxValue->modify("- 18 year");
        // print_r(Yii::$app->formatter->asTimestamp($dateMaxValue->format("Y-m-d")));
        // debug($this->field->name);

        $inputOption = $this->options;
        $outOption = $this->options;
        $inputOption['class'] .= ' inputTime';
        $inputOption['type'] = 'hidden';
        $outOption['type'] = 'date';
        $outOption['class'] .= ' outDateTime';
        $outOption['min'] = $dateMinValue->format("Y-m-d");
        $outOption['max'] = $dateMaxValue->format("Y-m-d");

        if ($this->hasModel()) {
            // return Html::activeInput($this->model, $this->attribute, $this->options);
            $html .= Html::activeInput($this->name, $this->model, $this->attribute, $inputOption);
        } else {
            $html .= Html::input($this->name, $this->value, $inputOption);
        }
        
        $html .= Html::textInput('datetimepicker', $dateMaxValue->format("Y-m-d"), $outOption);
        $html .= '</div>';
        return $html;
    }

    public function registerAssetBundle()
    {
        $this->_assetBundle = DatePickAsset::register($this->getView());
    }
}
