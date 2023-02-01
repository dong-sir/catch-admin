<?php

namespace Modules\Common\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Common\Support\Upload\Uploader;

/**
 * image
 */
class UploadController
{
    /**
     * @param Request $request
     * @param Uploader $uploader
     * @return array
     */
    public function file(Request $request, Uploader $uploader): array
    {
        return $uploader->upload($request->file('file'));
    }

    /**
     * image
     *
     * @param Request $request
     * @param Uploader $uploader
     * @return array
     */
    public function image(Request $request, Uploader $uploader): array
    {
        return $uploader->upload($request->file('image'));
    }
}
