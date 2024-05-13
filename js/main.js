// $(document).ready(function(e){
//     $('.increment-btn').click(function(e){
//         e.preventDefult();
//         var quant = $(this).closest('.product-data').find(`.quan`).val();
//         var value = parseInt(quant, 10);
//         value = isNaN(value) ? 0 : value;
//         if(value <10)
//             {
//                 value++;
//                 $(this).closest('.product-data').find(`.quan`).val(value);
//             }
//     });
// });
// $(document).ready(function(e){
//     $('.decrement-btn').click(function(e){
//         e.preventDefult();
//         var quant = $(this).closest('.product-data').find(`.quan`).val();
//         var value = parseInt(quant, 10);
//         value = isNaN(value) ? 0 : value;
//         if(value >0)
//             {
//                 value--;
//                 $(this).closest('.product-data').find(`.quan`).val(value);
//             }
//     });
// });