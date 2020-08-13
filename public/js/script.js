// // Create Form Validation
// $('form#bottle-create').validate({
//     rules: {
//         size: {
//             required: true,
//             minlength: 3,
//         },
//         size_rus: {
//             required: true,
//             minlength: 3,
//         },
//         size_en: {
//             required: true,
//             minlength: 3,
//         },
//     },
//     validClass: 'valid',
//     submitHandler: function (form) {
//         form.submit();
//     }
// });
// $('form#tree-create').validate({
//     rules: {
//         title: {
//             required: true,
//             minlength: 3,
//         },
//         price: {
//             required: true,
//             number: true,
//         },
//
//         article: {
//             required: true,
//         },
//
//     },
//     validClass: 'valid',
//     submitHandler: function (form) {
//         form.submit();
//     }
// });
// $('form#flavor-create').validate({
//     rules: {
//         size: {
//             required: true,
//             minlength: 3,
//         }
//     },
//     validClass: 'valid',
//     submitHandler: function (form) {
//         form.submit();
//     }
// });
// $('form#hardness-create').validate({
//     rules: {
//         size: {
//             required: true,
//             minlength: 3,
//         }
//     },
//     validClass: 'valid',
//     submitHandler: function (form) {
//         form.submit();
//     }
// });
//
//
// // Form Edit
// $('form#users-edit').validate({
//     rules: {
//
//         number: {
//             required: true,
//             minlength: 3,
//             maxlength: 20,
//         },
//
//
//     },
//     validClass: 'valid',
//     submitHandler: function (form) {
//         form.submit();
//     }
// });
//
//
// // Picture Preview
// const readURL = input => {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             $('label[for=file]>img').attr('src', e.target.result);
//             $('label[for=file]').css('background-image', `url('${e.target.result}')`);
//         };
//
//         reader.readAsDataURL(input.files[0]);
//     }
// }
//
// $("input[type=file]").change(function () {
//     readURL(this);
// });
// const isNumberKey = evt => {
//     var charCode = (evt.which) ? evt.which : evt.keyCode;
//     if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 43)
//         return false;
//     return true;
// };
// const isNumberKeys = evt => {
//     var charCode = (evt.which) ? evt.which : evt.keyCode;
//     if (charCode > 31 && (charCode < 48 || charCode > 57) )
//         return false;
//     return true;
// };
// // Form not Submit
// $('label[for=file]>div').hide();
// $('label[for=file]').bind('mouseover', function () {
//     $('label[for=file]>div').fadeIn();
// }).mouseleave(function () {
//     $('label[for=file]>div').fadeOut();
// });
//
