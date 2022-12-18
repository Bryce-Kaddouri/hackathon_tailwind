
<div class="bg-gray-400 w-full h-full mt-24">
    <div class="px-4 w-full pt-24 sm:pt-28 lg:pt-20 fixed lg:w-4/6 xl:w-2/3 lg:ml-96 ">
        <div class="h-16 bg-gray-900">
            <p class="text-white text-3xl font-semibold pt-3 text-center">Liste des énigmes</p> 
        </div>
        <div class=" bg-glue-500 p-2 mt-mr-8 bg-black overflow-y-auto h-[700px] ">

        <?php 
                        foreach ($enigmesResolues as $enigmeResolue){
                    ?>
                    <div class="w-full  bg-green-500 h-16 my-2 flex">
                <div class="w-4/6 my-3 mx-2">
                <p class="text-xl text-white"><?php echo $enigmeResolue['numEnigme'] ?> <?php echo $enigmeResolue['libelle'] ?> (<?php echo $enigmeResolue['nbPoints'] ?> Pts)</p>
                </div>
                <div class="w-1/6 mx-auto border-2 border-green-500" >
                    <button class=" w-16 ml-2 mr-2  border-2 border-gray-400 h-12 my-2 rounded-lg shadow-lg hover bg-white" href="">FLAG</button>
                </div>
            </div>
                    <?php
                        }
                        ?>
                    
                <?php 
                   
                   foreach ($enigmesNonResolues as $enigmeNonResolue){
                   ?>
<div class="w-full  bg-yellow-500 h-16 my-2 flex">
                <div class="w-4/6 my-3 mx-2">
                <p class="text-xl text-white"><?php echo $enigmeNonResolue['numEnigme'] ?> <?php echo $enigmeNonResolue['libelle'] ?> (<?php echo $enigmeNonResolue['nbPoints'] ?> Pts)</p>
                </div>
                <div class="w-1/6 mx-auto border-2 border-green-500" >
                <a href="index.php?uc=enigme&action=focusEnigme&numChallenge=<?php echo $enigmeNonResolue['numEnigme'] ?>"><button class=" w-16 h-16 ml-2 mr-2  border-2 border-gray-400 h-12 my-2 rounded-lg shadow-lg hover bg-white" >FLAG</button></a>
                </div>
            </div>
                   <?php 
                   }
                   ?>
                   
            

           
           
            
        </div>
        </div>
        
    </div>
</div>
