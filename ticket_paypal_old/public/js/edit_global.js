
// includes actions
function newEIncludeMenuItem() {
    var newElem = $(''+
        '<tr class="pricing-list-item pattern">'+
        '<td>'+
        '<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>'+
        '<div class="fm-input pricing-ingredients"><input type="text" name="ep_includes[]" placeholder="Include Content"/></div>'+
        '<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
        '</td>'+
        '</tr>');
    newElem.appendTo('table#e-include-list-container');
}
if ($("table#e-include-list-container").is('*')) {
    $('#add-e-include-button').on('click', function(e) {
        e.preventDefault();
        newEIncludeMenuItem();
    });
    // remove ingredient
    $(document).on("click", "#e-include-list-container .delete", function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });
    $('table#e-include-list-container tbody').sortable({
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
function newENoteMenuItem() {
    var newElem = $(''+
        '<tr class="pricing-list-item pattern">'+
        '<td>'+
        '<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>'+
        '<div class="fm-input pricing-ingredients"><input type="text" name="ep_notes[]" placeholder="Description" /></div>'+
        '<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
        '</td>'+
        '</tr>');
    newElem.appendTo('table#e-note-list-container');
}
if ($("table#e-note-list-container").is('*')) {
    $('#add-e-notes-button').on('click', function(e) {
        e.preventDefault();
        newENoteMenuItem();
    });
    // remove ingredient
    $(document).on("click", "#e-note-list-container .delete", function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });
    $('table#e-note-list-container tbody').sortable({
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
function newETicketMenuItem() {
    var newElem = $(''+
        '<tr class="pricing-list-item pattern">'+
        '<td>'+
        '<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>'+
        '<div class="fm-input pricing-name"><input type="text" name="e_ticket_title[]" placeholder="Title" /></div>'+
        '<div class="fm-input pricing-ingredients"><input type="text" name="e_ticket_description[]" placeholder="Description" /></div>'+
        '<div class="fm-input pricing-price"><input type="text" name="e_ticket_price[]" placeholder="Price" data-unit="USD" /></div>'+
        '<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
        '</td>'+
        '</tr>');
    newElem.appendTo('table#e-ticket-list-container');
}
if ($("table#e-ticket-list-container").is('*')) {
    $('#add-e-ticket-button').on('click', function(e) {
        e.preventDefault();
        newETicketMenuItem();
    });
    // remove ingredient
    $(document).on("click", "#e-ticket-list-container .delete", function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });
    $('table#e-ticket-list-container tbody').sortable({
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
function newEDetailMenuItem() {
    var newElem = $(''+
        '<tr class="pricing-list-item pattern">'+
        '<td>'+
        '<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>'+
        '<div class="fm-input pricing-ingredients"><input type="text" name="et_details[]" placeholder="Ticket Details" /></div>'+
        '<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
        '</td>'+
        '</tr>');
    newElem.appendTo('table#e-details-list-container');
}
if ($("table#e-details-list-container").is('*')) {
    $('#add-e-details-button').on('click', function(e) {
        e.preventDefault();
        newEDetailMenuItem();
    });
    // remove ingredient
    $(document).on("click", "#e-details-list-container .delete", function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });
    $('table#e-details-list-container tbody').sortable({
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
