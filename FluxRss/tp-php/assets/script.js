
  


$( "#numbersetting, #colorsetting" ).hide();

$( "#allsetting" ).click(function() {
  $( "#numbersetting, #colorsetting" ).toggle( 'slow', function() {
  });
});

$( "#redblue" ).click(function() {
    $("body, #readArticles, #loupe").stop().animate({ backgroundColor: "#D2691E", color: "#FF8C00"}, 800);
    $("#game, #applis, #secu, #acceuilbg").stop().animate({ backgroundColor: "#DEB887"}, 200);
    $("#security, #jeux, #appli, #acceuil").stop().animate({color: "#D2691E"}, 400);
    
  });

  $( "#greenyellow" ).click(function() {
    $("body, #readArticles, #loupe").stop().animate({ backgroundColor: "#228B22", color: "#DAA520"}, 800);
    $("#game, #applis, #secu, #acceuilbg").stop().animate({ backgroundColor: "#DAA520"}, 200);
    $("#security, #jeux, #appli, #acceuil").stop().animate({color: "#228B22"}, 400);
  });

  $( "#pinkblack" ).click(function() {
    $("body, #readArticles, #loupe").stop().animate({ backgroundColor: "rgb(63, 63, 63)", color: "#FF00FF"}, 800);
    $("#game, #applis, #secu, #acceuilbg").stop().animate({ backgroundColor: "rgb(253, 158, 174)"}, 200);
    $("#security, #jeux, #appli, #acceuil").stop().animate({color: "rgb(63, 63, 63)"}, 400);
  });

  $( "#remove" ).click(function() {
    $("body, #readArticles, #loupe").stop().animate({ backgroundColor: "#ffff", color: "#000000"}, 800);
    $("#game, #applis, #secu, #acceuilbg").stop().animate({ backgroundColor: "#ffff"}, 400);
    $("#security, #jeux, #appli, #acceuil").stop().animate({color: "#17A2B8"}, 400);
  });
  
  
