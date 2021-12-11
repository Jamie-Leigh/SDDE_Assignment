$(function(){
  $('body').on('click', '.add', function (e) {
    var car_id = $(this).data('carid');
    $.ajax({
      method: "POST",
      url: "./ajax/togglebasket.php",
      dataType: 'json',
      data: { car_id: car_id }
    })
    .done(function(rtnData) {
      console.log(rtnData);
      $(`.${car_id}`).text('Remove from Basket').attr('class', `btn btn-ybac addToBasket remove ${car_id}`);
    })
  });

  $('body').on('click', '.remove', function (e) {
    var car_id = $(this).data('carid');
    var page = $(this).data('page');
    $.ajax({
      method: "POST",
      url: "./ajax/togglebasket.php",
      dataType: 'json',
      data: { car_id: car_id }
    })
    .done(function(rtnData) {
      console.log(rtnData);
      if (page == "basket") {
        window.location.reload();
      } else {
        $(`.${car_id}`).text('Add to Basket').attr('class', `btn btn-ybac addToBasket add ${car_id}`);
      }
    })
  });
  
  $('body').on('click', '.checkout', function (e) {
    var user_id = $(this).data('userid');
    $.ajax({
      method: "POST",
      url: "./ajax/clearbasket.php",
      dataType: 'json',
      data: { user_id: user_id }
    })
    .done(function(rtnData) {
      console.log(rtnData);
    })
  });

})