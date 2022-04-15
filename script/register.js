$(document).ready(function () {
    
    var cin = $("#cin");
    var nom = $("#nom");
    var prenom = $("#prenom");
    var email = $("#lala");
    var password = $("#password");
    var naissance = $("#naissance");
    var specialite = $("#specialite");
    
    
    var a = '';
    $.ajax({
        url: 'controller/GestionFonction.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisi une specialite</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].nom + '</option>';
            }
            specialite.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    
    $('#register').click(function(){
        var v =specialite.val();
        console.log(v);
        if( v == "Choisi une specialite"){
            var er = '<div class="alert alert-danger" role="alert"> informations incomplettes !!</div>';
            $('#login-form').html(er);
        }else{
        $.ajax({
            url: 'controller/gestionDepartement.php',
            data: {op: 'add', nom: nom.val(), cin: cin.val(), prenom: prenom.val(), email: email.val(), telephone: a, n_drp: a, prof_a_ensa:a , point:a ,structure:a
                , date_recrutement:a , date_naissance: naissance.val(), directeur: a , specialite:specialite.val() , password:password.val(), administratif:a, pedagogique:a, scientifique:a, photo: 'no-photo.png'},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                for (i = 0; i < data.length; i++) {
                    var u = data.length-1 ;
                    console.log(data[u].email);
                }
                cin.val('');
                nom.val('');
                prenom.val('');
                email.val('');
                naissance.val('');
                password.val('');
                var op = '<div class="alert alert-success" role="alert">Enregistrement a été bien effectuer</div><br><div><a href="login.php">s\'authentifier</a></div>';
                $('#opa').html(op);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                
                console.log(textStatus);
                
            }
        });
    }
    
});
});