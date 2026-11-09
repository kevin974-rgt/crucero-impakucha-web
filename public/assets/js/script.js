
// CRUCERO IMBAKUCHA - SCRIPT PRINCIPAL




// EVENTOS AL CARGAR PAGINA


document.addEventListener("DOMContentLoaded", () => {




    // ANIMACIONES AL HACER SCROLL
  


    const elementos = document.querySelectorAll(
        '.info-card, .servicio-card, .galeria-item, .contacto-form, .nosotros-content'
    );



    const observer = new IntersectionObserver((entries)=>{


        entries.forEach(entry=>{


            if(entry.isIntersecting){


                entry.target.style.opacity="1";

                entry.target.style.transform="translateY(0)";


            }


        });



    },{
        threshold:0.15
    });





    elementos.forEach(el=>{


        el.style.opacity="0";

        el.style.transform="translateY(50px)";

        el.style.transition="all 0.8s ease";


        observer.observe(el);


    });







  
    // MENSAJE FORMULARIO
  


    const formulario=document.querySelector("form");



    if(formulario){


        formulario.addEventListener("submit",()=>{


            setTimeout(()=>{


                alert("🚢 Gracias por contactarnos. Tu mensaje ha sido enviado correctamente.");


            },200);



        });


    }








  
    // CARRUSEL GALERIA CON MOUSE
   


    const carousel=document.querySelector(".carousel-container");



    if(carousel){



        let presionando=false;

        let inicioX=0;

        let scrollInicial=0;

        let movio=false;






        carousel.addEventListener("mousedown",(e)=>{


            presionando=true;


            movio=false;



            carousel.classList.add("dragging");



            inicioX=e.pageX;



            scrollInicial=carousel.scrollLeft;



        });








        carousel.addEventListener("mousemove",(e)=>{


            if(!presionando) return;



            e.preventDefault();



            const movimiento=e.pageX-inicioX;



            if(Math.abs(movimiento)>5){


                movio=true;


            }





            carousel.scrollLeft =
            scrollInicial-movimiento;



        });









        carousel.addEventListener("mouseup",()=>{


            presionando=false;



            carousel.classList.remove("dragging");



        });








        carousel.addEventListener("mouseleave",()=>{


            presionando=false;



            carousel.classList.remove("dragging");



        });









        // Evitar abrir imagen al arrastrar


        const enlaces=carousel.querySelectorAll("a");



        enlaces.forEach(enlace=>{


            enlace.addEventListener("click",(e)=>{


                if(movio){


                    e.preventDefault();



                }



            });



        });




    }








});



// BOTON VOLVER ARRIBA


const btnTop=document.createElement("button");


btnTop.innerHTML="↑";


btnTop.id="btnTop";



btnTop.style.position="fixed";

btnTop.style.bottom="20px";

btnTop.style.right="20px";

btnTop.style.width="50px";

btnTop.style.height="50px";

btnTop.style.borderRadius="50%";

btnTop.style.border="none";

btnTop.style.backgroundColor="#1a6b8a";

btnTop.style.color="white";

btnTop.style.fontSize="22px";

btnTop.style.cursor="pointer";

btnTop.style.display="none";

btnTop.style.zIndex="9999";



document.body.appendChild(btnTop);







window.addEventListener("scroll",()=>{


    if(window.scrollY>300){


        btnTop.style.display="block";


    }else{


        btnTop.style.display="none";


    }



});








btnTop.addEventListener("click",()=>{


    window.scrollTo({


        top:0,


        behavior:"smooth"



    });



});




// PARALLAX HERO


window.addEventListener("scroll",()=>{


    const hero=document.querySelector(".hero");



    if(hero){


        hero.style.backgroundPositionY =
        window.pageYOffset*0.4+"px";


    }


});





// CONTADORES AUTOMATICOS



const contadores=document.querySelectorAll(".contador");



contadores.forEach(contador=>{


    let numeroFinal=parseInt(contador.dataset.numero);


    let actual=0;



    const intervalo=setInterval(()=>{


        actual += Math.ceil(numeroFinal/100);



        if(actual>=numeroFinal){


            actual=numeroFinal;


            clearInterval(intervalo);


        }





        contador.textContent=actual;



    },20);



});