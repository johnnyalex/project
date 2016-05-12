$(function(){
  // alert($);
  $('.sub-menu').find('a').click(function(){
    $(this).parent('li').addClass('active').siblings().removeClass('active');

  })

})