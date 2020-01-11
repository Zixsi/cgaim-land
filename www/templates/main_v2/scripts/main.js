document.addEventListener("DOMContentLoaded", function(event) { 
	
	if(document.getElementById('course-slider') !== null)
	{
		tns({
			"container": "#course-slider",
			"items": 3,
			"slideBy": "page",
			"mouseDrag": false,
			"swipeAngle": false,
			"speed": 400,
			"responsive": {
				620: {
					"disable": false
				},
				320: {
					"disable": true
				}
			}
		});
	}

	if(document.getElementById('workshop-slider') !== null)
	{
		tns({
			"container": "#workshop-slider",
			"items": 3,
			"slideBy": "page",
			"mouseDrag": false,
			"swipeAngle": false,
			"speed": 400,
			"responsive": {
				620: {
					"disable": false
				},
				320: {
					"disable": true
				}
			}
		});
	}

	if(document.getElementById('works-slider') !== null)
	{
		tns({
			"container": "#works-slider",
			"items": 3,
			"slideBy": "page",
			"mouseDrag": false,
			"swipeAngle": false,
			"speed": 400,
			"responsive": {
				620: {
					"disable": false
				},
				320: {
					"disable": true
				}
			}
		});
	}

	if(document.getElementById('review-slider') !== null)
	{
		tns({
			"container": "#review-slider",
			"items": 1,
			"slideBy": "page",
			"mouseDrag": false,
			"swipeAngle": false,
			"speed": 400
		});
	}

	handleHeadMainMenu();
	handleItemPrice();
});

function handleHeadMainMenu()
{
	var burgerMenuBtn, headMainMenu;
	burgerMenuBtn = document.getElementById('burger-menu-btn');
	if(burgerMenuBtn == null || burgerMenuBtn == 'undefined')
		return;

	headMainMenu = document.getElementById(burgerMenuBtn.dataset.target);
	if(headMainMenu == null || headMainMenu == 'undefined')
		return;

	burgerMenuBtn.addEventListener("click", function(){
		headMainMenu.classList.toggle('active');
	});


	checkHeaderNavpanel();
	document.addEventListener("scroll", function(){
		checkHeaderNavpanel();
	});

}

function checkHeaderNavpanel()
{
	var headerNavpanel = document.getElementById("header-navpanel");

	if(document.body.getBoundingClientRect().top < -100)
		headerNavpanel.classList.add('fixed');
	else
		headerNavpanel.classList.remove('fixed');
}

function handleItemPrice()
{
	if(document.getElementById('item-price-block') !== null)
	{
		let buttonsArray = document.querySelectorAll(".item .type .btn");

		buttonsArray.forEach(function(elem) {
			elem.addEventListener("click", function(e) {
				let item = document.getElementById(e.target.dataset.target);
				if(item)
				{
					item.parentElement.querySelector('.price.active').classList.remove("active");
					item.classList.add("active");
				}

				elem.parentElement.querySelector('.btn.active').classList.remove("active");
				elem.classList.add("active");
			});
		});
	}
}