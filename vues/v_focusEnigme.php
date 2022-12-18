<div class="bg-gray-400 w-full h-full mt-24">
    <div class="px-4 w-full pt-24 sm:pt-28 lg:pt-20 fixed lg:w-4/6 xl:w-2/3 lg:ml-96 ">
        <div class="h-16 bg-gray-900">
            <p class="text-white text-xl lg:text-2xl px-2 py-2"><?php echo $enigme['libelle'] ?></p> 
        </div>
        <div class=" bg-glue-500 p-2 mt-mr-8 bg-white overflow-y-auto h-[700px] ">
            <div class="flex mt-5">
            <p class="text-xl mr-5" >url : </p><a class="text-blue-400 hover:text-blue-600 text-xl" href="<?php echo $enigme['url'] ?>" target="_blank"> <?php echo $enigme['url'] ?></a>
            </div>
            <div class="flex mt-5 ">
            <p class="text-xl mr-5" >catégorie : <?php echo $enigme['noCategorie'] ?></p>
            </div>
            <div class="flex mt-5">
            <p class="text-xl mr-5" >thématique : <?php echo $enigme['thematique'] ?></p>
            </div>
            <div class="flex mt-5">
            <p class="text-xl mr-5" >difficulté : <?php echo $enigme['noCategorie'] ?></p>
            </div>
            <div class="flex mt-5">
            <p class="text-xl mr-5" >contenu : <?php echo $enigme['contenu'] ?></p>
            </div>
            <div class="mt-20 ">
             
                    <button dt-idPartie="<?php echo 
    $sessionEnCours['current_session'] ?>" dt-idEquipe="<?php echo $idEquipe ?>" dt-numChallenge="<?php echo $enigme['numEnigme'] ?>" class="btnTestFlag cursor-pointer bg-blue-600 py-3 text-xl hover:bg-blue-700 px-5 rounded-lg shadow-lg text-white">
                        Saisir le flag
                    </button>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".btnTestFlag").click(function() {
            var numChallenge = $(this).attr("dt-numChallenge");
            var idEquipe = $(this).attr("dt-idEquipe");
            var idPartie = $(this).attr("dt-idPartie");

            swal.fire({
                title: 'Saisir le flag',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Valider',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    $.ajax({
                        url: "ajax/ajax.php",
                        type: "POST",
                        data: {
                            action: "testFlag",
                            flag: login,
                            numChallenge: numChallenge
                        },
                        success: function(data) {
                            if (data == 'true') {
                                swal.fire({
                                    title: 'Bravo ! ',
                                    text: 'Vous avez trouvé la bonne réponse',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: "ajax/ajax.php",
                                            type: "POST",
                                            data: {
                                                action: "addPoint",
                                                idPartie: idPartie,
                                                numChallenge: numChallenge,
                                                idEquipe: idEquipe
                                            },
                                            success: function(data) {
                                                swal.fire({
                                                    text: 'Vous avez gagné ' + data + ' points',
                                                    html: '<img src="images/trophyWin.GIF" alt="gif" width="80%" height="90%">',
                                                    confirmButtonText: 'OK',
                                                    background: '#6766A9',
                                                    timer: 5000
                                                }).then((result) => {
                                                    window.location.href = "index.php?uc=enigme&action=afficherEnigmes";

                                                })
                                                // reload #tabScore
                                                // $('.enigme' + idEnigme).css('background', 'green');

                                            }
                                        });
                                    }
                                })
                            } else {
                                swal.fire({
                                    title: 'Mauvaise réponse',
                                    icon: 'error',
                                    text: 'Vous avez trouvé la mauvaise réponse',
                                    confirmButtonText: 'OK'
                                })
                            }
                        }
                    });
                },
                allowOutsideClick: () => !swal.isLoading()
            })
        });
    });
</script>