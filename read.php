<?php
	
	//ini_set('memory_limit', '200M'); 

	require 'vendor/autoload.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;

	$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
	$reader->setReadDataOnly(TRUE);
	$spreadsheet = $reader->load("Power Alarm_W38_2018.xlsx");

	//$worksheet = $spreadsheet->getActiveSheet();
	$worksheet = $spreadsheet->getSheetByName('Power Alarm');

	// Get the highest row and column numbers referenced in the worksheet
	$highestRow = $worksheet->getHighestRow(); // e.g. 10
	$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
	$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

	echo "<table border='1'>" . "\n";
	for ($row = 1; $row <= $highestRow; ++$row) {
	    echo '<tr>' . PHP_EOL;
	    echo '<td>' . $row . '</td>' . PHP_EOL;
	    for ($col = 1; $col <= $highestColumnIndex; ++$col) {
	        $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
	        //if($value != null)
	        echo '<td>' . $value . '</td>' . PHP_EOL;
	    }
	    echo '</tr>' . PHP_EOL;
	}
	echo '</table>' . PHP_EOL;

?>