/*Created by lorvent on 1/20/2016.*/
if($("html[dir='rtl']")) {
    $(".editor-cls").wysihtml5({
        stylesheets: "../assets/css/bootstrap-wysihtml5-rtl.css"
    });
}
else{
    $("textarea.editor-cls").wysihtml5();
}

$("#summernote").summernote({
    fontNames: ['Lato', 'Arial', 'Courier New'],
});
$('body').on('click', '.btn-codeview', function (e) {

    if ( $('.note-editor').hasClass("fullscreen") ) {
        var windowHeight = $(window).height();
        $('.note-editable').css('min-height',windowHeight);
    }else{
        $('.note-editable').css('min-height','300px');
    }
});
$('body').on('click','.btn-fullscreen', function (e) {
    setTimeout (function(){
        if ( $('.note-editor').hasClass("fullscreen") ) {
            var windowHeight = $(window).height();
            $('.note-editable').css('min-height',windowHeight);
        }else{
            $('.note-editable').css('min-height','300px');
        }
    },500);

});
$('.note-link-url').on('keyup', function() {
    if($('.note-link-text').val() != '') {
        $('.note-link-btn').attr('disabled', false).removeClass('disabled');
    }
});
jQuery.trumbowyg.langs.fr = {
    _dir: "ltr", // This line is optionnal, but usefull to override the `dir` option
    bold: "Gras",
    close: "Fermer"
};
$("textarea#split_editor").trumbowyg({
    btnsDef: {
        // Customizables dropdowns
        image: {
            dropdown: ['insertImage', 'upload', 'base64', 'noembed'],
            ico: 'insertImage'
        }
    },
    btns: [
        ['viewHTML'],
        ['undo', 'redo'],
        ['formatting'],
        'btnGrp-design',
        ['link'],
        ['image'],
        'btnGrp-justify',
        'btnGrp-lists',
        ['foreColor', 'backColor'],
        ['preformatted'],
        ['horizontalRule'],
        ['fullscreen']
    ],
    plugins: {
        upload: {
            serverPath: 'https://api.imgur.com/3/image',
            fileFieldName: 'image',
            headers: {
                'Authorization': 'Client-ID 9e57cb1c4791cea'
            },
            urlPropertyName: 'data.link'
        }
    },
    svgPath: '../assets/vendors/trumbowyg/js/ui/icons.svg'

});
jQuery.trumbowyg.langs.fr = {
    _dir: "ltr", // This line is optionnal, but usefull to override the `dir` option
    bold: "Gras",
    close: "Fermer"
};
$(document).ready(function(){
    $(".wysihtml5-toolbar li:nth-child(3) a.btn-default span").removeClass("glyphicon-quote").addClass("fa fa-quote-left");
    $(".wysihtml5-toolbar li:nth-child(4) a.btn-default:nth-child(1) span").removeClass("glyphicon-list").addClass("fa fa-list-ul");
    $(".wysihtml5-toolbar li:nth-child(4) a.btn-default:nth-child(2) span").removeClass("glyphicon-th-list").addClass("fa fa-list");
    $(".wysihtml5-toolbar li:nth-child(4) a.btn-default:nth-child(3) span").removeClass("glyphicon glyphicon-indent-right").addClass("fa fa-indent");
    $(".wysihtml5-toolbar li:nth-child(4) a.btn-default:nth-child(4) span").removeClass("glyphicon glyphicon-indent-left").addClass("fa fa-align-right");
})