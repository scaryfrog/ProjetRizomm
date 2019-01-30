<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
      break;

      case 'poubelles':
        $controller = new PoubellesController();
      break;

      case 'historiques':
        $controller = new HistoriquesController();
      break;

      case 'utilisateurs':
        $controller = new UtilisateursController();
      break;
      case 'analyse':
        $controller = new AnalyseController();
      break;

      case 'administrateurs':
        require_once('models/administrateur.php');
        $controller = new AdministrateursController();
      break;  

      case 'flux':
        require_once('models/flux.php');
        $controller = new FluxController();
      break;               

    }
    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['home', 'blog', 'error'],
                       'posts' => ['index', 'show'],
                       'poubelles'=>['index', 'add', 'save',  'search', 'searchFlux', 'edit','update', 'delete', 'remove'],
                       'historiques'=>['index', 'add', 'save', 'edit', 'update', 'delete', 'remove','searchf','searchb',],
                       'utilisateurs'=>['index', 'add', 'save', 'search', 'edit','update', 'delete', 'remove'],
                       'analyse'=>['index_real', 'index_hist_byBat', 'index_hist_byID', 'index_hist_global'],
                       'administrateurs'=>['connexion', 'log_out', 'conn', 'log_out', 'passwordForgot', 'generator'],
                       'flux'=>['save_flux', 'add_flux', 'index', 'edit_flux', 'update_flu', 'delete', 'remove']);

  if (array_key_exists($controller, $controllers))
  {
    if (in_array($action, $controllers[$controller])) 
    {
      call($controller, $action);
    }
     else 
    {
      //call('pages', 'error');
       require_once('views/administrateurs/accueil.php');
    }
  }
   else 
  {
    call('pages', 'error');
  }
?>