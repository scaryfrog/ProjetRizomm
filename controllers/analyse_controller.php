<?php
 require_once('models/analyse.php');
  
   class AnalyseController
   {
      public function index_hist_byBat()
      {
        require_once('views/analyse/index_hist_byBat.php');
      }
      public function index_real()
      {
        require_once('views/analyse/index_real.php');
      }
      public function index_hist_global()
      {
        require_once('views/analyse/index_hist_global.php');
      }
      public function index_hist_byID()
      {
        require_once('views/analyse/index_hist_byID.php');
      }

   }
?>