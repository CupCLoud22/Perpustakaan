<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function generate_pdf($object, $filename, $direct_download=true, $papersize, $orientation){
		require_once('dompdf/dompdf_config.inc.php');

		$dompdf = NEW dompdf();
		$dompdf -> load_html($object);
		$dompdf -> set_paper($papersize, $orientation);
		$dompdf -> render();

		if($direct_download == true){
			$dompdf -> stream ($filename, array("Attachment" => 0));
		}else{
			return $dompdf -> output();
		}
	}