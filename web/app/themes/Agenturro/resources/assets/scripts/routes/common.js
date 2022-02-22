export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    $('ul.intro_tabs').on('click', 'li:not(.active)', function() {
      $(this)
        .addClass('active').siblings().removeClass('active');
        $('.posts').find('.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
    });
  },
};
