$('.categories_animaux').on('click',function(){
    let id_categorie=$(this).attr('data-id-categorie');
    location.href="liste_animaux.php?idCategorie="+id_categorie;
});

$('#liste_animaux .animaux').on('click',function(){
    let id_animal=$(this).first().attr('data-id-animal');
    location.href="detail_animal.php?idAnimal="+id_animal;
});