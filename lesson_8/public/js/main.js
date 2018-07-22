$(function () {
  $('#orders').on('click', 'button', function () {
    let $btn = $(this);
    let id = $btn.attr('data-id');
    $.ajax({
      type: 'POST',
      url: '/order/remove',
      data: {id: id},
      dataType: 'json',
      success: (data) => {
        if (data.result && data.result === 1) {
          $btn.parents('.order-lk, .order-adm').remove();
        }
      },
    })
  });

  $('#status_order').on('change', function () {
    let $select = $(this);
    console.log($select.val());
    let id_order = $select.attr('data-id');
    let id_status = $select.val();
    $.ajax({
      type: 'POST',
      url: 'orders/update',
      data: {
        id_order: id_order,
        id_status: id_status
      },
      dataType: 'json',
      success: (data) => {
        console.log(data);
      }
    })
  })
});