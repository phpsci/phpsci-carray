<?php
namespace PHPSci\Plot;

use pData;
use PHPSci\CArray;
use pImage;

/**
 * Class Plotter
 * @package PHPSci\Plot
 */
class Plotter
{
    /**
     * @var
     */
    private $img_resource;

    /**
     * @var
     */
    private $width = 800;

    /**
     * @var
     */
    private $height = 600;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var float
     */
    private $grid_padding = 80;

    /**
     * Plotter constructor.
     * @param array $args
     */
    public function __construct(... $args)
    {
        $this->setData($args);
        $this->img_resource = $this->createImage();
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data[0];
    }

    /**
     * @param int $width
     * @param int $height
     * @return resource
     */
    private function createImage()
    {
        return imagecreate( $this->width, $this->height );
    }

    /**
     * @param int $width
     * @return Plotter
     */
    public function setWidth(int $width) : Plotter
    {
        $this->width = $width;
        $this->createImage();
        return $this;
    }

    /**
     * @param int $height
     * @return Plotter
     */
    public function setHeight(int $height) : Plotter
    {
        $this->height = $height;
        $this->createImage();
        return $this;
    }

    /**
     * @return resource
     */
    public function image()
    {
        return $this->img_resource;
    }

    /**
     * @param $x1
     * @param $y1
     * @param $x2
     * @param $y2
     * @param int $size
     * @param array $rgb
     */
    private function addLine($x1 , $y1 , $x2 , $y2, $size = 5, $rgb = [0, 0, 0])
    {
        imagesetthickness($this->image(), $size);
        $color = imagecolorallocate($this->image(), $rgb[0], $rgb[1], $rgb[2]);
        imageline ( $this->image() , $x1 , $y1 , $x2 , $y2 , $color);
    }

    /**
     * Get grid size
     */
    private function gridWidth()
    {
        return $this->width - ($this->grid_padding * 2);
    }

    /**
     * @param string $text
     * @param int $size
     * @param int $angle
     * @param int $x
     * @param int $y
     * @param array $rgb
     */
    private function addText(string $text, $x = 0, $y = 0, $rgb = [0, 0, 0])
    {
        $color = imagecolorallocate($this->image(), $rgb[0], $rgb[1], $rgb[2]);
        imagestring($this->image(), 5, $x, $y, $text, $color);
    }

    /**
     * @return float|int
     */
    public function gridHeight()
    {
        return $this->height - ($this->grid_padding * 2);
    }

    /**
     * Draw axes
     */
    private function drawAxes()
    {
        $this->addLine(
            $this->grid_padding,
            ($this->gridHeight()/2 + $this->grid_padding),
            $this->gridWidth() + $this->grid_padding,
            ($this->gridHeight()/2 + $this->grid_padding),
            1
        );

        $this->addLine(
            ($this->gridWidth()/2 + $this->grid_padding),
            $this->grid_padding,
            ($this->gridWidth()/2 + $this->grid_padding),
            $this->gridHeight() + $this->grid_padding,
            2
        );
    }

    /**
     * Draw Y Bottom Labels
     */
    private function drawLabels()
    {
        $min_value = CArray::amin($this->data[0]);
        $max_value = CArray::amax($this->data[0]);

        $left = CArray::toArray(
            CArray::linspace($min_value, 0, 5, false)
        );

        $right = CArray::toArray(
            CArray::linspace(0, $max_value, 5)
        );

        # Remove 0 so it don't repeat
        array_shift($right);

        $bottom_values = array_merge(
            $left,
            $right
        );

        $padding = CArray::toArray(
            CArray::linspace($this->grid_padding, $this->gridWidth(), count($bottom_values))
        );

        foreach($bottom_values as $k => $value) {
            $this->addLine(
                $padding[$k] + ($this->grid_padding/2),
                $this->height - $this->grid_padding,
                $padding[$k] + ($this->grid_padding/2),
                $this->height - ($this->grid_padding/1.5)
            );
            $this->addText(
                $value,
                $padding[$k] + ($this->grid_padding/2.5),
                $this->height - ($this->grid_padding/2)
            );
        }



        $min_value = CArray::amin($this->data[1]);
        $max_value = CArray::amax($this->data[1]);

        $side_values = CArray::toArray(
            CArray::linspace($min_value, $max_value, 6, false)
        );

        $padding = CArray::toArray(
            CArray::linspace($this->gridHeight(), $this->grid_padding, count($side_values))
        );


        foreach($side_values as $k => $value) {
            $this->addLine(
                $this->grid_padding,
                $padding[$k] + ($this->grid_padding/2),
                ($this->grid_padding/1.5),
                $padding[$k] + ($this->grid_padding/2)
            );
            $this->addText(
                round($value, 2),
                $this->grid_padding * 0.2,
                $padding[$k] + ($this->grid_padding/2.5)
            );
        }
    }

    /**
     * Plot Graph
     */
    public function plot()
    {
        $background = imagecolorallocate( $this->image(), 255, 255, 255 );

        $this->generateGrid();
        imagesetthickness ( $this->image(), 5 );

        $this->drawLabels();
        $this->drawAxes();

        $min_value_x = CArray::amin($this->data[0]);
        $max_value_x = CArray::amax($this->data[0]);

        $min_value_y = CArray::amin($this->data[1]);
        $max_value_y = CArray::amax($this->data[1]);

        $x = CArray::toArray($this->data[0]);
        $y = CArray::toArray($this->data[1]);


        for($i = 0; $i < $this->data[0]->x; $i ++) {

            $this->addDot(
                ((($x[$i]/$max_value_x)/2) * $this->gridWidth()) + ($this->grid_padding * 5),
                $this->gridHeight() - (($y[$i]/$max_value_y) * $this->gridHeight()),
                5,
                5
            );
        }
        imagepng( $this->image() , 'plot.jpg');
    }

    /**
     * Add dot to image
     * @param $x
     * @param $y
     * @param $w
     * @param $h
     * @param array $rgb
     */
    public function addDot($x, $y, $w, $h, $rgb = [0, 0, 255])
    {
        // choose a color for the ellipse
        $ellipseColor = imagecolorallocate($this->image(), $rgb[0], $rgb[1], $rgb[2]);
        // draw the blue ellipse
        imagefilledellipse($this->image(), $x, $y, $w, $h, $ellipseColor);
    }

    /**
     * Add Rectangle to Graph
     * @param $x1
     * @param $y1
     * @param $x2
     * @param $y2
     * @param array $colors
     */
    public function addRectangle($x1, $y1, $x2, $y2, $colors = [0, 0, 0])
    {
        $color = imagecolorallocate($this->image(), $colors[0],  $colors[1],  $colors[2]);
        imagerectangle ( $this->image() , $x1 , $y1 , $x2 , $y2 ,  $color );
    }

    /**
     * Generate Graph Grid
     */
    private function generateGrid()
    {
        $this->addRectangle(
            $this->grid_padding,
            ($this->height-$this->grid_padding),
            ($this->width-$this->grid_padding),
            $this->grid_padding
        );
    }

    /**
     * Destroy Image
     */
    public function destroy()
    {
        imagedestroy($this->image());
    }

    /**
     * @param $data
     * @return Plotter
     */
    public static function graph(...$data)
    {
        if(is_string(end($data))) {
            $plotter = new Plotter(array_shift($data));
            $plotter->plot(end($data));
            return $plotter;
        }
        $plotter = new Plotter($data);
        $plotter->plot();
        return $plotter;
    }
}