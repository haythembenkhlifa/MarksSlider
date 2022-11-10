<?php

namespace Haythembenkhlifa\MarksSlider;

use Laravel\Nova\Fields\Field;

class MarksSlider extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'marks-slider';



    /**
     * Set Values.
     * 
     * @param array $values
     * @return $this 
     */
    public function setValues(array $values)
    {
        return $this->withMeta([
            'values' => $values,
        ]);
    }



    /**
     * Show labels.
     * 
     * @param array $values
     * @return $this 
     */
    public function setStep($step)
    {
        return $this->withMeta([
            'step' => $step,
        ]);
    }



    /**
     * Show labels.
     * 
     * @param array $values
     * @return $this 
     */
    public function showLabels($show = true)
    {
        return $this->withMeta([
            'showLabels' => $show,
        ]);
    }
}
