function sites(){
    if ($('#sites').css('display') === 'block'){
        $('#sites').hide();
    }else{
        $('#sites').show();
    }
}

function gals(){
    if ($('#gals').css('display') === 'block'){
        $('#gals').hide();
    }else{
        $('#gals').show();
    }
}

function polls(){
    if ($('#polls').css('display') === 'block'){
        $('#polls').hide();
    }else{
        $('#polls').show();
    }
}

function upload(){
    if ($('#upload').css('display') === 'block'){
        $('#upload').hide();
    }else{
        $('#upload').show();
    }
}

function info(){
    if ($('#info').css('display') === 'block'){
        $('#info').hide();
    }else{
        $('#info').show();
    }
}

function admins(){
    if ($('#admins').css('display') === 'block'){
        $('#admins').hide();
    }else{
        $('#admins').show();
    }
}

function cpy(text){
    window.prompt ("Skopiuj link:", text);
}
                        
function del(file){
    if (confirm('Czy na pewno usunąć '+file+'?')){
        document.location='save.php?action=upl_del&file='+file;
    }
}

function del_img(id,gal){
    if (confirm('Czy na pewno usunąć zdjęcie?')){
        document.location='save.php?action=img_del&id='+id+'&gal='+gal;
    }
}
                    
function del_gal(gal){
    if(confirm('Czy na pewno usunąć galerię'+gal+'?')){
       document.location='save.php?action=del_gal&gal='+gal;
    }
}

function adm_validate(){
    if ($('#p1').val() === $('#p2').val()){
        $('#adm_form').submit();
    }else{
        alert('Podane hasła nie sią identyczne!');
    }
}

function adm_del(id){
    if(confirm('Czy na pewno usunąć operatora?')){
       document.location='save.php?action=adm_del&id='+id;
    }
}
