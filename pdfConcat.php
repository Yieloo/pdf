<?php
require_once("FPDI/fpdi.php");
 
class concat_pdf extends FPDI {
     var $files = array();
     function setFiles($files) {
          $this->files = $files;
     }
     function concat($orientation = 'P') {
          foreach($this->files AS $file) {
               $pagecount = $this->setSourceFile($file);
               for ($i = 1; $i <= $pagecount; $i++) {
                    $tplidx = $this->ImportPage($i);
                    $s = $this->getTemplatesize($tplidx);
                    $this->AddPage($orientation, array($s['w'], $s['h']));
                    $this->useTemplate($tplidx);
               }
          }
     }
}
?>
