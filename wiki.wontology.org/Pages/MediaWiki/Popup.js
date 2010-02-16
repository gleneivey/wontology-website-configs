modifyExternalLinks = function(){
  if (!document.getElementsByTagName){
    return;
  }

  var anchors = document.getElementsByTagName("a");
  for (var i = 0; i < anchors.length; i++){
    var anchor = anchors[i];
    var ref = anchor.getAttribute("href")
    if (ref == null || ref == "#")
      continue;
    if (ref.search( /help\.php\?title=/ ) != -1)
      continue;

    if ((anchor.getAttribute("rel")   != null &&                      /* if (external link) */
         (anchor.getAttribute("rel").indexOf("external") >= 0 ||
          anchor.getAttribute("rel").indexOf("nofollow") >= 0   )) ||
        (anchor.getAttribute("class") != null &&
         anchor.getAttribute("class").indexOf("external") >= 0   )    ){
      anchor.target = "_blank";
    }
  }
}

if (window.addEventListener){
  window.addEventListener("load", modifyExternalLinks, false);
}
else if (window.attachEvent){
  window.attachEvent("onload", modifyExternalLinks);
}
