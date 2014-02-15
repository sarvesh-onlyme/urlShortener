var domain = "localhost/php/urlShortener/url.php?shortUrl=";

$(document).ready(function() {
  $('.getShortenUrl').click(function() {
    data = {
      'url': $('.url').val(),
    };
    $.ajax({
      type: 'GET',
      url: './url.php',
      data: data,
      success: function(r) {
        $('.urlLink').text(domain + r);
        $('.showUrl').removeClass('hide');
      },
      error: function(err) {
        console.log(err);
      }
    });
    return null;
  });
  return null;
});