$(document).ready(function () {
    var id = $('#id');
    var cin = $("#cin");
    var nom = $("#nom");
    var prenom = $("#prenom");
    var email = $("#email");
    var telephone = $("#telephone");
    var recrutement = $("#recrutement");
    var naissance = $("#naissance");
    var n_drp = $("#n_drp");
    var directeur = $("#directeur");
    var specialite = $("#specialite");
    var password = $("#password");
    var photo = $("#photo");
    var structure = $('#structure');
    var pedagogique = $('#pedagogique');
    var administratif = $('#administratif');
    var scientifique = $('#scientifique');
    var ensa = $('#ensa');
    var point = $('#point');
    //alert(ensa.val());
    console.log(pedagogique.val());

    photo.change(function () {
        if (photo[0].validity.valid == true) {
            $(".custom-file-label").eq(0).text(photo[0].files[0].name);
        } else {
            $(".custom-file-label").eq(0).text('Choose file...');
        }
    });
    pedagogique.change(function () {
        if (pedagogique[0].validity.valid == true) {
            $(".custom-file-label").eq(1).text(pedagogique[0].files[0].name);
        } else {
            $(".custom-file-label").eq(1).text('Choose file...');
        }
    });
    administratif.change(function () {
        if (administratif[0].validity.valid == true) {
            $(".custom-file-label").eq(2).text(administratif[0].files[0].name);
        } else {
            $(".custom-file-label").eq(2).text('Choose file...');
        }
    });
    scientifique.change(function () {
        if (scientifique[0].validity.valid == true) {
            $(".custom-file-label").eq(3).text(scientifique[0].files[0].name);
        } else {
            $(".custom-file-label").eq(3).text('Choose file...');
        }
    });
    $.ajax({
        url: '../controller/gestionDepartement.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    $.ajax({
        url: '../controller/GestionFonction.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option >Choisi une specialite</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].nom + '</option>';
            }
            specialite.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    
    

    
    var help = $('#help').val();
    console.log(help);
    var _photo=help;
    /*$(".custom-file-label").eq(1).text(help);
    $(".custom-file-label").eq(2).text(help);
    $(".custom-file-label").eq(3).text(help);*/
    $('#btn').click(function () {
        console.log('1');
            if ($('#btn').text() == 'Modifier') {
                var v = specialite.val();
               if( v == "Choisi une specialite"){
            alert("il faut choisir specialite !!!");
        }else{
            var fd = new FormData();
            fd.append('file', pedagogique[0].files[0]);
            fd.append('cin', $('#id').val());
            $.ajax({
                    url: '../controller/charge.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);   
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            var fb = new FormData();
            fb.append('file', administratif[0].files[0]);
            fb.append('cin', $('#id').val());
            $.ajax({
                    url: '../controller/charge.php',
                    type: 'post',
                    data: fb,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);   
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            var fs = new FormData();
            fs.append('file', scientifique[0].files[0]);
            fs.append('cin', $('#id').val());
            $.ajax({
                    url: '../controller/charge.php',
                    type: 'post',
                    data: fs,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);   
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
                if (photo[0].files.length != 0) {
                    var fd = new FormData();
                    fd.append('file', photo[0].files[0]);
                    fd.append('cin', $('#cin').val());
                    $.ajax({
                        url: '../controller/upload.php',
                        type: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: "text",
                        success: function (data, textStatus, jqXHR) {
                            console.log(data);
                            if (data != 0) {
                                updateEmploye(data);
                            } else {
                                updateEmploye(_photo);
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log("data");
                            updateEmploye(_photo);
                        }
                    });
                } else {
                    updateEmploye(_photo);
                }
                function updateEmploye(pic) {
                    $.ajax({
                        url: '../controller/gestionDepartement.php',
                        data: {op: 'update',id:id.val() ,nom: nom.val(), cin: cin.val(), prenom: prenom.val(), email: email.val(), telephone: telephone.val(), n_drp: n_drp.val(), prof_a_ensa:ensa.val(), point:point.val(),structure:structure.val()
                        , date_recrutement: recrutement.val(), date_naissance: naissance.val(), directeur: directeur.val(),password:password.val(), specialite: specialite.val(), administratif:administratif.val().split('\\').pop(), pedagogique:pedagogique.val().split('\\').pop(), scientifique:scientifique.val().split('\\').pop(), photo: pic},
                        type: 'POST',
                        success: function (data, textStatus, jqXHR) {
                            console.log(data);
                            alert("modification reussite");
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus);
                            alert("echec");
                        }
                    });
                }
            }}
        });

    
        
});



