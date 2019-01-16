<?php
if (!function_exists("customUploadFile")) {

    /**
     * Custom upload function that you send to it the file name in the request like "photo"
     * This function will find or create upload folder for the current month then make upload inside it
     *
     * @param $fileAttr
     * @param $path
     *
     * @return string $filePath
     */
    function customUploadFile($fileAttr, $path = "cars")
    {
        $upload_dir = 'images/';

        if (request()->file($fileAttr)->isValid()) {
            if (!file_exists($upload_dir . $path)) {
                mkdir($upload_dir . $path, 0777, true);
            }

            $file = request()->file($fileAttr);
            //$name = $file->getClientOriginalName();
            $name = microtime(true) . '.' . $file->getClientOriginalExtension();
            $file->move($upload_dir . $path, $name);

            return $path . '/' . $name;
        }

        return false;
    }
}