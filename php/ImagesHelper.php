<?php
	class ImagesHelper { 
		private $imagesPath;
		
		public function __construct($imagesPath) {
			$this->imagesPath = $imagesPath;
		}
		
		public function toHTML() {
			$files = scandir($this->imagesPath);
			$total = count($files);
			for($x = 0; $x <= $total; $x++): 
			
				if ($files[$x] != '.' && $files[$x] != '..' && is_file($this->imagesPath."/".$files[$x]) && exif_imagetype($this->imagesPath."/".$files[$x])==3) {
					$filename = pathinfo($this->imagesPath."/$files[$x]", PATHINFO_FILENAME);
					echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">';
					echo '<a class="fancybox thumbnail" rel="gallery1" href="';
					echo $this->imagesPath."/$files[$x]";
					echo '" title="';
					echo "$filename";
					echo '">';
					echo '<img class="img-responsive lazy" data-src="';
					echo $this->imagesPath."/$files[$x]";
					echo '" alt=""></a></div>';
				} 
			endfor;
		}
	}
?>