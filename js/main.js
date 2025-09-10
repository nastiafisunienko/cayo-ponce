

$(window).on("load", function(){
    $('#cover-wrapper').fadeIn("slow");
    $("#body").fadeOut("slow");
})

$(document) .ready(function(){


    if (window.innerWidth <= 600) {
        $("#header-block").css("position", "sticky").css("top", "0px").css("width", "100%").css("background-color", "white")
        .css("z-index", 300);
        
    } else {
        $("#header-block").css("position", "inherit");
      
    }

    //scroll flecha
    function scrollFlecha(elem, numMore) {


        $(document).on("scroll", function(){
            let scrollPos = $(document).scrollTop();

            if (scrollPos > numMore) {
                $(elem).css("width", "100px").css("transition", "1.2s");
    
            } else {
                $(elem).css("width", "0%");

            }
        })
    }

    scrollFlecha("#flecha", 200);

    

    //opacidad para las secciones

    function opacidad(param) {
        $(param).fadeIn("slow");
    }

    opacidad('#section-1');


    function opacidad2(param) {
        $(param).css("opacity", "1");
        $(param).css("transition", "2s");
    }

    opacidad2("#header-form");
    opacidad2("#p");


    //saltar header



    //scroll funcion 


    function scrollElem(elem, elem2, numMore, numLess, cssProp1, cssProp2, cssValue1, cssValue2, cssValue3, cssValue4, 
        numMinDef) {
            let isScrolled = false;

        $(document).on("scroll", function(){

            let scrollPos = $(document).scrollTop();

            if (scrollPos > numMore &&!isScrolled) {
                $(elem).css(cssProp1, cssValue1).css(cssProp2, numMinDef);
                
                $(elem2).css(cssProp1, cssValue2).css(cssProp2, numMinDef);
                isScrolled = true;
            }
            if (scrollPos < numLess && isScrolled) {
                $(elem).css(cssProp1, cssValue3).css(cssProp2, numMinDef);
                $(elem2).css(cssProp1, cssValue4).css(cssProp2, numMinDef);
                isScrolled = false;
            }
        })
    }

    //scroll wrappers in the home page
    scrollElem("#wrapper", "#wrapper-2", 420, 100, "flex-basis", "transition", "0%", "100%", "68%", "32%", "1s");

    //scroll on header to change color of the header Cayo Ponce
    scrollElem("#section-header h1 a", false, 800, 700, "color", "transition", "#d30606", false, "black", false, "1s");



    //scroll effect on wrapper gallery page

    scrollElem("#wrapper-gallery", "#wrapper-gallery-2", 200, 100, "flex-basis", "transition", "20%", "80%", "30%", "70%", "1s");

    //button pressed in menu

    let elem = document.getElementById("hide");

    let hiddens = document.querySelectorAll(".hidden");
    let br = document.createElement("br");
    elem.addEventListener("click", function() {

        hiddens.forEach(element => {

            element.append(br);

            element.classList.toggle("hidden");
            
        });
    })

 
})