<?php

namespace ShipEarly\Wkhtmltopdf;

if (!function_exists(__NAMESPACE__ . '\get_wkhtmltopdf_bin')) {
    /**
     * @return string get path to wkhtmltopdf bin
     */
    function get_wkhtmltopdf_bin(): string
    {
        $OS = parse_ini_file('/etc/os-release');
        $ROOT = dirname(__FILE__, 2);
        $dir = $ROOT . '/binaries/amd64';

        // Production uses the alpine binary
        $bin = 'wkhtmltopdf_0.12.5_linux_alpine_3.13';

        // Dev environments are assumed to run ubuntu
        if ($OS['ID'] === 'ubuntu') {
            // The latest ubuntu binary also works on versions beyond Jammy 22.04 so far.
            $bin = 'wkhtmltopdf_0.12.6_linux_ubuntu_jammy';

            if (version_compare($OS['VERSION_ID'], '22.04', '<')) {
                $legacy_bin = "wkhtmltopdf_0.12.5_linux_ubuntu_{$OS['VERSION_CODENAME']}";
                if (file_exists($dir . '/' . $legacy_bin)) {
                    $bin = $legacy_bin;
                }
            }
        }

        return $dir . '/' . $bin;
    }
}
