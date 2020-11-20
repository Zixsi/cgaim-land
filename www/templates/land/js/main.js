document.addEventListener("DOMContentLoaded", function (event) {
    handleSliders();
    handleAccordion();
});

function handleSliders() {
    if (document.getElementById('bonus-slider') !== null) {
        tns({
            "container": "#bonus-slider",
            "autoWidth": true,
            "items": 1,
            "slideBy": "page",
            "mouseDrag": false,
            "swipeAngle": false,
            "nav": true,
            "navContainer": "#bonus-slider-nav",
            "speed": 400,
            "prevButton": document.getElementById('bonus-prev-btn'),
            "nextButton": document.getElementById('bonus-next-btn'),
        });
    }

    if (document.getElementById('lectures-slider') !== null) {
        tns({
            "container": "#lectures-slider",
            "autoWidth": true,
            "items": 1,
            "slideBy": "page",
            "mouseDrag": false,
            "swipeAngle": false,
            "nav": true,
            "navContainer": "#lectures-slider-nav",
            "controls": true,
            "speed": 400,
            "prevButton": document.getElementById('lectures-prev-btn'),
            "nextButton": document.getElementById('lectures-next-btn'),
        });
    }
    
    if (document.getElementById('package-slider') !== null) {
        tns({
            "container": "#package-slider",
            "autoWidth": false,
            "items": 1,
            "slideBy": "page",
            "mouseDrag": false,
            "swipeAngle": false,
            "nav": true,
            "navContainer": "#packages-slider-nav",
            "controls": true,
            "prevButton": document.getElementById('packages-prev-btn'),
            "nextButton": document.getElementById('packages-next-btn'),
            "speed": 400,
            responsive: {
                320: {
                  disable: false
                },
                769: {
                  disable: true
                }
            }
        }); 
    }
    
    if (document.getElementById('installment-plan-slider') !== null) {
        tns({
            "container": "#installment-plan-slider",
            "autoWidth": false,
            "items": 1,
            "slideBy": "page",
            "mouseDrag": false,
            "swipeAngle": false,
            "nav": true,
            "navContainer": "#installment-slider-nav",
            "controls": true,
            "prevButton": document.getElementById('installment-prev-btn'),
            "nextButton": document.getElementById('installment-next-btn'),
            "speed": 400,
            responsive: {
                320: {
                  disable: false
                },
                769: {
                  disable: true
                }
            }
        }); 
    }

    if (document.getElementById('courses-slider') !== null) {
        tns({
            "container": "#courses-slider",
            "autoWidth": false,
            "items": 1,
            "slideBy": "page",
            "mouseDrag": false,
            "swipeAngle": false,
            "nav": true,
            "navContainer": "#courses-slider-nav",
            "controls": true,
            "prevButton": document.getElementById('courses-prev-btn'),
            "nextButton": document.getElementById('courses-next-btn'),
            "speed": 400,
            responsive: {
                320: {
                  disable: false
                },
                769: {
                  disable: true
                }
            }
        }); 
    }
    
    if (document.getElementById('workshop-slider') !== null) {
        tns({
            "container": "#workshop-slider",
            "autoWidth": false,
            "items": 1,
            "slideBy": "page",
            "mouseDrag": false,
            "swipeAngle": false,
            "nav": true,
            "navContainer": "#workshop-slider-nav",
            "controls": true,
            "prevButton": document.getElementById('workshop-prev-btn'),
            "nextButton": document.getElementById('workshop-next-btn'),
            "speed": 400,
            responsive: {
                320: {
                  disable: false
                },
                769: {
                  disable: true
                }
            }
        }); 
    }
}

function handleAccordion() {
    var faqAccordion = document.getElementById('faq-accordion');
    
    if (faqAccordion !== null) {
        faqAccordion.addEventListener("click", function (event) {
            if (!event.target.classList.contains('trigger')) {
                return;
            }
            
            let parent = event.target.parentNode;
            
            if (!parent) {
                return;
            }

            event.preventDefault();

            if (parent.classList.contains('active')) {
              parent.classList.remove('active');
              return;
            }

            let items = faqAccordion.querySelectorAll('.item.active');
            
            for (let i = 0; i < items.length; i++) {
              items[i].classList.remove('active');
            }

            parent.classList.toggle('active');
        });
    }
}