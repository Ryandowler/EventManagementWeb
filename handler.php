<html>
    <head> 
        
    </head>
    <body>
        <h2>Handling data</h2>
        <?php
        
        echo 'you selected: <br/>';
        $food = $_POST['food'];
        foreach ($food as $key => $value){
            echo $value.'<br>';
        }
           
   ?>
  
    </body>
    
    
    
</html>