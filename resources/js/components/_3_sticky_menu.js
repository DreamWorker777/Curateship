(function(){
	var stickyMenu = document.getElementsByClassName('js-cs-sticky-menu');
	if(stickyMenu.length > 0) {
		var 
			stickyMenuBody = stickyMenu[0].getElementsByClassName('cs-sticky-menu__body')[0],
			stickyMenuList = stickyMenuBody.getElementsByTagName('ul')[0],
			stickyMenuListItems = stickyMenuList.getElementsByClassName('cs-sticky-menu__item');
			initStickyMenuEvents();

		function initStickyMenuEvents() {
			// open/close stickyMenu
			stickyMenu[0].getElementsByClassName('cs-sticky-menu__trigger')[0].addEventListener('click', function(event){
				event.preventDefault();
				toggleMenu();
			});

			stickyMenu[0].addEventListener('click', function(event) {
				if(event.target == stickyMenu[0]) { // close stickyMenu when clicking on bg layer
					stickyMenu[0].getElementsByClassName('cs-sticky-menu__trigger')[0].click();
				}
			});
		};

		function toggleMenu(bool) { // toggle stickyMenu visibility
			var stickyMenuIsOpen = ( typeof bool === 'undefined' ) ? Util.hasClass(stickyMenu[0], 'cs-sticky-menu--open') : bool;
		
			if( stickyMenuIsOpen ) {
				Util.removeClass(stickyMenu[0], 'cs-sticky-menu--open');
			} else {
				Util.addClass(stickyMenu[0], 'cs-sticky-menu--open');
			}
		};
	}
})();

