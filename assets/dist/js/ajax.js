jQuery(document).ready(function($) {
  $('#filter-archive').change(function(event) {
    var filter = $(this).val();
    var cat_id = $('#cat').val();
    $.ajax({
      url:the_ajax_script.ajaxurl,
      method:"post",
      dataType: "html",
      data:{action : 'get_ajax_posts', filter, cat_id},
      success:function(data, status){
        $('#show_filter').html(data);
      }
    });
  });
});