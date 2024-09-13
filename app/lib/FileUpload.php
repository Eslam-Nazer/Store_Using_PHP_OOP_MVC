<?php

namespace PHPMVC\Lib;

use function PHPSTORM_META\elementType;

class FileUpload
{
    private $name;
    private $type;
    private $error;
    private $size;
    private $tmpPath;

    private $fileExtension;
    private $allowedExtensions = [
        "jpg",
        "jpeg",
        "png",
        "gif",
        "pdf",
        "doc",
        "docx",
        "xls"
    ];

    public function __construct(array $file)
    {
        $this->name     = $this->name($file['name']);
        $this->type     = $file['type'];
        $this->error    = $file['error'];
        $this->size     = $file['size'];
        $this->tmpPath  = $file['tmp_name'];
    }

    public function name($name)
    {
        preg_match_all('/([a-z]{1,4})$/i', $name, $m);
        $this->fileExtension = $m[0][0];
        $name = substr(strtolower(base64_encode($name . APP_SALT)), 0, 30);
        $name = rtrim(preg_replace('/(\w{6})/i', '$1_', $name), "_");
        return $name;
    }

    private function isAllowedType()
    {
        return in_array($this->fileExtension, $this->allowedExtensions);
    }

    private function isSizeNotAcceptable()
    {
        preg_match_all('/(\d+)([MG])$/i', MAX_FILE_SIZE_ALLOWED, $matches);
        $maxFileSizeToUpload = $matches[1][0];
        $sizeUnit = $matches[2][0];
        $currentFileSize = ($sizeUnit == 'M') ? ($this->size / 1024 / 1024) : ($this->size / 1024 / 1024 / 1024);
        $currentFileSize = round($currentFileSize, 3);
        return $currentFileSize > $maxFileSizeToUpload;
    }

    private function isImage()
    {
        return preg_match('/image/i', $this->type);
    }

    public function getFileName()
    {
        return $this->name . '.' . $this->fileExtension;
    }

    public function upload()
    {
        if ($this->error != 0) {
            throw new \Exception('Sorry file did\'t uplaod successfully');
        } elseif (!$this->isAllowedType()) {
            throw new \Exception('Sorry files of type ' . $this->fileExtension . ' are not allowed');
        } elseif ($this->isSizeNotAcceptable()) {
            throw new \Exception('Sorry the file size exeeds the mazimum allowed size');
        } else {
            $storageFolder = $this->isImage() ? IMAGES_UPLOAD_STORAGE : DOCUMENTS_UPLOAD_STORAGE;
            if (is_writable($storageFolder)) {
                move_uploaded_file($this->tmpPath, $storageFolder . DS . $this->getFileName());
            } else {
                throw new \Exception('Sorry the destination folder in not writable');
            }
        }
        return $this;
    }
}
