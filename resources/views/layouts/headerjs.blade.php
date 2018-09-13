<link rel="preload" href="{{ asset('/js/manifest.js') }}" as="script">
<link rel="preload" href="{{ asset('/js/vendor.js') }}" as="script">
<link rel="preload" href="{{ mix('/js/app.js') }}" as="script">
<script>
//laoding symbol sprite (SVG)
var ajax = new XMLHttpRequest();
ajax.open("GET", "/img/sprite/symbol_sprite.svg", true);
ajax.send();
ajax.onload = function(e) {
  var div = document.createElement("div");
  div.innerHTML = ajax.responseText;
  document.body.insertBefore(div, document.body.childNodes[0]);
}
// Load Fonts
{{--  var WebFontConfig = {
    google: { families: [ 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i'] }
};
(function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
})();  --}}

</script>