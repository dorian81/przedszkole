function tabs(){
    var tmpclass=$('.selected')[0].className;
    $('#content').addClass(tmpclass.substr(tmpclass.indexOf('bg'),tmpclass.length));
    
}
function min_width(){
    if ($('#left').height()>$('#content').height()) {
            $('#content').height($('#left').height());
    }
}