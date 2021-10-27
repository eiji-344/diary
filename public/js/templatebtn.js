$(function () {
    var num = 0;
    $('#add_template').on('click', function() {
        num += 1;
        var tr_form = '' +
      '<tr>' +
         '<td> <input type="time" name="template['+ num +'][time]"/></td>' +
         '<td><input type="subtitle" name="template['+ num +'][subtitle]"/></td>' +
         '<td> <textarea name="template['+ num +'][text]" placeholder="〇〇に行った"></textarea></td>' +
         '<td> <input type="file" name="template['+ num +'][image]"/></td>' +
      '</tr>';
 
        $(tr_form).appendTo("#template");
    })
})