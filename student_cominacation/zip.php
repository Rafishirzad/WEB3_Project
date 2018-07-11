<?php

// Start the backup!
zipData('student.sql', 'ziptest.zip');

//echo 'Finished.';
// Here the magic happens :)
function zipData($source, $destination) {
    if (extension_loaded('zip') === true) {
        if (file_exists($source) === true) {
        	//echo $source;
            $zip = new ZipArchive();
           if ($zip->open($destination, ZIPARCHIVE::CREATE) === true) {
                $source = realpath($source);
                if (is_dir($source) === true) {
                    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
                    foreach ($files as $file) {
                        $file = realpath($file);
                        if (is_dir($file) !== true) {
                            $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                        } else if (is_file($file) === true) {
                            $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                        }
                    }
                } else if (is_file($source) === true) {
                    $zip->addFromString(basename($source), file_get_contents($source));
                }
            }
            return $zip->close();
        }
    }
    return false;
}