<?php		
        try

        {

            $bdd = new PDO('mysql:host=localhost;dbname=projetm1;charset=utf8', 'root', 'root');



        }

        catch(Exception $e)

        {

                die('Erreur : '.$e->getMessage());

        }

            /// When connected to database
        $request = '';

        if (isset($_GET['from']) && isset($_GET['to']))
        {
            try
            {
                
                $reponse = $bdd->query('SELECT * from historiques WHERE date_transaction > TIMESTAMP('.$_GET['from'].') AND date_transaction < TIMESTAMP('.$_GET['to'].')');     
            }
            catch(Exception $e)
            {
                $reponse = $bdd->query('SELECT * from historiques');
            }
            
        }
        elseif (  isset($_GET['from'])  ) {
            try
            {
                $reponse = $bdd->query('SELECT * from historiques WHERE date_transaction > TIMESTAMP('.$_GET['from'].')'); 
            }
            catch(Exception $e)
            {
                $reponse = $bdd->query('SELECT * from historiques');
            }

                      
        }
        elseif (  isset($_GET['to'])  ) {
            try
            {
                $reponse = $bdd->query('SELECT * from historiques WHERE date_transaction < TIMESTAMP('.$_GET['to'].')'); 
            }
            catch(Exception $e)
            {
                $reponse = $bdd->query('SELECT * from historiques');
            }
        }
        else
        {
                $reponse = $bdd->query('SELECT * from historiques');
        }
        
        $idList = array();

        while($result = $reponse->fetch()) {
            array_push($idList,[$result[0],$result[1],$result[2],$result[3],$result[4] ] );
        }
        print_r(json_encode($idList));					  
?>