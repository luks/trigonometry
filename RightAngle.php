<?php


class ThumbnailTileFullScreenGenerator {


	const	DESIRED_HEIGHT = 5;

	const CONTENT_WIDTH = 10;	

	public $object;

	function __construct($object) {
		$this->object = $object;
	}
  

  function calculateTopAngle() {
  	$bottomAngle = atan2($this->object['height'], $this->object['width'] ) * ( 180 / pi() );
   	return round(90 - $bottomAngle,2);
  }

	function caculateImaginaryImgWidthUsingDesiredHeight() {
		return round(tan(($this->calculateTopAngle() * 2 * 3.14)/360) * self::DESIRED_HEIGHT, 2);
	}

	function calculateHeightUsingContentWidth($actual_width) {
		return round(self::DESIRED_HEIGHT * self::CONTENT_WIDTH/$actual_width,2);
	}


  function findBlockHeight($w) {
  	return round(tan(($this->calculateBlockAngle($w) * 2 * 3.14)/360) * self::CONTENT_WIDTH, 2);
  }

  private function calculateBlockAngle($w) {
  	$bottomAngle = atan2(self::DESIRED_HEIGHT, $w) * ( 180 / pi() );
   	return round($bottomAngle,2);
  }



}

$object = array('height' => 3, "width" => 7);
$calc = new ThumbnailTileFullScreenGenerator($object);
$i = $calc->caculateImaginaryImgWidthUsingDesiredHeight();



$object = array('height' => 6, "width" => 4);
$calc = new ThumbnailTileFullScreenGenerator($object);
$i += $calc->caculateImaginaryImgWidthUsingDesiredHeight();



$object = array('height' => 2, "width" => 3);
$calc = new ThumbnailTileFullScreenGenerator($object);
$i += $calc->caculateImaginaryImgWidthUsingDesiredHeight();




$object = array('height' => 7, "width" => 6);
$calc = new ThumbnailTileFullScreenGenerator($object);
$i += $calc->caculateImaginaryImgWidthUsingDesiredHeight();

echo $calc->findBlockHeight($i);




class Shape {



}



class RightTriangle  extends Shape {
	
	const	DESIRED_HEIGHT = 5;

	const CONTENT_WIDTH = 10;	

	public $object;

	function __construct($object) {
		$this->object = $object;
	}

	function caculateImaginaryImgWidthUsingDesiredHeight() {
		return round(tan(($this->calculateTopAngle() * 2 * 3.14)/360) * self::DESIRED_HEIGHT, 2);
	}

  function calculateHeightUsingContentWidth($actual_width) {
		return round(self::DESIRED_HEIGHT * self::CONTENT_WIDTH/$actual_width,2);
	}

  function findBlockHeight($w) {
  	return round(tan(($this->calculateBlockAngle($w) * 2 * 3.14)/360) * self::CONTENT_WIDTH, 2);
  }

  private function calculateTopAngle() {
  	$bottomAngle = atan2($this->object['height'], $this->object['width'] ) * ( 180 / pi() );
   	return round(90 - $bottomAngle,2);
  }

  private function calculateBlockAngle($w) {
  	$bottomAngle = atan2(self::DESIRED_HEIGHT, $w) * ( 180 / pi());
   	return round($bottomAngle,2);
  }

}



?>
