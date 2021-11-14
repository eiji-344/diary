$(function () {
    var num = 0;
    $('#add_template').on('click', function() {
        num += 1;
        var tr_form = '' +
      '<tr>' +
         '<td><input type="time" name="template['+ num +'][time]"/></td>' +
         '<td><input type="title" name="template['+ num +'][subtitle]"/></td>' +
         '<td><textarea name="template['+ num +'][text]" placeholder="〇〇に行った" cols=30 rows=3></textarea></td>' +
         '<td><input type="file" name="template['+ num +'][image]"/></td>' +
         '<td><input type="title" name="template['+ num +'][address]"/></td>' +
      '</tr>';
 
        $(tr_form).appendTo("#template");
    })
})