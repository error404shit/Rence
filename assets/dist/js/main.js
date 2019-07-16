function changeMarquee(dir) {
//sets the direction atribute for the marquee tag
  document.getElementById('myMarquee').setAttribute('direction', dir);
//changes the direction after 2 seconds (2000 = 2 seconds)
  if (dir == 'left') {
    setTimeout("document.getElementById('myMarquee').setAttribute('direction', 'left')", 0);
  }
  else {
    setTimeout("document.getElementById('myMarquee').setAttribute('direction', 'right')", 0);
  }
}

jQuery(document).ready(function($) {
  // Toggle scroll button
  $(window).scroll(function() {
    var height = $(this).height();
    if ( $(this).scrollTop() > 200 ) {
      $("#btn-scroll-top").attr('style', 'display: block !important');
    } else{
      $("#btn-scroll-top").attr('style', 'display: none !important');
    }
    
  });
  $("#btn-scroll-top").click(function(){
    $('body, html').animate({
      scrollTop: 0
    }, 500);
  });

  // Toggle searchbar on navigation
  $(".search_icon").click(function() {
    $(this).toggleClass('active-search');
    $(".wrap").slideToggle();
  });

  $(document).keydown(function(e) {
    if (e.keyCode == 27) {
      //$(modal_or_menu_element).closeElement();
      $(".wrap").hide();
    }
  });

  // Sticky Navigation
  var stickyNavTop = $('.main-nav-container').offset().top;
  var stickyNav = function(){
    var scrollTop = $(window).scrollTop();
    if (scrollTop > stickyNavTop) {
      $('.main-nav-container').addClass('sticky-navigation');
    } else{
      $('.main-nav-container').removeClass('sticky-navigation');
    }
  };
  stickyNav();
  $(window).scroll(function(){
    stickyNav();
  });
  // Add class on forms from footer
  $('.division, .footer_widget_one, .footer_widget_two, .footer_widget_three, .footer_widget_four, .header-widget-container').each(function(index, value) {
    $(this).find('form').addClass('form-group');
    $(this).find('select').addClass('form-control');
  });
  // Add row class to archive widget
  $('.custom-archive-widget').each(function(index, value) {
    $(this).wrapInner('<div class="row p-3"></div>');
    $(this).find('h4').wrap('<div class="col-12 col-md-6"></div>');
    $(this).find('ul').wrap('<div class="col-12 col-md-6"></div>');
  });
  // Add class in widget text
  $('.widget_text').each(function(index, value){
    $(this).find('img').addClass('img-fluid');
  });

  // Search toggle
  $('.nav-primary .search-toggle').click(function(e){
    e.preventDefault();
    $(this).parent().toggleClass('active').find('input[type="search"]').focus();
  });
  $('.search-submit').click(function(e){
    if( $(this).parent().find('.search-field').val() == '' ) {
      e.preventDefault();
      $(this).parent().parent().removeClass('active');
    }

  });
  // Header Banner
  $('#sidebar-header').each(function(index, value) {
    var banner = $(this).find('.chw-widget').length;
    $(this).find('img').addClass('banner');
    if ( banner == 1 ) {
      $(this).wrapInner('<div class="row m-auto"></div>');
      $(this).find(".chw-widget").wrap('<div class="col-12 p-0"></div>');
    } else if ( banner == 2 ) {
        $(this).wrapInner('<div class="row"></div>');
        $(this).find(".chw-widget").wrap('<div class="col-12 col-lg-6 pt-3 pb-3"></div>');
    } else if ( banner > 3 ) {
        $(this).wrapInner('<div class="row"></div>');
        $(this).find(".chw-widget").wrap('<div class="col-12 col-lg-6 pt-3 pb-3"></div>');
        // $(this).find(".chw-widget").wrap('<div class="col-12 col-lg-12 p-1"></div>');
    }
  });
  // Wrap tag links in single.php
  // $('.single-content .content-container').each(function(index, el) {
  //   $(this).find('a').wrap('<span class="single-tags"></span>');
  // });
  // Main navigation search form toggle
  $(".search_icon").click(function() {
    $(".spicewpsearchform").slideToggle();
  });
  // Main navigation search form toggle
  $(document).keydown(function(e) {
    if (e.keyCode == 27) {
      //$(modal_or_menu_element).closeElement();
      $(".spicewpsearchform").hide();
    }
  });
  // Add class in navigation's custom link menu
  $('.navbar').each(function(index, value) {
    $(this).find('a').addClass('nav-link dropdown-item');
  });
  // Navigation Icon Toggle
  $('.navbar').on("click", "button", function(event) {
    if ( $(this).attr("aria-expanded") === "true" ) {
      $(this).find('i').removeClass('fa-times');
      $(this).find('i').addClass('fa-reorder');
    }
    else {
      $(this).find('i').removeClass('fa-reorder');
      $(this).find('i').addClass('fa-times');
    }
  });
  // Calendar Widget
  $('.widget_calendar').each(function(index, el) {
    var hasAnchor = $(this).find('td');
    hasAnchor.has('a').addClass('hasAnchor');
  });
  // Archive Widget DropDown
  $('.widget_archive').each(function(index, el) {
    var hasDropDown = $(this).find('select');
    hasDropDown.wrap('<div class="pb-3 pl-3 pr-3"></div>');
  });
  // Header Widget Margin Insertion
  $('.header-widget-container').has('aside').addClass('mt-4 mb-4');
  // Header Widget Odd Even Styling
  $('.header-widget-container').each(function(index, el) {
    var odd = $(this).find('.col-12:odd');
    var even = $(this).find('.col-l2:even');
    $(odd).addClass('odd');
  });

  $('.comment-form').each(function(index, el) {
    $(this).find('input:checkbox').addClass('mr-1');
  });

});