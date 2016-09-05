
//this will trigger just after the page is loaded..anything inside this will execute just after the page is loaded
$(document).ready(function(){

//to work the slick slider

$(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });

      $('.single-item').slick({

        dots: true,
        infinite: true
      });

//this bellow code will set the intervel time of main slider to 10000 milisecons
  $('.carousel').carousel({
    interval: 10000
  });


//to ridirect to the catogery page
$(".P_routeToCat").click(function(){
  id_of_overlay = $(this).attr("id");
window.location.href = Base_url+"index.php/Catogery/show_catogery/"+id_of_overlay;

});

});
