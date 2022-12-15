
<div class="bg-cover h-screen bg-center" style="background-image: url('images/gif/login.gif');">
    <div class="pt-60">
        <form class="w-auto my-auto mx-5 bg-blue-500 rounded-lg shadow-lg max-w-lg sm:mx-auto md:mx-auto lg:mx-auto " method="POST" action="index.php?uc=connexion&action=valideConnexion">
			<div class="pt-5 pb-5">
                <h1 class="text-gray-900 font-semibold text-4xl text-center text-white">Connexion</h1>
            </div>
            <div class="block ml-5">
                <label for="" class="w-full">Login<span class="text-red-500"> *</span></label>
            </div>
            <div class="mx-5 py-2">
                <input class="w-full py-2 rounded-sm" type="text" name="login" placeholder="Login">		
            </div>
            <div class="block ml-5">
                <label for="" class="w-full">Mot de passe<span class="text-red-500"> *</span></label>
            </div>
            <div class="py-2 mx-5">
			    <input class="w-full py-2 rounded-sm" type="password" name="mdp" placeholder="Mot de passe">	
            </div>
            <div class=" py-8 text-center">
                <input class="bg-blue-700 px-5 py-2 text-white font-semibold cursor-pointer rounded-sm shadow-lg hover:bg-blue-800" value="Se connecter" type="submit" >
            </div>
			
		</form>
    </div>	
</div>

