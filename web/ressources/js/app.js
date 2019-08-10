$(function () {
    'use-strict';

    // Retour à la page précedente
    $('.go-to-back').on('click', function() {
        window.history.back()
    });
    
    // Fermeture de l'application 
    $('.exit').on('click', function () {
        if (confirm("Voulez-vous vraiment quitter l'application?")) {
            window.open('','_parent', '');
            window.close();
            console.log("Fermer la fenetre");
        }
    })
});
