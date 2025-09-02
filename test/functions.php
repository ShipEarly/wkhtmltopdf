<?php
/**
 * No framework. Just a script that can be run directly to sanity check the functions.
 *
 * Eg. Run from project root:
 *
 * ```
 * php test/functions.php
 * ```
 */

namespace ShipEarly\Wkhtmltopdf\Test;

require __DIR__ . '/../vendor/autoload.php';

$filename = \ShipEarly\Wkhtmltopdf\get_wkhtmltopdf_bin();
print_r([
    'os' => parse_ini_file('/etc/os-release'),
    'filename' => $filename,
    'exists' => file_exists($filename) ? 'yes' : 'no',
]);
