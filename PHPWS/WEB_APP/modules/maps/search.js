 $(document).ready(function(){
    $("#map_button").on("click",function()
            {   var t = $("#map_search").val();
                t = t.split(" ");
                t = t.join("+");
                var l1 = "https://www.google.com/maps/embed/v1/search?key=AIzaSyD8-Z84av-CikoA0HOzbV374SYJJXsdT5o&zoom=15&q=";
                var l2 = "+in+'Panjab'+'University'";
                var link = [l1,t,l2];
                link = link.join("");
                var iframe = $("#frame");
                iframe.attr('src',link);
            });
 });





