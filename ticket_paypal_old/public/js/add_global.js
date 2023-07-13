
// includes actions
function newIncludeMenuItem() {
    var newElem = $(''+
        '<tr class="pricing-list-item pattern">'+
        '<td>'+
        '<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>'+
        '<div class="fm-input pricing-ingredients"><input type="text" name="p_includes[]" placeholder="Include Content" /></div>'+
        '<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
        '</td>'+
        '</tr>');
    newElem.appendTo('table#include-list-container');
}
if ($("table#include-list-container").is('*')) {
    $('#add-include-button').on('click', function(e) {
        e.preventDefault();
        newIncludeMenuItem();
    });
    // remove ingredient
    $(document).on("click", "#include-list-container .delete", function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });
    $('table#include-list-container tbody').sortable({
        forcePlaceholderSize: true,
        forceHelperSize: false,
        placeholder : 'sortableHelper',
        zIndex: 999990,
        opacity: 0.6,
        tolerance: "pointer",
        start: function(e, ui ){
            ui.placeholder.height(ui.helper.outerHeight());
        }
    });
}

// notes actions
function newNoteMenuItem() {
    var newElem = $(''+
        '<tr class="pricing-list-item pattern">'+
        '<td>'+
        '<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>'+
        '<div class="fm-input pricing-ingredients"><input type="text" name="p_notes[]" placeholder="Description" /></div>'+
        '<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
        '</td>'+
        '</tr>');
    newElem.appendTo('table#note-list-container');
}
if ($("table#note-list-container").is('*')) {
    $('#add-notes-button').on('click', function(e) {
        e.preventDefault();
        newNoteMenuItem();
    });
    // remove ingredient
    $(document).on("click", "#note-list-container .delete", function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });
    $('table#note-list-container tbody').sortable({
        forcePlaceholderSize: true,
        forceHelperSize: false,
        placeholder : 'sortableHelper',
        zIndex: 999990,
        opacity: 0.6,
        tolerance: "pointer",
        start: function(e, ui ){
            ui.placeholder.height(ui.helper.outerHeight());
        }
    });
}

// Tickets actions
function newTicketMenuItem() {
    var newElem = $(''+
        '<tr class="pricing-list-item pattern">'+
        '<td>'+
        '<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>'+
        '<div class="fm-input pricing-name"><input type="text" name="ticket_title[]" placeholder="Title" /></div>'+
        '<div class="fm-input pricing-ingredients"><input type="text" name="ticket_description[]" placeholder="Description" /></div>'+
        '<div class="fm-input pricing-price"><input type="text" name="ticket_price[]" placeholder="Price" data-unit="USD" /></div>'+
        '<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
        '</td>'+
        '</tr>');
    newElem.appendTo('table#ticket-list-container');
}
if ($("table#ticket-list-container").is('*')) {
    $('#add-ticket-button').on('click', function(e) {
        e.preventDefault();
        newTicketMenuItem();
    });
    // remove ingredient
    $(document).on("click", "#ticket-list-container .delete", function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });
    $('table#ticket-list-container tbody').sortable({
        forcePlaceholderSize: true,
        forceHelperSize: false,
        placeholder : 'sortableHelper',
        zIndex: 999990,
        opacity: 0.6,
        tolerance: "pointer",
        start: function(e, ui ){
            ui.placeholder.height(ui.helper.outerHeight());
        }
    });
}

// Details actions
function newDetailMenuItem() {
    var newElem = $(''+
        '<tr class="pricing-list-item pattern">'+
        '<td>'+
        '<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>'+
        '<div class="fm-input pricing-ingredients"><input type="text" name="t_details[]" placeholder="Ticket Details" /></div>'+
        '<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
        '</td>'+
        '</tr>');
    newElem.appendTo('table#details-list-container');
}
if ($("table#details-list-container").is('*')) {
    $('#add-details-button').on('click', function(e) {
        e.preventDefault();
        newDetailMenuItem();
    });
    // remove ingredient
    $(document).on("click", "#details-list-container .delete", function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });
    $('table#details-list-container tbody').sortable({
        forcePlaceholderSize: true,
        forceHelperSize: false,
        placeholder : 'sortableHelper',
        zIndex: 999990,
        opacity: 0.6,
        tolerance: "pointer",
        start: function(e, ui ){
            ui.placeholder.height(ui.helper.outerHeight());
        }
    });
}
