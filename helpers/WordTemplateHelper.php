<?php
// helpers/WordTemplateHelper.php

namespace app\helpers;

use PhpOffice\PhpWord\TemplateProcessor;

class WordTemplateHelper
{
    public static function processTemplate($templatePath, $data)
    {
        $templateProcessor = new TemplateProcessor($templatePath);

        // Replace placeholders with actual data
        foreach ($data as $placeholder => $value) {
            $templateProcessor->setValue($placeholder, $value);
        }

        return $templateProcessor->save();
    }
}
