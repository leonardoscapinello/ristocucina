<?php

class Library
{

    private $path;
    private $extension;
    private $files_to_ignore = array();

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function IgnoreFiles($filename)
    {
        array_push($this->files_to_ignore, $filename);
    }


    public function import()
    {

        global $url;
        $path = $this->getPath();
        $ext = $this->getExtension();


        if ($path !== false) {
            if ($ext !== false) {
                $ext = strtolower($ext);
                try {
                    $path = new RecursiveDirectoryIterator($path);
                    foreach (new RecursiveIteratorIterator($path) as $filename => $file) {
                        foreach (glob($file . "/*." . $ext) as $filename) {


                            $originalFileName = $filename;


                            if (!file_exists($filename)) {
                                exit;
                            }

                            $filename = str_replace("\./", "/", $filename);
                            $filename = str_replace("\\", "/", $filename);
                            $filename = str_replace("../", "", $filename);

                            $originalFileName = basename($filename);


                            $filename .= "?v=" . md5(base64_encode(date("dmyhis")));

                            /* ADDED TO MANIPULATE URL IMPORT */

                            if($ext === "css") $filename = STYLESHEET . str_replace(".css", "", $originalFileName);
                            if($ext === "js") $filename = JAVASCRIPT . str_replace(".js", "", $originalFileName);

                            $filename = str_replace("/./", "/", $filename);

                            /* ===============================*/

                            if ($ext == "css") {
                                $loadScript = "<link type=\"text/css\" rel=\"stylesheet\" href=\"" . $filename . "\"  media=\"screen,projection\"/>\n";
                            } elseif ($ext == "js") {
                                $loadScript = "<script type=\"text/javascript\" src=\"" . $filename . "\" /></script>\n";
                            } elseif ($ext == "png" || $ext == "jpg" || $ext == "gif" || $ext == "jpeg") {
                                $loadScript = "<img src=\"" . $filename . "\">";
                            } else {
                                $loadScript = $filename;
                            }
                            //$url->setURL($filename);
                            //if ($url->URLExists()) {

                            // }

                            $ignoreFile = false;
                            $ignore = $this->files_to_ignore;
                            if (count($ignore) > 0) {
                                for ($i = 0; $i < count($ignore); $i++) {
                                    if ($originalFileName === $ignore[$i]) {
                                        $ignoreFile = true;
                                    }
                                }
                            }

                            if (!$ignoreFile) {
                                echo $loadScript;
                            }

                        }
                    }
                } catch (Exception $e) {
                    exit;
                }
            } else {
                exit;
            }
        } else {
            exit;
        }
    }


}

?>