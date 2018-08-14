<?php
require 'connection.php';
$tempid = $_GET['id'];

$conn    = Connect();
$sql = "SELECT * FROM youtable where yourcolumn='$yourvalue'";
$result = $conn->query($sql);

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$yourfilename.'.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('yourcolumn','yourcolumn1'));

// loop over the rows, outputting them
while( $row = $result->fetch_assoc()  ){ fputcsv($output, $row);}

$conn->close();

?> 
