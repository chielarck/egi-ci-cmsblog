$('.first-element').find('.item-element').draggable({
	cursor: 'move',
	zIndex: 200,
	opacity: 0.75,
	scroll: false,
	containment: 'window',
	appendTo: document.body,
	helper: 'clone',
	start: fixHelper
})