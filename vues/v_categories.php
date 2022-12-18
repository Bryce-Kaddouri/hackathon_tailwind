
<div class="  mt-20 flex h-24 w-full lg:h-full sm:mt-24 lg:w-80 lg:block lg:py-20 lg:ml-8 fixed top-0">
    <div class="bg-gray-600 flex lg:block w-full lg:py-24 ">
        <h2 class="hidden lg:block text-xl ml-2 text-white font-semibold">Catégories</h2>
        <?php 
            foreach($categories as $categorie){
                echo 
                '<div class="flex my-2 mr-auto lg:mt-4 mg:ml-2 ml-2">
                
                    <div class="w-20 h-20 bg-blue-600">
                    <a href="index.php?uc=enigme&action=triEnigme&niveau='.$categorie['numCateg'].'">
                        <img src="images/icon/'.$categorie['icone'].'">
                    
                    </div>
                    <div class="hidden h-full lg:block mx-2 w-52 bg-yellow-600">
                        <p class="text-center bg-red-500 h-full  align-middle">'.$categorie['libelle'].'</p>
                    </div>
                    </a>
                </div>';
            }     
        ?>
    </div>
</div>