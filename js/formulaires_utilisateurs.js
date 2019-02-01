$('#liste_images_defaut_profil img').on('click',function(){
   let nom_image=$(this).attr('src'); 
    nom_image=nom_image.split('/')[2];
    $('#image_profil').val(nom_image);
    alert($('#image_profil').val());
});