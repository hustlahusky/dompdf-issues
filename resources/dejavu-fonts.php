<?php

declare(strict_types=1);

use Dompdf\Dompdf;

$content = <<<HTML
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body style="font-family: 'DejaVu Serif', serif;">
Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias, beatae consequuntur deserunt distinctio doloribus earum ex excepturi, fuga magni maiores minima necessitatibus non odit praesentium quo reprehenderit soluta. Beatae?
</body>
</html>
HTML;

$pdf = new Dompdf([
    'defaultPaperSize' => 'A4',
    'defaultPaperOrientation' => 'portrait',
]);
$pdf->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
$pdf->render();
$pdf->stream('document.pdf', ['Attachment' => false]);
die();