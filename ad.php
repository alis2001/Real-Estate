<?php
	class Ad {
		private $address;
		private $city;
		private $zip;
		private $bedroom;
		private $bathroom;
		private $area;
		private $price;
		private $image;
		private $about;
		function __construct($address,$city,$zip,$bedroom,$bathroom,$area,$price,$image,$about) {
			$this->address = $address;
			$this->city = $city;
			$this->zip = $zip;
			$this->bedroom = $bedroom;
			$this->bathroom = $bathroom;
			$this->area = $area;
			$this->price = $price;
			$this->image = $image;
			$this->about = $about;
		}
		

	}
?>