<?php
$filexml = 'tours.xml';
if (file_exists($filexml)) {

    $xml = simplexml_load_file($filexml);
    $i = 1;           // Position counter
    $values = [];     // PHP array

    // Writing column headers
    $columns = array('Title', 'Code', 'Duration', 'Start', 'End', 'Inclusions', 'MinPrice');

    $fs = fopen('tours.csv', 'w');
    fputcsv($fs, $columns);
    fclose($fs);

    // Iterate through each <tour> node
    $node = $xml->xpath('//TOUR');

    foreach ($node as $n) {

        // Iterate through each child of <tour> node
        $child = $xml->xpath('//TOUR[' . $i . ']/*');
        $prices = [];
        $count = 0;
        foreach ($child as $value) {
            if (xml_attribute($value, 'EUR')) {
                $prices['eur'][$count] = xml_attribute($value, 'EUR');
                $prices['discount'][$count] = xml_attribute($value, 'DISCOUNT');
            }
            $value = str_replace('&nbsp;', '', $value);
            $value = html_entity_decode($value);
            $values[] = trim(strip_tags($value));
            $count++;
        }
        $price_arr = [];
        foreach ($prices['eur'] as $key => $price) {
            $percent = rtrim($prices['discount'][$key], '%');
            $percent_value = ($percent / 100) * $price;
            $price_arr[] = $price - $percent_value;
        }
        $values = array_filter($values);
        $values[] = number_format(min($price_arr),2);

        // Write to CSV files (appending to column headers)
        $fs = fopen('tours.csv', 'a');
        fputcsv($fs, $values);
        fclose($fs);

        $values = [];    // Clean out array for next <tour> (i.e., row)
        $i++;            // Move to next <tour> (i.e., node position)
    }
}
function xml_attribute($object, $attribute)
{
    if (isset($object[$attribute])) {
        return (string)$object[$attribute];
    }
}