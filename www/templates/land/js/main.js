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
            "touch": false,
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
            "touch": false,
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
            "touch": false,
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
            "touch": false,
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
            "touch": false,
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
            "touch": false,
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
    
    if (document.getElementById('review-slider') !== null) {
        var reviewSliderElement = document.getElementById('review-slider');
        
        let reviewSlider = tns({
            "container": "#review-slider",
            "autoWidth": false,
            "items": 3,
            "slideBy": 1,
            "mouseDrag": false,
            "swipeAngle": false,
            "nav": false,
            "touch": false,
            "speed": 400,
            "prevButton": document.getElementById('review-prev-btn'),
            "nextButton": document.getElementById('review-next-btn'),
            responsive: {
                320: {
                  "items": 1,
                  "autoWidth": true,
                },
                769: {
                  "items": 3,
                  "autoWidth": false,
                }
            }
        });
        
        changeReviewSlide();
        reviewSlider.events.on('indexChanged', () => {changeReviewSlide();});
        
        function changeReviewSlide()
        {
            let list = reviewSliderElement.querySelectorAll('.tns-slide-active');
            
            list.forEach((e, i) => {
                e.classList.remove('center');
                toggleYoutubeVideo(e);
                
                if (i === 1) {
                    e.classList.add('center');
                }
            });
        }
    }
    
    if (document.getElementById('works-slider') !== null) { 
        var worksSliderElement = document.getElementById('works-slider');
        
        let worksSlider = tns({
            "container": "#works-slider",
            "autoWidth": true,
            "gutter": 30,
            "items": 1,
            "center": true,
            "slideBy": 1,
            "mouseDrag": false,
            "swipeAngle": false,
            "nav": true,
            "touch": false,
            "navContainer": "#works-slider-nav",
            "speed": 400,
            "prevButton": document.getElementById('works-prev-btn'),
            "nextButton": document.getElementById('works-next-btn'),
        });
        
//        changeWorksSlide();
        worksSlider.events.on('indexChanged', () => {changeWorksSlide();});
//        worksSlider.events.on('transitionEnd', () => {changeWorksSlide();});
//        
        function changeWorksSlide()
        {
            let list = worksSliderElement.querySelectorAll('.tns-slide-active');
            
            list.forEach((e, i) => {
                toggleYoutubeVideo(e);
            });
        }
    }
    
    $('#callback-form').submit(function(){
        $.ajax({
            url: '/ajax/subscription/',
            method: "POST",
            data: $(this).serializeControls(),
            success: function (res) {
                if (res.result !== undefined) {
                    $('#callback-form').find('input').each(function (i, e) {
                       $(e).val('');
                    });
                    $('#callback-form--modal').modal('hide');
                    $('#callback-form-success--modal').modal('show');
                    ym(51851432,'reachGoal','zayavka');
                } else {
                    $('#callback-form--modal').find('.alert').text(res.error).show();
                }
            },
            error: function (a, b) {
                console.log('ERROR');
                console.log(a);
                console.log(b);
            }
        });
        
        return false;
    });
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

function toggleYoutubeVideo(container) {
    var videos = container.querySelectorAll('iframe, video');
    Array.prototype.forEach.call(videos, function (video) {
        if (video.tagName.toLowerCase() === 'video') {
            video.pause();
        } else {
            var src = video.src;
            video.src = src;
        }
    });
}

$.fn.serializeControls = function () {
    var data = {};

    function buildInputObject(arr, val) {
        if (arr.length < 1)
            return val;
        var objkey = arr[0];
        if (objkey.slice(-1) == "]") {
            objkey = objkey.slice(0, -1);
        }
        var result = {};
        if (arr.length == 1) {
            result[objkey] = val;
        } else {
            arr.shift();
            var nestedVal = buildInputObject(arr, val);
            result[objkey] = nestedVal;
        }
        return result;
    }

    $.each(this.serializeArray(), function () {
        var val = this.value;
        var c = this.name.split("[");
        var a = buildInputObject(c, val);
        $.extend(true, data, a);
    });

    return data;
}