<?php namespace Khill\Lavacharts\Configs;
/**
 * gradient Object
 *
 * An object that specifies a color gradient
 *
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2014, KHill Designs
 * @link https://github.com/kevinkhill/LavaCharts GitHub Repository Page
 * @link http://kevinkhill.github.io/LavaCharts/ GitHub Project Page
 * @license http://opensource.org/licenses/MIT MIT
 */

class gradient extends configOptions
{
    /**
     * Start color for gradient.
     *
     * @var int
     */
    public $startColor = null;

    /**
     * Finish color for gradient.
     *
     * @var int
     */
    public $finishColor = null;

    /**
     * Where on the boundary to start in X.
     *
     * @var array
     */
    public $x1 = '0%';

    /**
     * Where on the boundary to start in Y.
     *
     * @var array
     */
    public $y1 = '0%';

    /**
     * Where on the boundary to finish, relative to $x1.
     *
     * @var array
     */
    public $x2 = '100%';

    /**
     * Where on the boundary to finish, relative to $y1.
     *
     * @var array
     */
    public $y2 = '100%';


    /**
     * Builds the gradient object with specified options
     *
     * @param array config
     * @return \gradient
     */
    public function __construct($config = array()) {

        if ( ! array_key_exists('startColor', $config))
        {
            $this->startColor = $this->_randomColor();
        }

        if ( ! array_key_exists('finishColor', $config))
        {
            $this->finishColor = $this->_randomColor();
        }

        $this->options = array(
            'startColor',
            'finishColor',
            'x1',
            'y1',
            'x2',
            'y2'
        );

        parent::__construct($config);
    }

    /**
     * If present, specifies the start color for the gradient.
     * If undefined, a random color will be used.
     *
     * @param string color1
     * @return \gradient
     */
    public function startColor($startColor)
    {
        if(is_string($startColor))
        {
            $this->startColor = $startColor;
        } else {
            $this->type_error(__FUNCTION__, 'string');
        }

        return $this;
    }

    /**
     * If present, specifies the finish color for the gradient.
     * If undefined, a random color will be used.
     *
     * @param string finishColor
     * @return \gradient
     */
    public function finishColor($finishColor)
    {
        if(is_numeric($finishColor))
        {
            $this->finishColor = $finishColor;
        } else {
            $this->type_error(__FUNCTION__, 'string');
        }

        return $this;
    }

    /**
     * Sets where on the boundary to start in X.
     *
     * @param string x1
     * @return \gradient
     */
    public function x1($x1)
    {
        if(is_string($values))
        {
            $this->x1 = $x1;
        } else {
            $this->type_error(__FUNCTION__, 'string');
        }

        return $this;
    }

    /**
     * Sets where on the boundary to start in Y.
     *
     * @param string y1
     * @return \gradient
     */
    public function y1($y1)
    {
        if(is_string($values))
        {
            $this->y1 = $y1;
        } else {
            $this->type_error(__FUNCTION__, 'string');
        }

        return $this;
    }

    /**
     * Sets where on the boundary to end in X, relative to x1.
     *
     * @param string x2
     * @return \gradient
     */
    public function x2($x2)
    {
        if(is_string($values))
        {
            $this->x2 = $x2;
        } else {
            $this->type_error(__FUNCTION__, 'string');
        }

        return $this;
    }

    /**
     * Sets where on the boundary to end in Y, relative to y1.
     *
     * @param string y2
     * @return \gradient
     */
    public function y2($y2)
    {
        if(is_string($values))
        {
            $this->y2 = $y2;
        } else {
            $this->type_error(__FUNCTION__, 'string');
        }

        return $this;
    }

    /**
     * Generates a random color in hex format.
     *
     * Thank you outis from stackoverflow for letting me be lazy with google
     * instead of coming up with this myself
     * http://stackoverflow.com/users/90527/outis
     *
     * @param void
     * @return string
     */
    private function _randomColor() {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }   

}