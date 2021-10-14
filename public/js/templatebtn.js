// $(function OnButtonClick(){
//   alert("あいうえお");
//   var tr_form = '' +
//   '<tr>' +
//     '<td> <input type="time" name="template[time]_[]"/></td>' +
//     '<td><input type="subtitle" name="template[subtitle]_[]"/></td>' +
//     '<td> <textarea name="template[text]_[]" placeholder="〇〇に行った"></textarea></td>' +
//   '</tr>';
 
//   $(tr_form).appendTo("#template");
// })

$(function () {
    var num = 0;
    $('#test_jquery').on('click', function() {
        num += 1;
        var tr_form = '' +
      '<tr>' +
         '<td> <input type="time" name="template['+ num +'][time]"/></td>' +
         '<td><input type="subtitle" name="template['+ num +'][subtitle]"/></td>' +
         '<td> <textarea name="template['+ num +'][text]" placeholder="〇〇に行った"></textarea></td>' +
      '</tr>';
 
        $(tr_form).appendTo("#template");
    })
})

// document.getElementById("form-button").onclick = function() {
//     alert("あいうえお");
//   　var tr_form = '' +
//   　'<tr>' +
//         '<td> <input type="time" name="template[time]_[]"/></td>' +
//     　　'<td><input type="subtitle" name="template[subtitle]_[]"/></td>' +
//     '<td> <textarea name="template[text]_[]" placeholder="〇〇に行った"></textarea></td>' +
//   　'</tr>';
 
//   $(tr_form).appendTo($('table > tbody'));
// };