/**
 * Created by SL_WOLF on 1/23/2018.
 */

// $("#btnUpload").click(function(){
//
//     var httpRequest = new XMLHttpRequest();
//
//     httpRequest.onreadystatechange = function(){
//         if (httpRequest.readyState === 4 & httpRequest.status === 200){
//             // alert(httpRequest.responseText);
//         }
//     };
//
//     httpRequest.open('POST','upload-file.php',true);
//
//     httpRequest.setRequestHeader("Content-Type","multipart/form-data");
//
//     var queryString = $("#frm").serialize();
//
//     httpRequest.send(queryString);
// });

$("#btnUpload").click(function () {
    $("#frm").attr("action","upload-file.php");
    $("#frm").submit();
 });

$("#btnUpgrade").click(function () {
    $("#frm").attr("action","upgrade.php");
    $("#frm").submit();
});

$("#cmbGb").change(function(){

   var p = $("#txtPrice").val();
   var price=parseInt(p);
    var s=$("#cmbGb").val();
    var select=parseInt(s);
    var amount=price*select;
    $('#txtPriceFor').val(amount);
    var current=$("#txtCurreuntly").val();
    var gb=parseInt(current);
    var tot=gb+select;
    $('#txtAmountGb').val(tot);
});

$("#userNameChng").click(function () {
   $("#frm").attr("action","change-username.php?title=Change Username");
   $("#frm").submit();
});

$("#btnChngUsername").click(function () {
   $("#frm").attr("action","update-name.php");
   $("#frm").submit();
});

$("#passChng").click(function () {
    $("#frm").attr("action","change-password.php?title=Change Password");
    $("#frm").submit();
});

$("#btnChngPass").click(function () {
    $("#frm").attr("action","update-password.php");
    $("#frm").submit();
});

$("#deactivate").click(function () {
    $("#frm").attr("action","confirm.php?title=Confirm Deactivation");
    $("#frm").submit();
});

$("#btnback").click(function () {
    $("#frm").attr("action","settings.php?title=Settings");
    $("#frm").submit();
});

$("#btndeactivate").click(function () {
    $("#frm").attr("action","deactive.php");
    $("#frm").submit();
});

