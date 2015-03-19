(function() {
	var width = 0,
		nav   = document.querySelector('#nav-toggle'),
        main  = document.querySelector('#main'),
		elem  = document.querySelector('#secondary'),
        head  = document.querySelector('.site-header');

    var originalHeight;

    function toHome() {
        location.href = '/';
    }

    function getOriginalHeight() {
        originalHeight = elem.offsetHeight;
    }

	function getClientWidth() {
		width = document.documentElement ? document.documentElement.clientWidth : window.innerWidth;
		
		if (width < 780) {
			addClass(elem, 'mobile-menu');
			nav.style.display = 'block';

            elem.style.minHeight = originalHeight + 'px';

            head.removeEventListener('click', toHome);
		} else {
			removeClass(elem, 'mobile-menu');
			nav.style.display = 'none';

            head.addEventListener('click', toHome, false);

            /**
             *
             * @type {string}
             *
             * blocks the same height
             *
             * right column plus breadcrumbs height
             */
            elem.style.minHeight = (main.offsetHeight + 52) + 'px';
		}

        // footer
        var headerHeight    = getHeight(document.querySelector('.header-area')),
            mainHeight      = getHeight(document.querySelector('.main-content-area')),
            footerHeight    = getHeight(document.querySelector('.footer-area')),
            totalHeight     = headerHeight + mainHeight + footerHeight,
            documentHeight  = document.documentElement ? document.documentElement.clientHeight : window.innerHeight;

        if (totalHeight < documentHeight) {
            document.querySelector('.main-content-area').style.minHeight =  (documentHeight - headerHeight - footerHeight) + 'px';
        }
	}

    /**
     * Add class
     *
     * @param elem
     * @param className
     */
	function addClass(elem, className) {
		if (elem.classList) {
			elem.classList.add(className);
		} else {
			elem.className += ' ' + className; 
		}		
	}

    /**
     * Remove class
     *
     * @param elem
     * @param className
     */
	function removeClass(elem, className) {
		if (elem.classList) {
		    elem.classList.remove(className);
		} else {
		    elem.className = elem.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
		}
	}

    /**
     * Gel element height
     *
     * @param elem
     * @returns {number}
     */
    function getHeight(elem) {
        return elem.offsetHeight;
    }

    var depthLevel = [];
    /**
     * Recursive tree
     *
     * @param node
     * @param count
     */
    function setAccordionClass(node, count) {
        // check element
        if (node && 1 == node.nodeType) {
            // get first child
            var child = node.firstChild;

            // while the nodes are not over
            while (child) {
                // if the node is a member
                if (1 == child.nodeType) {
                    // add style
                    if (child.tagName == 'UL') {
                        addClass(child, 'depth-' + count);
                        depthLevel.push(count);

                        count++;
                    }

                    // recursively enumerate the child nodes
                    setAccordionClass(child, count);
                }

                // go to the next node
                child = child.nextSibling;
            }
        }
    }

    // array_unique analog
    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    /**
     * Set style for accordion elements
     */
    function setAccordionStyle() {
        var baseColor     = [173, 128, 71], //rgb
            baseFontSize  = 18; //px

        var uniqueClassIndex = depthLevel.filter(onlyUnique);

        for (var i = 0, length = uniqueClassIndex.length; i < length; i++) {
            var elementsOnTheSameLevel = document.querySelectorAll('ul.depth-' + uniqueClassIndex[i]);

            for (var j = 0, innerLength = elementsOnTheSameLevel.length; j < innerLength; j++) {
                elementsOnTheSameLevel[j].style.fontSize = baseFontSize + 'px';
                elementsOnTheSameLevel[j].style.backgroundColor = 'rgb(' + baseColor.join(',') + ')';

                // move nested elements
                if (j) {
                    var links = elementsOnTheSameLevel[j].querySelectorAll('li a');

                    for (var k = 0, linksLength = links.length; k < linksLength; k++) {
                        links[k].style.paddingLeft = (j * 20) + 'px';
                        links[k].style.backgroundPosition = (j * 10) + 'px center';
                    }
                }
            }

            baseFontSize -= 2;
            baseColor = baseColor.map(function(num) {
                return num + 15;
            });
        }
    }

    function addEventListenerToAccordion() {
        var accordion = document.querySelector('.dcjq-accordion');
        setAccordionClass(accordion, 1);
        accordion.querySelector('li a').setAttribute('href', '/');
    }

    window.addEventListener('load', getOriginalHeight, false);
	window.addEventListener('load', getClientWidth, false);
	window.addEventListener('load', addEventListenerToAccordion, false);
    window.addEventListener('load', setAccordionStyle, false);
	window.addEventListener('resize', getClientWidth, false);

	nav.addEventListener('click', function() {
	  this.classList.toggle('active');
	  elem.classList.toggle('mobile-menu-active');	  
	}, false);
})();