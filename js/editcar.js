$(function(){
    $('body').on('click', '.edit', function (e) {
      var car_id = $(this).data('carid');
      $(`.edit.${car_id}`).text('Save').attr('class', `btn btn-ybac save ${car_id}`);
      $(`.detail-content.${car_id}`).prop('disabled', false);
      setTimeout(function(){
        $(`.save.${car_id}`).attr('type', 'submit');
        }, 10)
    });
  
    $('body').on('click', '.save', function (e) {
        $(`.save.${car_id}`).text('Edit').attr('class', `btn btn-ybac edit ${car_id}`);
  })
})