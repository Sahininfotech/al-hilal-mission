<?php
 header('Content-disposition: attachment; filename=notice-pdf-report.pdf');
 header('Content-type: application/pdf');
 readfile('notice-pdf-report.pdf');
 ?>