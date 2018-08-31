window.twitterShare = function (event) {
  event.preventDefault();

  var title = encodeURIComponent(document.getElementsByTagName("title")[0].innerHTML);
  var url = encodeURIComponent(window.location.href);

  window.open('http://twitter.com/share?text=' + title + '&url=' + url, 'sharer', 'toolbar=1,status=1,menubar=1');
};

window.facebookShare = function (event) {
  event.preventDefault();

  var title = encodeURIComponent(document.getElementsByTagName("title")[0].innerHTML);
  var url = encodeURIComponent(window.location.href);

  window.open('http://www.facebook.com/sharer.php?u=' + url, 'sharer', 'toolbar=1,status=1');
};

window.emailShare = function (event) {
  event.preventDefault();

  var title = encodeURIComponent(document.getElementsByTagName("title")[0].innerHTML);
  var url = encodeURIComponent(window.location.href);

  window.open('mailto:?&subject=' + title + '&body=' + title + ' ' + url);
};

window.googlePlusShare = function (event) {
  event.preventDefault();

  var title = encodeURIComponent(document.getElementsByTagName("title")[0].innerHTML);
  var url = encodeURIComponent(window.location.href);

  window.open('https://plus.google.com/share?url=' + url, 'sharer', 'toolbar=1,status=1');
};

window.pinterestShare = function (event) {
  event.preventDefault();

  var title = encodeURIComponent(document.getElementsByTagName("title")[0].innerHTML);
  var url = encodeURIComponent(window.location.href);
  var image = encodeURIComponent(document.getElementsByClassName("attachment-nicewp-featured-image")[0].src.replace('-1200x400', ''));

  window.open('https://www.pinterest.com/pin/create/button/?url=' + url + '&media=' + image + '&description=' + title);
};
