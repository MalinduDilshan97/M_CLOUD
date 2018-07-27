/**
 * Created by SL_WOLF on 1/29/2018.
 */

$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
        $('#profileImage').attr('src',
            window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});

///////////////////////////////////////////////////////////////////

$("#coverImage").click(function(e) {
    $("#imageUploadCover").click();
});

function fasterPreviewCover( uploaderCover ) {
    if ( uploaderCover.files && uploaderCover.files[0] ){
        $('#coverImage').attr('src',
            window.URL.createObjectURL(uploaderCover.files[0]) );
    }
}

$("#imageUploadCover").change(function(){
    fasterPreviewCover( this );
});


////////////////////////////////////////////////////////////

$("#otherImage-1").click(function(e) {
    $("#otherImageUpload-1").click();
});

function fasterPreviewOther1( uploader1 ) {
    if ( uploader1.files && uploader1.files[0] ){
        $('#otherImage-1').attr('src',
            window.URL.createObjectURL(uploader1.files[0]) );
    }
}

$("#otherImageUpload-1").change(function(){
    fasterPreviewOther1( this );
});

////////////////////////////////////////////////////////////

$("#otherImage-2").click(function(e) {
    $("#otherImageUpload-2").click();
});

function fasterPreviewOther2( uploader2 ) {
    if ( uploader2.files && uploader2.files[0] ){
        $('#otherImage-2').attr('src',
            window.URL.createObjectURL(uploader2.files[0]) );
    }
}

$("#otherImageUpload-2").change(function(){
    fasterPreviewOther2( this );
});

////////////////////////////////////////////////////////////

$("#otherImage-3").click(function(e) {
    $("#otherImageUpload-3").click();
});

function fasterPreviewOther3( uploader3 ) {
    if ( uploader3.files && uploader3.files[0] ){
        $('#otherImage-3').attr('src',
            window.URL.createObjectURL(uploader3.files[0]) );
    }
}

$("#otherImageUpload-3").change(function(){
    fasterPreviewOther3( this );
});

////////////////////////////////////////////////////////////

$("#otherImage-4").click(function(e) {
    $("#otherImageUpload-4").click();
});

function fasterPreviewOther4( uploader4 ) {
    if ( uploader4.files && uploader4.files[0] ){
        $('#otherImage-4').attr('src',
            window.URL.createObjectURL(uploader4.files[0]) );
    }
}

$("#otherImageUpload-4").change(function(){
    fasterPreviewOther4( this );
});