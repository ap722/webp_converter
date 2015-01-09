<?php

	class Webp {
		private $filename = null;

		private $webpfile = null;

		function __construct($filename)
		{
			$this->filename = $filename;
			// $crc = crc32($filename);

			$this->Run($filename);

		}

		function __destruct()
		{

		}

		protected function Convert($filename)
		{
			try{
			   $ext = strtolower( pathinfo($filename, PATHINFO_EXTENSION) );
				switch ($ext) {
					case ('jpg' || 'jpeg') :
						$image = imagecreatefromjpeg($filename); break;
					case 'png' :
						$image = imagecreatefrompng($filename); break; 
				}

				$outputfile = crc32($filename) . '.webp';
				imagewebp($image, $outputfile, 75);
				imagedestroy($image);
				return $outputfile;

			} catch ( Exception $e ) {
				echo $e->getMessage();
			}
		}

		protected function Run($filename)
		{
			try {
				
				if ( ! file_exists($filename) ) throw new Exception('File not exists');
				
				$crc = crc32($filename) . '.webp';
				if ( ! file_exists( $crc ) ) {
					return $this->webpfile = $this->Convert($filename);
				} else {
					return $this->webpfile = $crc;
				}

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		function __toString(){
			return (string) $this->webpfile;
		}

	}