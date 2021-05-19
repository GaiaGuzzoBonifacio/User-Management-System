<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>
    
    <div class="container">
        
        <form class="mt-4" action="<?= $action ?>" method="POST">
            <div class="form-group">
               <label for="">Email</label>
               
               <input value="<?= $email ?>" 
                      class="form-control <?= $emailClass ?>"  
                      name="email"  
                      type="text">

               <div class="<?= $emailClassMessage ?>">
                    
               </div> 
            </div>

            <div class="form-group">
               <label for="">Password</label>
               
               <input
                value="<?= $password ?>" 
                class="form-control <?= $passwordClass ?>"  
                name="password"  
                type="text">
                <div class="<?= $passwordClassMessage ?>">
                  
                </div>
                
            </div>


            
             
             <button class="btn btn-primary mt-3" type="submit"><?= $submit ?></button>
        </form>
    </div>
    
</body>
</html>