(function() {
  var StickySubMenu = function(element) {
    this.element = element;
    this.wrapper = this.element.closest(".cs-sticky-menu__body");
    this.innerElement = this.element.getElementsByClassName('js-cs-sticky-submenu__inner');
    this.trigger = document.querySelector('[aria-controls="'+this.element.getAttribute('id')+'"]');
    this.autocompleteInput = false;
    this.autocompleteList = false;
    this.animationDuration = parseFloat(getComputedStyle(this.element).getPropertyValue('--cs-sticky-submenu-transition-duration')) || 0.3;
    // store some basic classes
    this.menuIsVisibleClass = 'cs-sticky-submenu--is-visible';
    this.menuLevelClass = 'js-cs-sticky-submenu__list';
    this.menuBtnInClass = 'js-cs-sticky-submenu__btn--sublist-control';
    this.menuBtnOutClass = 'js-cs-sticky-submenu__btn--back';
    this.levelInClass = 'cs-sticky-submenu__list--in';
    this.levelOutClass = 'cs-sticky-submenu__list--out';
    // store the max height of the element
    this.maxHeight = false;
    // store drop menu layout 
    this.layout = false;
    // vertical gap - desktop layout
    this.verticalGap = parseInt(getComputedStyle(this.element).getPropertyValue('--cs-sticky-submenu-gap-y')) || 4;
    // store autocomplete search results
    this.searchResults = [];
    // focusable elements
    this.focusableElements = [];
    initStickySubMenu(this);
  };

  function initStickySubMenu(menu) {
    // trigger drop menu opening/closing
    toggleStickySubMenu(menu);
    // toggle sublevels
    menu.element.addEventListener('click', function(event){
      // check if we need to show a new sublevel
      var menuBtnIn = event.target.closest('.'+menu.menuBtnInClass);
      if(menuBtnIn) showSubLevel(menu, menuBtnIn);
      // check if we need to go back to a previous level
      var menuBtnOut = event.target.closest('.'+menu.menuBtnOutClass);
      if(menuBtnOut) hideSubLevel(menu, menuBtnOut);
    });
    // init automplete search
    initAutocomplete(menu);
    // close drop menu on focus out
    initFocusOut(menu);
  };

  function toggleStickySubMenu(menu) { // toggle drop menu
    if(!menu.trigger) return;
    // actions to be performed when closing the drop menu
    menu.stickySubMenuClosed = function(event) {
      // if(event.propertyName != 'visibility') return;
      // if(getComputedStyle(menu.element).getPropertyValue('visibility') != 'hidden') return;
      if(event.propertyName != 'color') return;
      menu.element.removeEventListener('transitionend', menu.stickySubMenuClosed);
      menu.element.removeAttribute('style');
      resetAllLevels(menu); // go back to main list
      resetAutocomplete(menu); // if autocomplte is enabled -> reset input fields
    };

    // click on trigger
    menu.trigger.addEventListener('click', function(event){
      menu.element.removeEventListener('transitionend', menu.stickySubMenuClosed);
      var isVisible = stickySubMenuVisible(menu);
      Util.toggleClass(menu.element, menu.menuIsVisibleClass, !isVisible);
      isVisible ? menu.trigger.removeAttribute('aria-expanded') : menu.trigger.setAttribute('aria-expanded', true);
      if(isVisible) {
        menu.element.addEventListener('transitionend', menu.stickySubMenuClosed);
      } else {
        menu.element.addEventListener('transitionend', function cb(){
          menu.element.removeEventListener('transitionend', cb);
          // focusFirstElement(menu, menu.element);
        });
        getLayoutValue(menu);
        placeStickySubMenu(menu); // desktop only
      }
    });
  };

  function stickySubMenuVisible(menu) {
    return Util.hasClass(menu.element, menu.menuIsVisibleClass);
  };

  function showSubLevel(menu, menuBtn) {
    var mainLevel = menuBtn.closest('.'+menu.menuLevelClass),
      subLevel = Util.getChildrenByClassName(menuBtn.parentNode, menu.menuLevelClass);
    if(!mainLevel || subLevel.length == 0 ) return;
    // trigger classes
    Util.addClass(subLevel[0], menu.levelInClass);
    Util.addClass(mainLevel, menu.levelOutClass);
    Util.removeClass(mainLevel, menu.levelInClass);
    // animate height of main element
    animateStickySubMenu(menu, mainLevel.offsetHeight, subLevel[0].offsetHeight, function(){
      focusFirstElement(menu, subLevel[0]);
    });
  };

  function hideSubLevel(menu, menuBtn) {
    var subLevel = menuBtn.closest('.'+menu.menuLevelClass),
      mainLevel = subLevel.parentNode.closest('.'+menu.menuLevelClass);
    if(!mainLevel || !subLevel) return;
    // trigger classes
    Util.removeClass(subLevel, menu.levelInClass);
    Util.addClass(mainLevel, menu.levelInClass);
    Util.removeClass(mainLevel, menu.levelOutClass);
    // animate height of main element
    animateStickySubMenu(menu, subLevel.offsetHeight, mainLevel.offsetHeight, function(){
      var menuBtnIn = Util.getChildrenByClassName(subLevel.parentNode, menu.menuBtnInClass);
      if(menuBtnIn.length > 0) menuBtnIn[0].focus();
      // if primary level -> reset height of element + inner element
      if(Util.hasClass(mainLevel, 'js-cs-sticky-submenu__list--main') && menu.layout == 'desktop') {
        menu.element.style.height = '';
        if(menu.innerElement.length > 0) menu.innerElement[0].style.height = '';
      }
    });
  };

  function animateStickySubMenu(menu, initHeight, finalHeight, cb) {
    if(menu.innerElement.length < 1 || menu.layout == 'mobile') {
      if(cb) setTimeout(function(){cb();}, menu.animationDuration*1000);
      return;
    }
    // make sure init and final height are smaller than max height
    if(initHeight > menu.maxHeight) initHeight = menu.maxHeight;
    if(finalHeight > menu.maxHeight) {
      finalHeight = menu.maxHeight;
    }
    var currentTime = null,
      duration = menu.animationDuration*1000;

    var animateHeight = function(timestamp){  
      if (!currentTime) currentTime = timestamp;         
      var progress = timestamp - currentTime;
      if(progress > duration) progress = duration;
      if(progress < duration) {
        window.requestAnimationFrame(animateHeight);
      } else {
        if(cb) cb();
      }
    };
    
    //set the height of the element before starting animation -> fix bug on Safari
    window.requestAnimationFrame(animateHeight);
  };

  function resetAllLevels(menu) {
    var openLevels = menu.element.getElementsByClassName(menu.levelInClass),
      closeLevels = menu.element.getElementsByClassName(menu.levelOutClass);
    while(openLevels[0]) {
      Util.removeClass(openLevels[0], menu.levelInClass);
    }
    while(closeLevels[0]) {
      Util.removeClass(closeLevels[0], menu.levelOutClass);
    }
  };

  function focusFirstElement(menu, level) {
    var element = getFirstFocusable(level);
    element.focus();
  };

  function getFirstFocusable(element) {
    var elements = element.querySelectorAll(focusableElString);
    for(var i = 0; i < elements.length; i++) {
			if(elements[i].offsetWidth || elements[i].offsetHeight || elements[i].getClientRects().length) {
				return elements[i];
			}
		}
  };

  function getFocusableElements(menu) { // all visible focusable elements
    var elements = menu.element.querySelectorAll(focusableElString);
    menu.focusableElements = [];
    for(var i = 0; i < elements.length; i++) {
			if( isVisible(menu, elements[i]) ) menu.focusableElements.push(elements[i]);
		}
  };

  function isVisible(menu, element) {
    var elementVisible = false;
    if( (element.offsetWidth || element.offsetHeight || element.getClientRects().length) && getComputedStyle(element).getPropertyValue('visibility') == 'visible') {
      elementVisible = true;
      if(menu.element.contains(element) && element.parentNode) elementVisible = isVisible(menu, element.parentNode);
    }
    return elementVisible;
  };

  function initAutocomplete(menu) {
    if(!Util.hasClass(menu.element, 'js-autocomplete')) return;
    // get list of search results
    getSearchResults(menu);
    var autocompleteCharacters = 1;
    menu.autocompleteInput = menu.element.getElementsByClassName('js-autocomplete__input');
    menu.autocompleteList = menu.element.getElementsByClassName('js-autocomplete__results');
    new Autocomplete({
      element: menu.element,
      characters: autocompleteCharacters,
      searchData: function(query, cb) {
        var data = [];
        if(query.length >= autocompleteCharacters) {
          data = menu.searchResults.filter(function(item){
            return item['label'].toLowerCase().indexOf(query.toLowerCase()) > -1;
          });
        }
        cb(data);
      }
    });
  };

  function resetAutocomplete(menu) {
    if(menu.autocompleteInput && menu.autocompleteInput.length > 0) {
      menu.autocompleteInput[0].value = '';
    }
  };

  function getSearchResults(menu) {
    var anchors = menu.element.getElementsByClassName('cs-sticky-submenu__link');
    for(var i = 0; i < anchors.length; i++) {
      menu.searchResults.push({label: anchors[i].textContent, url: anchors[i].getAttribute('href')});
    }
  };

  function getLayoutValue(menu) {
    menu.layout = getComputedStyle(menu.element, ':before').getPropertyValue('content').replace(/\'|"/g, '');
  };

  function placeStickySubMenu(menu) {
    menu.element.style.top = '0px';
    menu.element.style.left = '0px';
    menu.element.style.right = 'auto';
  };

  function initFocusOut(menu) {
    menu.element.addEventListener('keydown', function(event){
      if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
        getFocusableElements(menu);
			}
    });
  };

  // init StickySubMenu objects
  var stickySubMenus = document.getElementsByClassName('js-cs-sticky-submenu');
  var focusableElString = '[href], input:not([disabled]), select:not([disabled]), button:not([disabled]), [tabindex]:not([tabindex="-1"]), [contenteditable], summary';
  if( stickySubMenus.length > 0 ) {
    var stickySubMenusArray = [];
    for( var i = 0; i < stickySubMenus.length; i++) {(function(i){
      stickySubMenusArray.push(new StickySubMenu(stickySubMenus[i]));
    })(i);}
  }
}());