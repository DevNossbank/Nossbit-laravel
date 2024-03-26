$(document).ready(function() {
    $('.custom-select').change(function() {
      var imgSrc = $('option:selected', this).attr('data-image');
      $(this).next('.selected-image').attr('src', imgSrc);
    });
  });