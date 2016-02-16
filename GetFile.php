<?php
$file_server_path = "EducationImports/ExportBak.txt";
$download_size = filesize( $file_server_path );
header("Content-type: application/x-download");
header("Content-Disposition: attachment; filename='ExportBak.txt';");
header("Accept-Ranges: bytes");
header("Content-Length: " . $download_size );
readfile( $file_server_path );
?>