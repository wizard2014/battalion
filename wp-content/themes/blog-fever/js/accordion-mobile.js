(function() {
	var width = 0,
		nav   = document.querySelector('#nav-toggle'),
        main  = document.querySelector('#main'),
		elem  = document.querySelector('#secondary');

    var originalHeight;

    function getOriginalHeight() {
        originalHeight = elem.offsetHeight;
    }

	function getClientWidth() {
		width = document.documentElement ? document.documentElement.clientWidth : window.innerWidth;
		
		if (width < 780) {
			addClass(elem, 'mobile-menu');
			nav.style.display = 'block';

            elem.style.height = originalHeight + 'px';
		} else {
			removeClass(elem, 'mobile-menu');
			nav.style.display = 'none';

            /**
             *
             * @type {string}
             *
             * blocks the same height
             *
             * right column plus breadcrumbs height
             */
            elem.style.height = (main.offsetHeight + 52) + 'px';
		}
	}
	
	function addClass(elem, className) {
		if (elem.classList) {
			elem.classList.add(className);
		} else {
			elem.className += ' ' + className; 
		}		
	}
	
	function removeClass(elem, className) {
		if (elem.classList) {
		  elem.classList.remove(className);
		} else {
		  elem.className = elem.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
		}
	}

    window.addEventListener('load', getOriginalHeight, false);
	window.addEventListener('load', getClientWidth, false);
	window.addEventListener('resize', getClientWidth, false);
	
	nav.addEventListener('click', function() {
	  this.classList.toggle('active');
	  elem.classList.toggle('mobile-menu-active');	  
	}, false);
})();