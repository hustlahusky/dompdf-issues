<?php

declare(strict_types=1);

use Dompdf\Dompdf;

$content = <<<HTML
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<img src="__DIR__/image.jpg">
</body>
</html>
HTML;

$content = str_replace('__DIR__', __DIR__, $content);

$pdf = new Dompdf([
    'defaultPaperSize' => 'A4',
    'defaultPaperOrientation' => 'portrait',
]);
$pdf->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
$pdf->render();
$pdf->stream('document.pdf', ['Attachment' => false]);
die();