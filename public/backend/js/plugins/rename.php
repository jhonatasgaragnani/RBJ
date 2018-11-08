<?php

class rename
{
    public function start()
    {
        $files = [];
        $dirs = new DirectoryIterator(__DIR__);

        foreach ($dirs as $dir) {
            if (!$dir->isDot() && $dir->isDir()) {
                foreach (glob($dir . '/*.min.js') as $file) {
                    rename($file, str_replace('.min.js', '.js', $file));
                }
            }
        }

    }
}

(new rename)->start();